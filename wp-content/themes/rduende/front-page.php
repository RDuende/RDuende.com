<?php get_header(); ?>

<?php if ( is_front_page() && ! is_home() ) : ?>

	<section class="hero hero--image">
		<img class="hero-image" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/hero.jpg' ) ); ?>" alt="RDuende – Convertimos tus ideas en impacto visual. Impresión de gran formato, rotulación y vinilos, letras corpóreas, corte y grabado láser, textil y sublimación, artículos promocionales, diseño gráfico, DTF, señalética y producción integral." width="1600" height="854" loading="eager">
		<div class="hero-cta-bar">
			<a class="button" href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>">Ver servicios</a>
			<a class="button button--ghost" href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>">Contáctanos</a>
			<a class="hero-contact-link" href="tel:+34968626506">968 62 65 06</a>
			<a class="hero-contact-link" href="mailto:info@rduende.com">info@rduende.com</a>
		</div>
	</section>

	<section class="promo-ads">
		<div class="promo-ads-row">
			<a href="https://vitrinas.net" target="_blank" rel="noopener" class="promo-ad">
				<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/vitrinas-banner.jpg' ) ); ?>" alt="Vitrinas.net – Tus colecciones, en el lugar que merecen. Vitrinas de metacrilato a medida." loading="lazy">
			</a>
			<a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="promo-ad">
				<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/promo-lienzos-camisetas.jpg' ) ); ?>" alt="Lienzos y camisetas personalizadas: tu historia, tu estilo, tu mundo." loading="lazy">
			</a>
		</div>
		<div class="promo-ads-row">
			<a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="promo-ad">
				<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/promo-rotulacion-fachadas.jpg' ) ); ?>" alt="Rotulación de fachadas y tiendas, y carteles luminosos. Visibilidad que te hace inolvidable." loading="lazy">
			</a>
			<a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="promo-ad">
				<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/promo-corte-laser-metacrilato.jpg' ) ); ?>" alt="Corte láser de metacrilato: precisión que se ve, calidad que dura." loading="lazy">
			</a>
		</div>
	</section>

	<?php while ( have_posts() ) : the_post(); ?>
		<section class="intro">
			<?php the_content(); ?>
		</section>
	<?php endwhile; ?>

	<section class="services-teaser">
		<h2 class="section-title">Nuestros servicios</h2>
		<ul class="services-grid">
			<li class="service-card">
				<a href="<?php echo esc_url( rduende_service_url( 'impresion-de-gran-formato' ) ); ?>">
					<img class="service-card-image" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-impresion-gran-formato.jpg' ) ); ?>" alt="Impresión de gran formato: vallas, lonas, carteles y papeles" loading="lazy">
				</a>
			</li>
			<li class="service-card">
				<a href="<?php echo esc_url( rduende_service_url( 'rotulacion-de-vehiculos-y-empresas' ) ); ?>">
					<img class="service-card-image" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-rotulacion-vinilos.jpg' ) ); ?>" alt="Rotulación y vinilos: vehículos, escaparates y fachadas" loading="lazy">
				</a>
			</li>
			<li class="service-card">
				<a href="<?php echo esc_url( rduende_service_url( 'corte-y-grabado-laser' ) ); ?>">
					<img class="service-card-image" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-corte-laser.jpg' ) ); ?>" alt="Corte y grabado láser: madera, metacrilato y metal" loading="lazy">
				</a>
			</li>
			<li class="service-card">
				<a href="<?php echo esc_url( rduende_service_url( 'estampacion-de-camisetas-deportivas' ) ); ?>">
					<img class="service-card-image" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-textil-sublimacion.jpg' ) ); ?>" alt="Textil y sublimación: camisetas, ropa laboral y personalización" loading="lazy">
				</a>
			</li>
			<li class="service-card">
				<a href="<?php echo esc_url( rduende_service_url( 'letras-corporeas' ) ); ?>">
					<img class="service-card-image" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-letras-corporeas.jpg' ) ); ?>" alt="Letras corpóreas: 3D, luminosas o sin luz" loading="lazy">
				</a>
			</li>
			<li class="service-card">
				<a href="<?php echo esc_url( rduende_service_url( 'articulos-publicitarios' ) ); ?>">
					<img class="service-card-image" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-articulos-promocionales.jpg' ) ); ?>" alt="Artículos promocionales: regalos, merchandising y empresas" loading="lazy">
				</a>
			</li>
			<li class="service-card">
				<a href="<?php echo esc_url( rduende_service_url( 'diseno-grafico' ) ); ?>">
					<img class="service-card-image" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-diseno-grafico.jpg' ) ); ?>" alt="Diseño gráfico: imagen, creatividad y comunicación" loading="lazy">
				</a>
			</li>
			<li class="service-card">
				<a href="<?php echo esc_url( rduende_service_url( 'impresion-digital' ) ); ?>">
					<img class="service-card-image" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-impresion-digital.jpg' ) ); ?>" alt="Impresión digital: tarjetas, folletos, catálogos y más" loading="lazy">
				</a>
			</li>
		</ul>
		<a class="section-link" href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>">Ver todos los servicios &rarr;</a>
	</section>

	<section class="clients">
		<h2 class="section-title">Confían en nosotros</h2>
		<ul class="clients-list">
			<?php
			$clients = array( 'Eviosys', 'LINASA', 'Primafrio', 'GKS Trucks', 'Grúas Gil', 'Autocares Molina', 'Ecoembes', 'Aguas de Murcia' );
			foreach ( $clients as $client ) {
				echo '<li class="client-badge">' . esc_html( $client ) . '</li>';
			}
			?>
		</ul>
	</section>

	<?php
	$featured = get_posts( array( 'numberposts' => 1 ) );
	if ( $featured ) :
		$featured_post = $featured[0];
		?>
		<section class="featured-project">
			<h2 class="section-title">Proyecto destacado</h2>
			<div class="featured-project-card">
				<h3><a href="<?php echo esc_url( get_permalink( $featured_post ) ); ?>"><?php echo esc_html( get_the_title( $featured_post ) ); ?></a></h3>
				<p><?php echo esc_html( wp_trim_words( $featured_post->post_content, 30 ) ); ?></p>
				<a class="section-link" href="<?php echo esc_url( get_permalink( $featured_post ) ); ?>">Leer más &rarr;</a>
			</div>
		</section>
	<?php endif; ?>

	<section class="cta-band">
		<h2>¿Tienes un proyecto en mente?</h2>
		<p>Hablemos y démosle forma a tu idea.</p>
		<a class="button" href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>">Contáctanos</a>
	</section>

<?php else : ?>

	<main class="front-page">
		<?php
		while ( have_posts() ) {
			the_post();
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
			the_excerpt();
		}
		?>
	</main>

<?php endif; ?>

<?php get_footer(); ?>
