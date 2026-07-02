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

	<?php while ( have_posts() ) : the_post(); ?>
		<section class="intro">
			<?php the_content(); ?>
		</section>
	<?php endwhile; ?>

	<section class="services-teaser">
		<h2 class="section-title">Nuestros servicios</h2>
		<ul class="services-grid">
			<li class="service-card">
				<img class="service-icon-img" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-impresion-gran-formato.png' ) ); ?>" alt="" loading="lazy">
				<strong>Impresión de gran formato</strong>
				<p>Vinilos, lonas, cartelería, rollups y rótulos.</p>
			</li>
			<li class="service-card">
				<img class="service-icon-img" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-rotulacion-vinilos.png' ) ); ?>" alt="" loading="lazy">
				<strong>Rotulaciones de vehículos y empresas</strong>
				<p>Comunicación visual en movimiento para tu marca.</p>
			</li>
			<li class="service-card">
				<img class="service-icon-img" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-corte-laser.png' ) ); ?>" alt="" loading="lazy">
				<strong>Corte y grabado láser</strong>
				<p>Precisión en madera, metacrilato y metal.</p>
			</li>
			<li class="service-card">
				<img class="service-icon-img" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-textil-sublimacion.png' ) ); ?>" alt="" loading="lazy">
				<strong>Estampación de camisetas deportivas</strong>
				<p>Diseños duraderos y personalizados para equipos.</p>
			</li>
			<li class="service-card">
				<img class="service-icon-img" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-letras-corporeas.png' ) ); ?>" alt="" loading="lazy">
				<strong>Letras corpóreas</strong>
				<p>Volumen y elegancia para dar visibilidad a tu marca.</p>
			</li>
			<li class="service-card">
				<img class="service-icon-img" src="<?php echo esc_url( get_theme_file_uri( 'assets/images/icons/icon-articulos-promocionales.png' ) ); ?>" alt="" loading="lazy">
				<strong>Artículos publicitarios</strong>
				<p>Tazas, bolígrafos, mochilas y más, personalizados.</p>
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
