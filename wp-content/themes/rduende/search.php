<?php get_header(); ?>

<main class="content-wrap">
	<h1>
		<?php
		printf(
			/* translators: %s: search query */
			esc_html__( 'Resultados de búsqueda para: %s', 'rduende' ),
			'<span>' . get_search_query() . '</span>'
		);
		?>
	</h1>

	<?php if ( have_posts() ) : ?>
		<?php
		while ( have_posts() ) {
			the_post();
			the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
			the_excerpt();
		}
		the_posts_navigation();
		?>
	<?php else : ?>
		<p><?php esc_html_e( 'No se encontraron resultados.', 'rduende' ); ?></p>
		<?php get_search_form(); ?>
	<?php endif; ?>
</main>

<?php get_footer(); ?>
