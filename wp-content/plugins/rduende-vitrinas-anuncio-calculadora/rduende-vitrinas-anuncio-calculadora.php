<?php
/**
 * Plugin Name: RDuende Vitrinas – Anuncio + Calculadora (WooCommerce)
 * Description: Inserta un anuncio de vitrinas en la parte superior y una calculadora al final. Incluye shortcode y auto-mostrado en productos WooCommerce.
 * Version: 1.0.0
 * Author: RDuende
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * Text Domain: rduende-vitrinas
 */

if (!defined('ABSPATH')) { exit; }

define('RDVITAC_VERSION', '1.0.0');
define('RDVITAC_PATH', plugin_dir_path(__FILE__));
define('RDVITAC_URL', plugin_dir_url(__FILE__));

require_once RDVITAC_PATH . 'includes/class-rdvitac-plugin.php';

add_action('plugins_loaded', function(){
    (new RDVITAC_Plugin())->init();
});
