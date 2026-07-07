<?php get_header(); ?>

<main class="content-wrap contact-page">
	<?php
	while ( have_posts() ) {
		the_post();
		the_title( '<h1>', '</h1>' );
		the_content();
	}
	?>

	<h2>Escríbenos</h2>
	<?php echo rduende_contact_form(); ?>
</main>

<?php get_footer(); ?>
