<?php

namespace Avtocase;

function setup_theme() {
	load_theme_textdomain( 'avtocase', get_template_directory() . '/languages' );

	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
//	add_theme_support( 'automatic-feed-links' );
//	add_theme_support( 'post-thumbnails' );
//	add_theme_support( 'align-wide' );
//	add_theme_support( 'wp-block-styles' );
//	add_theme_support(
//		'html5',
//		[
//			'search-form',
//			'comment-form',
//			'comment-list',
//			'gallery',
//			'caption',
//			'script',
//			'style',
//		]
//	);

	register_nav_menus(
		[
			'header-nav-left' => __( 'Header Menu - Left', 'avtocase' ),
			'header-nav-right' => __( 'Header Menu - Right', 'avtocase' ),
		]
	);
}

function disable_unneeded_assets() {
	// Disable built-in emoji support (small speed gain):contentReference[oaicite:5]{index=5}:contentReference[oaicite:6]{index=6}
	remove_action('wp_head','print_emoji_detection_script', 7);
	remove_action('wp_print_styles','print_emoji_styles');
	remove_action('admin_print_scripts','print_emoji_detection_script');
	remove_action('admin_print_styles','print_emoji_styles');
	// Disable oEmbed front-end script (wp-embed.min.js):contentReference[oaicite:7]{index=7}
	wp_deregister_script('wp-embed');
	// (Optionally) Disable dashicons on front-end if not needed:
	if (!is_admin()) { wp_dequeue_style('dashicons'); }
}
