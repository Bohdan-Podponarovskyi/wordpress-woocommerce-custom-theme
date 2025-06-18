<?php

namespace Avtocase;

/**
 * Theme setup
 */
require get_theme_file_path( 'inc/includes/theme-setup.php' );

/**
 * Custom collapsible admin bar
 */
require get_theme_file_path( 'inc/includes/custom-collapse-admin-bar.php' );

/**
 * Nav walkers
 */
require get_theme_file_path( '/inc/includes/nav-walker-header.php' );
//require get_theme_file_path( '/inc/includes/nav-walker-footer.php' );

/**
 * Customizer API
 */
require get_theme_file_path( '/inc/includes/customizer.php' );