<?php get_header(); ?>

<main class="front-page">
	<?php
	if ( is_front_page() && ! is_home() ) {
		?>
		<div class="hero">
			<h1 class="hero-title"><?php bloginfo( 'name' ); ?></h1>
			<?php if ( get_bloginfo( 'description' ) ) : ?>
				<p class="hero-subtitle"><?php bloginfo( 'description' ); ?></p>
			<?php endif; ?>
		</div>
		<?php
		while ( have_posts() ) {
			the_post();
			the_content();
		}
	} else {
		while ( have_posts() ) {
			the_post();
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
			the_excerpt();
		}
	}
	?>
</main>

<?php get_footer(); ?>
