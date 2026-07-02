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
}
add_action( 'after_setup_theme', 'rduende_setup' );

function rduende_enqueue_assets() {
	wp_enqueue_style( 'rduende-style', get_stylesheet_uri(), array(), '0.1.0' );
}
add_action( 'wp_enqueue_scripts', 'rduende_enqueue_assets' );
