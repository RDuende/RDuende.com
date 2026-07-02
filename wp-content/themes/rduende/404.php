<?php get_header(); ?>

<main class="front-page">
	<h1><?php esc_html_e( 'Página no encontrada', 'rduende' ); ?></h1>
	<p><?php esc_html_e( 'Lo sentimos, no pudimos encontrar lo que buscas.', 'rduende' ); ?></p>
	<?php get_search_form(); ?>
</main>

<?php get_footer(); ?>
