<?php get_header(); ?>

<div class="content-wrap">
	<main>
		<?php
		while ( have_posts() ) {
			the_post();
			the_title( '<h1>', '</h1>' );
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
			the_content();
		}

		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
		?>
	</main>

	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
