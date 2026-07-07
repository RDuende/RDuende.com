<?php
if (!defined('ABSPATH')) { exit; }

class RDVITAC_Plugin {

    const OPTION_KEY = 'rdvitac_settings';

    public function init() {
        // Admin settings
        add_action('admin_menu', [$this, 'add_settings_page']);
        add_action('admin_init', [$this, 'register_settings']);

        // Shortcode
        add_shortcode('rduende_vitrinas_anuncio', [$this, 'shortcode']);

        // Assets
        add_action('wp_enqueue_scripts', [$this, 'enqueue_assets']);

        // AJAX calc
        add_action('wp_ajax_rdvitac_calc', [$this, 'ajax_calc']);
        add_action('wp_ajax_nopriv_rdvitac_calc', [$this, 'ajax_calc']);

        // Auto render on product pages
        add_action('woocommerce_before_single_product', [$this, 'maybe_render_on_product_page'], 5);
    }

    public function enqueue_assets() {
        $load = false;

        if (is_singular('product')) {
            $s = $this->get_settings();
            if (!empty($s['auto_on_product'])) $load = true;
        }

        if (!$load && is_singular()) {
            global $post;
            if ($post && has_shortcode($post->post_content, 'rduende_vitrinas_anuncio')) {
                $load = true;
            }
        }

        if (!$load) return;

        wp_enqueue_style('rdvitac-css', RDVITAC_URL . 'assets/css/rdvitac.css', [], RDVITAC_VERSION);
        wp_enqueue_script('rdvitac-js', RDVITAC_URL . 'assets/js/rdvitac.js', ['jquery'], RDVITAC_VERSION, true);

        wp_localize_script('rdvitac-js', 'RDVITAC', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('rdvitac_nonce'),
            'currency_symbol' => function_exists('get_woocommerce_currency_symbol') ? get_woocommerce_currency_symbol() : '€',
        ]);
    }

    public function maybe_render_on_product_page() {
        if (!function_exists('is_product') || !is_product()) return;

        $s = $this->get_settings();
        if (empty($s['auto_on_product'])) return;

        $cat = trim((string)($s['category_slug'] ?? ''));
        if ($cat !== '') {
            global $product;
            if (!$product || !has_term($cat, 'product_cat', $product->get_id())) return;
        }

        echo $this->render_block();
    }

    public function shortcode($atts = []) {
        $atts = shortcode_atts([
            'show_anuncio' => '1',
            'show_calc'    => '1',
        ], $atts, 'rduende_vitrinas_anuncio');

        return $this->render_block([
            'show_anuncio' => ($atts['show_anuncio'] === '1' || $atts['show_anuncio'] === 'true'),
            'show_calc'    => ($atts['show_calc'] === '1' || $atts['show_calc'] === 'true'),
        ]);
    }

    public function ajax_calc() {
        check_ajax_referer('rdvitac_nonce', 'nonce');

        $w = floatval($_POST['width'] ?? 0);
        $d = floatval($_POST['depth'] ?? 0);
        $h = floatval($_POST['height'] ?? 0);
        $qty = max(1, intval($_POST['qty'] ?? 1));

        $has_base = !empty($_POST['base']) && ($_POST['base'] === '1' || $_POST['base'] === 'true');
        $engrave  = !empty($_POST['engrave']) && ($_POST['engrave'] === '1' || $_POST['engrave'] === 'true');
        $led      = !empty($_POST['led']) && ($_POST['led'] === '1' || $_POST['led'] === 'true');

        $errors = [];
        foreach (['Ancho'=>$w,'Fondo'=>$d,'Alto'=>$h] as $k=>$v) {
            if ($v <= 0) $errors[] = $k . " debe ser mayor que 0.";
            if ($v > 200) $errors[] = $k . " parece demasiado grande (máx. 200 cm).";
        }
        if (!empty($errors)) {
            wp_send_json_error(['errors' => $errors], 400);
        }

        // Modelo orientativo (editable)
        $min_price = 19.0;

        // Área 5 paneles (sin base): top + 4 laterales
        $area_cm2 = ($w*$d) + 2*($w*$h) + 2*($d*$h);

        $rate = 0.003;       // €/cm² (30 €/m²)
        $hardware = 6.50;    // conectores + tornillería
        $labor = 7.00 + 0.0008 * $area_cm2;

        $price = ($area_cm2 * $rate) + $hardware + $labor;

        if ($has_base) $price += 9.00;
        if ($engrave)  $price += 6.00;
        if ($led)      $price += 12.00;

        $price = max($min_price, $price);

        $unit = round($price, 2);
        $total = round($unit * $qty, 2);

        wp_send_json_success([
            'unit' => $unit,
            'total' => $total,
            'area_cm2' => round($area_cm2, 0),
            'note' => 'Precio orientativo. Para confirmación final, revisamos medidas y acabados.',
        ]);
    }

    private function render_block($args = []) {
        $args = wp_parse_args($args, [
            'show_anuncio' => true,
            'show_calc' => true,
        ]);

        ob_start(); ?>
        <div class="rdvitac-wrap">
            <?php if ($args['show_anuncio']) : ?>
                <?php echo $this->render_anuncio(); ?>
            <?php endif; ?>

            <?php if ($args['show_calc']) : ?>
                <?php echo $this->render_calc(); ?>
            <?php endif; ?>
        </div>
        <?php
        return ob_get_clean();
    }

    private function img_url($file) {
        return esc_url(RDVITAC_URL . 'assets/img/' . $file);
    }

    private function render_anuncio() {
        ob_start(); ?>
        <section class="rd-ad" aria-label="Anuncio vitrinas metacrilato">
            <div class="rd-topbar">
                <div class="rd-topicons" aria-hidden="true">🧱🌲</div>
                <div class="rd-toptext">
                    ¡Protege, muestra y presume tus sets de <span class="rd-lego">LEGO!</span>
                </div>
            </div>

            <div class="rd-ribbon">
                <div class="rd-ribbon-text">
                    <span class="rd-ribbon-strong">Vitrinas de metacrilato personalizables</span>
                    <span class="rd-ribbon-dash">—</span>
                    <span class="rd-ribbon-sub">hechas a tu medida</span>
                </div>
            </div>

            <div class="rd-stage">
                <div class="rd-burst" aria-label="Desde 19 euros">
                    <div class="rd-burst-inner">
                        <div class="rd-burst-small">¡Desde</div>
                        <div class="rd-burst-price">19€</div>
                        <div class="rd-burst-small">!</div>
                    </div>
                </div>

                <div class="rd-grid">
                    <figure class="rd-card rd-card--big">
                        <img src="<?php echo $this->img_url('vitrina_hp.png'); ?>" alt="Vitrina con castillo Harry Potter" />
                    </figure>

                    <div class="rd-stack">
                        <figure class="rd-card rd-card--top">
                            <img src="<?php echo $this->img_url('vitrina0.png'); ?>" alt="Vitrina con set modular" />
                        </figure>
                        <figure class="rd-card rd-card--bottom">
                            <img src="<?php echo $this->img_url('vitrina_halcon.png'); ?>" alt="Vitrina con Halcón Milenario" />
                        </figure>
                    </div>
                </div>
            </div>

            <div class="rd-bottom">
                <ul class="rd-features" aria-label="Características">
                    <li><span class="rd-check">✓</span> Fabricadas a medida.</li>
                    <li><span class="rd-check">✓</span> Metacrilato premium de alta claridad.</li>
                    <li><span class="rd-check">✓</span> <strong>Protección total</strong> <span class="rd-accent">contra polvo y golpes</span>.</li>
                    <li><span class="rd-check">✓</span> Base personalizable, Grabados.</li>
                    <li><span class="rd-check">✓</span> Ideales para coleccionistas y expositores.</li>
                </ul>

                <div class="rd-side">
                    <div class="rd-thumbs">
                        <figure class="rd-thumb">
                            <img src="<?php echo $this->img_url('vitrina_castillo.png'); ?>" alt="Vitrina con castillo LEGO" />
                        </figure>
                        <figure class="rd-thumb">
                            <img src="<?php echo $this->img_url('vitrina_lotr.png'); ?>" alt="Vitrina con Barad-dûr" />
                        </figure>
                    </div>

                    <div class="rd-brand">
                        <img class="rd-logo" src="<?php echo $this->img_url('logo_gnomo.png'); ?>" alt="Logo RDuende" />
                        <div class="rd-brand-name">RDuende</div>
                        <div class="rd-brand-tag">Artes Gráficas · Gran Formato · Rotulación</div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        return ob_get_clean();
    }

    private function render_calc() {
        ob_start(); ?>
        <section class="rdcalc" aria-label="Calculadora de vitrinas">
            <div class="rdcalc__head">
                <h2>Calculadora de vitrina a medida</h2>
                <p>Introduce medidas en <strong>centímetros</strong>. Precio orientativo al instante.</p>
            </div>

            <form class="rdcalc__form" action="#" method="post" onsubmit="return false;">
                <div class="rdcalc__grid">
                    <label><span>Ancho (cm)</span><input type="number" inputmode="decimal" min="1" max="200" step="0.1" name="width" value="40"></label>
                    <label><span>Fondo (cm)</span><input type="number" inputmode="decimal" min="1" max="200" step="0.1" name="depth" value="25"></label>
                    <label><span>Alto (cm)</span><input type="number" inputmode="decimal" min="1" max="200" step="0.1" name="height" value="25"></label>
                    <label><span>Cantidad</span><input type="number" min="1" max="99" step="1" name="qty" value="1"></label>
                </div>

                <div class="rdcalc__opts">
                    <label class="rdcalc__check"><input type="checkbox" name="base" value="1"> <span>Base (opcional)</span></label>
                    <label class="rdcalc__check"><input type="checkbox" name="engrave" value="1"> <span>Grabado (opcional)</span></label>
                    <label class="rdcalc__check"><input type="checkbox" name="led" value="1"> <span>LED (opcional)</span></label>
                </div>

                <div class="rdcalc__actions">
                    <button class="rdcalc__btn" type="button" data-rdvitac-calc>Calcular</button>
                    <div class="rdcalc__status" aria-live="polite"></div>
                </div>

                <div class="rdcalc__result" hidden>
                    <div class="rdcalc__row">
                        <div>
                            <div class="rdcalc__label">Precio unitario</div>
                            <div class="rdcalc__value"><span data-rdvitac-unit>—</span></div>
                        </div>
                        <div>
                            <div class="rdcalc__label">Total</div>
                            <div class="rdcalc__value"><span data-rdvitac-total>—</span></div>
                        </div>
                        <div>
                            <div class="rdcalc__label">Área (cm²)</div>
                            <div class="rdcalc__value"><span data-rdvitac-area>—</span></div>
                        </div>
                    </div>
                    <div class="rdcalc__note" data-rdvitac-note></div>
                </div>
            </form>
        </section>
        <?php
        return ob_get_clean();
    }

    public function add_settings_page() {
        add_options_page(
            'RDuende Vitrinas',
            'RDuende Vitrinas',
            'manage_options',
            'rdvitac-settings',
            [$this, 'render_settings_page']
        );
    }

    public function register_settings() {
        register_setting('rdvitac_settings_group', self::OPTION_KEY);

        add_settings_section('rdvitac_main', 'Ajustes', function(){
            echo '<p>Controla dónde se muestra el anuncio + calculadora.</p>';
        }, 'rdvitac-settings');

        add_settings_field('auto_on_product', 'Mostrar en fichas de producto', function(){
            $s = $this->get_settings();
            $v = !empty($s['auto_on_product']);
            echo '<label><input type="checkbox" name="'.esc_attr(self::OPTION_KEY).'[auto_on_product]" value="1" '.checked(true,$v,false).'> Activado</label>';
            echo '<p class="description">Se muestra arriba de la ficha de producto (WooCommerce).</p>';
        }, 'rdvitac-settings', 'rdvitac_main');

        add_settings_field('category_slug', 'Filtrar por categoría (slug)', function(){
            $s = $this->get_settings();
            $v = esc_attr($s['category_slug'] ?? '');
            echo '<input type="text" name="'.esc_attr(self::OPTION_KEY).'[category_slug]" value="'.$v.'" placeholder="vitrinas" class="regular-text">';
            echo '<p class="description">Si se rellena, solo aparecerá en productos de esa categoría.</p>';
        }, 'rdvitac-settings', 'rdvitac_main');
    }

    public function render_settings_page() { ?>
        <div class="wrap">
            <h1>RDuende Vitrinas – Ajustes</h1>
            <p><strong>Shortcode:</strong> <code>[rduende_vitrinas_anuncio]</code></p>
            <p>Parámetros: <code>show_anuncio</code>, <code>show_calc</code> (0/1)</p>
            <form method="post" action="options.php">
                <?php
                settings_fields('rdvitac_settings_group');
                do_settings_sections('rdvitac-settings');
                submit_button();
                ?>
            </form>
        </div>
    <?php }

    private function get_settings() {
        $defaults = [
            'auto_on_product' => 1,
            'category_slug' => '',
        ];
        $opt = get_option(self::OPTION_KEY, []);
        if (!is_array($opt)) $opt = [];
        return array_merge($defaults, $opt);
    }
}
