<?php

function rduende_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'rduende' ),
		)
	);

	if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
		add_filter( 'get_site_icon_url', 'rduende_default_site_icon_url' );
	}
}
add_action( 'after_setup_theme', 'rduende_setup' );

function rduende_register_cliente_cpt() {
	register_post_type(
		'cliente',
		array(
			'labels'       => array(
				'name'          => __( 'Clientes', 'rduende' ),
				'singular_name' => __( 'Cliente', 'rduende' ),
				'add_new_item'  => __( 'Añadir cliente', 'rduende' ),
				'edit_item'     => __( 'Editar cliente', 'rduende' ),
			),
			'public'       => false,
			'show_ui'      => true,
			'show_in_menu' => true,
			'menu_icon'    => 'dashicons-groups',
			'supports'     => array( 'title', 'thumbnail', 'page-attributes' ),
		)
	);
}
add_action( 'init', 'rduende_register_cliente_cpt' );

function rduende_default_site_icon_url( $url ) {
	return $url ? $url : get_theme_file_uri( 'assets/images/favicon.png' );
}

function rduende_enqueue_assets() {
	$style_path = get_stylesheet_directory() . '/style.css';
	$version    = file_exists( $style_path ) ? filemtime( $style_path ) : '0.1.0';
	wp_enqueue_style( 'rduende-style', get_stylesheet_uri(), array(), $version );
}
add_action( 'wp_enqueue_scripts', 'rduende_enqueue_assets' );

function rduende_service_url( $slug ) {
	$pages = get_posts(
		array(
			'name'        => $slug,
			'post_type'   => 'page',
			'post_status' => 'publish',
			'numberposts' => 1,
		)
	);
	return $pages ? home_url( '/?page_id=' . $pages[0]->ID ) : home_url( '/servicios/' );
}

/**
 * Ajustes del Personalizador para las claves de reCAPTCHA v3, así el
 * formulario de contacto se puede proteger sin tocar código: basta con
 * pegar las claves en Apariencia > Personalizar.
 */
function rduende_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'rduende_recaptcha',
		array(
			'title'    => __( 'reCAPTCHA (formulario de contacto)', 'rduende' ),
			'priority' => 160,
		)
	);

	$wp_customize->add_setting(
		'rduende_recaptcha_site_key',
		array(
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => '',
		)
	);
	$wp_customize->add_control(
		'rduende_recaptcha_site_key',
		array(
			'section'     => 'rduende_recaptcha',
			'label'       => __( 'Clave de sitio (site key)', 'rduende' ),
			'description' => __( 'De reCAPTCHA v3, en google.com/recaptcha/admin', 'rduende' ),
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'rduende_recaptcha_secret_key',
		array(
			'type'              => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => '',
		)
	);
	$wp_customize->add_control(
		'rduende_recaptcha_secret_key',
		array(
			'section' => 'rduende_recaptcha',
			'label'   => __( 'Clave secreta (secret key)', 'rduende' ),
			'type'    => 'text',
		)
	);
}
add_action( 'customize_register', 'rduende_customize_register' );

function rduende_enqueue_recaptcha() {
	if ( ! is_page( 'contacto' ) ) {
		return;
	}
	$site_key = get_theme_mod( 'rduende_recaptcha_site_key' );
	if ( ! $site_key ) {
		return;
	}
	wp_enqueue_script( 'rduende-recaptcha', 'https://www.google.com/recaptcha/api.js?render=' . rawurlencode( $site_key ), array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'rduende_enqueue_recaptcha' );

/**
 * Procesa el envío del formulario de contacto: valida los campos, verifica
 * el token de reCAPTCHA v3 (si hay claves configuradas) y envía el email.
 */
function rduende_handle_contact_form() {
	$feedback = array(
		'sent'   => false,
		'errors' => array(),
		'values' => array(
			'name'    => '',
			'email'   => '',
			'phone'   => '',
			'message' => '',
		),
	);

	if ( empty( $_POST['rduende_contact_submit'] ) ) {
		return $feedback;
	}

	if ( ! isset( $_POST['rduende_contact_nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['rduende_contact_nonce'] ) ), 'rduende_contact_form' ) ) {
		$feedback['errors'][] = __( 'No se ha podido verificar el formulario. Vuelve a intentarlo.', 'rduende' );
		return $feedback;
	}

	$feedback['values']['name']    = isset( $_POST['contact_name'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_name'] ) ) : '';
	$feedback['values']['email']   = isset( $_POST['contact_email'] ) ? sanitize_email( wp_unslash( $_POST['contact_email'] ) ) : '';
	$feedback['values']['phone']   = isset( $_POST['contact_phone'] ) ? sanitize_text_field( wp_unslash( $_POST['contact_phone'] ) ) : '';
	$feedback['values']['message'] = isset( $_POST['contact_message'] ) ? sanitize_textarea_field( wp_unslash( $_POST['contact_message'] ) ) : '';

	if ( '' === $feedback['values']['name'] ) {
		$feedback['errors'][] = __( 'Indica tu nombre.', 'rduende' );
	}
	if ( ! is_email( $feedback['values']['email'] ) ) {
		$feedback['errors'][] = __( 'Indica un email válido.', 'rduende' );
	}
	if ( '' === $feedback['values']['message'] ) {
		$feedback['errors'][] = __( 'Escribe tu mensaje.', 'rduende' );
	}

	$site_key   = get_theme_mod( 'rduende_recaptcha_site_key' );
	$secret_key = get_theme_mod( 'rduende_recaptcha_secret_key' );

	if ( $site_key && $secret_key ) {
		$token = isset( $_POST['recaptcha_token'] ) ? sanitize_text_field( wp_unslash( $_POST['recaptcha_token'] ) ) : '';
		if ( '' === $token ) {
			$feedback['errors'][] = __( 'No se ha podido verificar que no eres un robot. Vuelve a intentarlo.', 'rduende' );
		} else {
			$response = wp_remote_post(
				'https://www.google.com/recaptcha/api/siteverify',
				array(
					'body' => array(
						'secret'   => $secret_key,
						'response' => $token,
						'remoteip' => isset( $_SERVER['REMOTE_ADDR'] ) ? $_SERVER['REMOTE_ADDR'] : '',
					),
				)
			);

			$result = is_wp_error( $response ) ? null : json_decode( wp_remote_retrieve_body( $response ), true );

			if ( ! $result || empty( $result['success'] ) || ( isset( $result['score'] ) && $result['score'] < 0.5 ) ) {
				$feedback['errors'][] = __( 'No se ha podido verificar que no eres un robot. Vuelve a intentarlo.', 'rduende' );
			}
		}
	}

	if ( ! empty( $feedback['errors'] ) ) {
		return $feedback;
	}

	$sent = wp_mail(
		'info@rduende.com',
		sprintf( '[Web] Nuevo mensaje de contacto de %s', $feedback['values']['name'] ),
		sprintf(
			"Nombre: %s\nEmail: %s\nTeléfono: %s\n\nMensaje:\n%s",
			$feedback['values']['name'],
			$feedback['values']['email'],
			$feedback['values']['phone'],
			$feedback['values']['message']
		),
		array( 'Reply-To: ' . $feedback['values']['name'] . ' <' . $feedback['values']['email'] . '>' )
	);

	if ( $sent ) {
		$feedback['sent']   = true;
		$feedback['values'] = array(
			'name'    => '',
			'email'   => '',
			'phone'   => '',
			'message' => '',
		);
	} else {
		$feedback['errors'][] = __( 'No se ha podido enviar el mensaje. Inténtalo de nuevo o escríbenos directamente a info@rduende.com.', 'rduende' );
	}

	return $feedback;
}

/**
 * Renderiza el formulario de contacto (o el aviso de éxito/error tras enviarlo).
 */
function rduende_contact_form() {
	$feedback = rduende_handle_contact_form();
	$site_key = get_theme_mod( 'rduende_recaptcha_site_key' );

	ob_start();
	?>
	<div class="contact-form-wrap">
		<?php if ( $feedback['sent'] ) : ?>
			<p class="contact-form-notice contact-form-notice--success">
				<?php esc_html_e( '¡Gracias! Hemos recibido tu mensaje y te responderemos lo antes posible.', 'rduende' ); ?>
			</p>
		<?php else : ?>
			<?php if ( ! empty( $feedback['errors'] ) ) : ?>
				<div class="contact-form-notice contact-form-notice--error">
					<ul>
						<?php foreach ( $feedback['errors'] as $error ) : ?>
							<li><?php echo esc_html( $error ); ?></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>

			<form class="contact-form" method="post" id="rduende-contact-form">
				<?php wp_nonce_field( 'rduende_contact_form', 'rduende_contact_nonce' ); ?>
				<input type="hidden" name="recaptcha_token" id="recaptcha_token" value="">

				<div class="contact-form-row">
					<label for="contact_name"><?php esc_html_e( 'Nombre', 'rduende' ); ?> *</label>
					<input type="text" id="contact_name" name="contact_name" value="<?php echo esc_attr( $feedback['values']['name'] ); ?>" required>
				</div>

				<div class="contact-form-row contact-form-row--split">
					<div>
						<label for="contact_email"><?php esc_html_e( 'Email', 'rduende' ); ?> *</label>
						<input type="email" id="contact_email" name="contact_email" value="<?php echo esc_attr( $feedback['values']['email'] ); ?>" required>
					</div>
					<div>
						<label for="contact_phone"><?php esc_html_e( 'Teléfono', 'rduende' ); ?></label>
						<input type="tel" id="contact_phone" name="contact_phone" value="<?php echo esc_attr( $feedback['values']['phone'] ); ?>">
					</div>
				</div>

				<div class="contact-form-row">
					<label for="contact_message"><?php esc_html_e( 'Mensaje', 'rduende' ); ?> *</label>
					<textarea id="contact_message" name="contact_message" rows="6" required><?php echo esc_textarea( $feedback['values']['message'] ); ?></textarea>
				</div>

				<button type="submit" name="rduende_contact_submit" value="1" class="button">
					<?php esc_html_e( 'Enviar mensaje', 'rduende' ); ?>
				</button>

				<?php if ( $site_key ) : ?>
					<p class="contact-form-recaptcha-notice">
						<?php
						printf(
							/* translators: 1: apertura de enlace a la política de privacidad de Google, 2: cierre de enlace, 3: apertura de enlace a las condiciones de Google, 4: cierre de enlace */
							esc_html__( 'Este sitio está protegido por reCAPTCHA y se aplican la %1$sPolítica de privacidad%2$s y los %3$sTérminos de servicio%4$s de Google.', 'rduende' ),
							'<a href="https://policies.google.com/privacy" target="_blank" rel="noopener">',
							'</a>',
							'<a href="https://policies.google.com/terms" target="_blank" rel="noopener">',
							'</a>'
						);
						?>
					</p>
				<?php endif; ?>
			</form>

			<?php if ( $site_key ) : ?>
				<script>
				( function() {
					var form  = document.getElementById( 'rduende-contact-form' );
					var token = document.getElementById( 'recaptcha_token' );
					if ( ! form || ! token || typeof grecaptcha === 'undefined' ) {
						return;
					}
					form.addEventListener( 'submit', function( event ) {
						if ( token.value ) {
							return;
						}
						event.preventDefault();
						grecaptcha.ready( function() {
							grecaptcha.execute( '<?php echo esc_js( $site_key ); ?>', { action: 'contact' } ).then( function( result ) {
								token.value = result;
								form.submit();
							} );
						} );
					} );
				} )();
				</script>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<?php
	return ob_get_clean();
}
