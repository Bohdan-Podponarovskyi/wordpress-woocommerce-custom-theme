<?php

namespace Avtocase;

/**
 * Styles and scripts
 */
require_once get_theme_file_path( '/inc/hooks/styles-scripts.php' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_theme_scripts' );
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_acf_block_styles', 20 );
//add_action( 'wp_default_scripts', __NAMESPACE__ . '\move_jquery_into_footer' );

/**
 * Gutenberg
 */
add_action( 'enqueue_block_editor_assets', __NAMESPACE__ . '\enqueue_block_editor_assets' );

/**
 * ACF blocks
 */
require_once get_theme_file_path( '/inc/hooks/acf-blocks.php' );
add_filter( 'block_categories_all', __NAMESPACE__ . '\add_custom_block_category', 10 );
add_action( 'init', __NAMESPACE__ . '\register_acf_blocks' );

/**
 * Woocommerce
 */
require_once get_theme_file_path( 'inc/hooks/woocommerce.php' );

// general
//remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
//remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
add_filter( 'woocommerce_price_trim_zeros', '__return_true' );
//add_action('wp_enqueue_scripts', __NAMESPACE__ . '\dequeue_unneeded_woocommerce_assets', 999);

// product card
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title',  __NAMESPACE__ . '\template_loop_product_title', 10 );

// shop/category page
add_filter( 'woocommerce_breadcrumb_defaults', __NAMESPACE__ . '\custom_breadcrumbs' );
add_filter( 'woocommerce_breadcrumb_home_url', __NAMESPACE__ . '\custom_breadcrumb_home_url' );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );

// mini-cart
remove_action( 'woocommerce_widget_shopping_cart_buttons', 'woocommerce_widget_shopping_cart_button_view_cart', 10 );
add_filter( 'woocommerce_add_to_cart_fragments', __NAMESPACE__ . '\custom_cart_fragments' );
add_filter( 'woocommerce_product_variation_title_include_attributes', '__return_false' );
add_filter( 'woocommerce_is_attribute_in_product_name', '__return_false' );

// https://stackoverflow.com/questions/47377644/remove-attribute-values-from-product-variation-title-and-show-them-on-separate-r/47380351#47380351