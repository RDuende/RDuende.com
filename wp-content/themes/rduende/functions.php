<?php

function rduende_enqueue_assets() {
	wp_enqueue_style( 'rduende-style', get_stylesheet_uri(), array(), '0.1.0' );
}
add_action( 'wp_enqueue_scripts', 'rduende_enqueue_assets' );
