<?php get_header(); ?>

<main class="content-wrap">
	<?php
	while ( have_posts() ) {
		the_post();
		the_title( '<h1>', '</h1>' );
		the_content();
	}
	?>
</main>

<?php get_footer(); ?>
