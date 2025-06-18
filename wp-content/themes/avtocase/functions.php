<?php

namespace Avtocase;

/**
 * Required files
 */
require_once get_theme_file_path( '/inc/hooks.php' );
require_once get_theme_file_path( '/inc/includes.php' );
require_once get_theme_file_path( '/inc/functions/index.php' );

/**
 * Theme setup
 */
add_action( 'after_setup_theme', __NAMESPACE__ . '\setup_theme' );
add_action( 'init', __NAMESPACE__ . '\disable_unneeded_assets');

/**
 * Custom collapsible admin bar
 */
add_action( 'init', [ Custom_Collapse_Admin_Bar::class, 'init' ] );