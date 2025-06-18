<?php

namespace Avtocase;

function dequeue_unneeded_woocommerce_assets() {
	if ( function_exists( 'is_woocommerce' ) ) {
		// If on non-WooCommerce pages, remove all Woo assets
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
			wp_dequeue_style( 'woocommerce-general' );
			wp_dequeue_style( 'woocommerce-layout' );
			wp_dequeue_style( 'woocommerce-smallscreen' );
			wp_dequeue_style( 'wc-block-style' );              // WooCommerce block styles
			wp_dequeue_style( 'wc-block-vendors-style' );      // (WooCommerce blocks)
			// Scripts (only if not needed site-wide)
			wp_dequeue_script( 'flexslider' );                // product image carousel
			wp_dequeue_script( 'photoswipe' );
			wp_dequeue_script( 'photoswipe-ui-default' );
//			wp_dequeue_script( 'select2' );                   // legacy select library
//			wp_dequeue_script( 'selectWoo' );                 // modern select library (for attributes)
			wp_dequeue_script( 'wc-price-slider' );           // price filter script
		}
		// Preserve add-to-cart and cart fragments on shop pages
		// *Do not remove* 'wc-add-to-cart', 'wc-cart-fragments', etc.
	}
	// For checkout pages: optionally remove unnecessary scripts
	if ( is_checkout() ) {
		wp_dequeue_script( 'wc-country-select' );
		wp_dequeue_script( 'wc-address-i18n' );           // auto city/zip fill
		wp_dequeue_script( 'wc-credit-card-form' );
	}
}

// product card title
function template_loop_product_title() {
	global $product;
	echo '<h2 class="product-card__title">' . $product->get_title() . '</h2>';
}

// swiper product loop
function swiper_collection_products( $selected_category, $limit = 8, $orderby = 'menu_order', $order = 'DESC'  ) {
	$args = array(
		'status'   => 'publish',
		'limit'    => $limit,
		'orderby'  => $orderby,
		'order'    => $order,
	);

	if ( $selected_category ) {
		$category_slug = is_object($selected_category) ? $selected_category->slug : $selected_category;
		$args['category'] = array( $category_slug );
	} else {
		// No category selected - get featured products
		$args['featured'] = true;
	}

	$products = wc_get_products( $args );

	if ( empty( $products ) ) {
		return '';
	}

	ob_start();
	foreach ( $products as $product ) {
		$GLOBALS['product'] = $product; // Set global product
		wc_get_template_part( 'content', 'product' );
	}
	$product_cards = ob_get_clean();

	return '<div class="swiper products__swiper" data-swiper-container data-swiper-type="products"><ul class="swiper-wrapper products__list grid--swiper">' . $product_cards . '</ul></div>';
}

function custom_breadcrumbs() {
	return array(
		'delimiter'   => '<li class="delimiter" aria-hidden="true">•</li>',
		'wrap_before' => '<nav class="woocommerce-breadcrumb breadcrumbs heavy" aria-label="Breadcrumb"><ul>',
		'wrap_after'  => '</ul></nav>',
		'before'      => '<li>',
		'after'       => '</li>',
		'home'        => __( 'Магазин', 'avtocase' ),
	);
}

function custom_breadcrumb_home_url() {
	return wc_get_page_permalink( 'shop' );
}

function custom_cart_fragments( $fragments ) {
	$fragments['span#mini-cart-counter'] = '<span class="mini-cart__counter cart-counter heavy" id="mini-cart-counter" aria-live="polite" aria-label="' . esc_attr_e( 'Кількість продуктів у кошику', 'avtocase' ) . '">' . count( WC()->cart->get_cart() ) . '</span>';
//	$fragments['span.cart-icon-counter'] = '<span class="cart-icon-counter" aria-live="polite" aria-label="' . esc_attr_e( 'Кількість продуктів у кошику', 'avtocase' ) . '">' . count( WC()->cart->get_cart() ) . '</span>';
	return $fragments;
}