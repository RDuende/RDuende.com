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

function rduende_default_site_icon_url( $url ) {
	return $url ? $url : get_theme_file_uri( 'assets/images/favicon.png' );
}

function rduende_enqueue_assets() {
	wp_enqueue_style( 'rduende-style', get_stylesheet_uri(), array(), '0.1.0' );
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
