<?php

namespace Avtocase;

function get_acf_blocks() {
	return [
		'avtocase/section-about' => 'about',
		'avtocase/carousel-banners' => 'carousel-banners',
		'avtocase/carousel-cards' => 'carousel-cards',
		'avtocase/grid-bento' => 'grid-bento',
	];
}

function move_jquery_into_footer( $wp_scripts ) {
	if ( ! is_admin() ) {
		$wp_scripts->add_data( 'jquery', 'group', 1 );
		$wp_scripts->add_data( 'jquery-core', 'group', 1 );
		$wp_scripts->add_data( 'jquery-migrate', 'group', 1 );
	}
}

function enqueue_theme_scripts() {

	// Get current URL path
	$current_url = $_SERVER['REQUEST_URI'];

	// Default version is empty (will load original files)
	$version = '';

	// Check if URL contains dev-X pattern
	if ( preg_match( '/dev-(\d+)/', $current_url, $matches ) ) {
		// Extract the number
		$version = '-' . $matches[1];
	}

//	wp_enqueue_style( 'styles',
//		get_theme_file_uri( get_asset_file( 'global.css' ) ),
//		[],
//		filemtime( get_theme_file_path( get_asset_file( 'global.css' ) ) )
//	);

	wp_enqueue_style(
		'avtocase-core',
		get_template_directory_uri() . '/assets/css/core' . $version . '.min.css',
		[],
		filemtime( get_template_directory() . '/assets/css/core' . $version . '.min.css' )
	);
	wp_enqueue_style(
		'avtocase-home',
		get_template_directory_uri() . '/assets/css/home' . $version . '.min.css',
		[],
		filemtime( get_template_directory() . '/assets/css/home' . $version . '.min.css' )
	);

	// Enqueue jquery and front-end.js
	wp_enqueue_script( 'jquery-core' );
//	wp_enqueue_script( 'scripts',
//		get_theme_file_uri( get_asset_file( 'front-end.js' ) ),
//		[],
//		filemtime( get_theme_file_path( get_asset_file( 'front-end.js' ) ) ),
//		true
//	);

	wp_enqueue_script( 'avtocase-core', get_template_directory_uri() . '/assets/js/core' . $version . '.min.js',
		array(),
		filemtime( get_template_directory() . '/assets/js/core' . $version . '.min.js' ),
		array(
			'in_footer' => true,
			'strategy'  => 'defer',
		)
	);

	wp_deregister_style( 'global-styles' );
	wp_dequeue_style( 'global-styles' );
}

function enqueue_acf_block_styles() {
	global $post;

	// Handle WooCommerce shop page separately
	if (function_exists('is_shop') && is_shop()) {
		$shop_page_id = wc_get_page_id('shop');
		if ($shop_page_id) {
			$post = get_post($shop_page_id);
		}
	}

	if ( ! $post ) return;

	$acf_blocks = get_acf_blocks();

	foreach ( $acf_blocks as $block_name => $css_name ) {
		if ( has_block( $block_name, $post ) ) {
			wp_enqueue_style(
				'avtocase-block-' . $css_name,
				get_template_directory_uri() . '/assets/css/acf-blocks/' . $css_name . '.min.css',
				['avtocase-core'],
				filemtime( get_template_directory() . '/assets/css/acf-blocks/' . $css_name . '.min.css' )
			);
		}
	}
}

function enqueue_acf_block_editor_styles() {
	$used_blocks = get_acf_blocks();

	foreach ( $used_blocks as $block_name => $css_name ) {
		wp_enqueue_style(
			'avtocase-block-editor-' . $css_name,
			get_template_directory_uri() . '/assets/css/acf-blocks/' . $css_name . '.min.css',
			['style-editor'],
			filemtime( get_template_directory() . '/assets/css/acf-blocks/' . $css_name . '.min.css' )
		);
	}
}

function enqueue_block_editor_assets() {
	wp_enqueue_style( 'style-editor', get_template_directory_uri() . '/assets/css/core.min.css' );
	wp_enqueue_style( 'home-style-editor', get_template_directory_uri() . '/assets/css/home.min.css' );

	enqueue_acf_block_editor_styles();

	wp_register_script( 'core-editor-script', get_template_directory_uri() . '/assets/js/core-editor-1.min.js', [ 'jquery' ], '1.0', true );

	wp_deregister_style( 'wp-reset-editor-styles' );
}