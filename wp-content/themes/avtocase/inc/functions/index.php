<?php

namespace Avtocase;

function sprite_url() {
	return get_template_directory_uri() . '/assets/icons/sprite.svg';
}

function image_url( $image ) {
	return get_template_directory_uri() . '/assets/images/' . $image;
}

function dump( $data ) {
	echo '<pre>' . print_r( $data, true ) . '</pre>';
}

function clean_phone( $phone ) {
	return preg_replace( '/[^0-9]/', '', $phone );
}

function process_btn_link( $link ) {
	$site_url    = get_site_url();
	$site_domain = parse_url( $site_url, PHP_URL_HOST );

	if ( filter_var( $link, FILTER_VALIDATE_URL ) ) {
		$link_domain = parse_url( $link, PHP_URL_HOST );

		if ( $link_domain === $site_domain ) {
			$parsed_url = parse_url( $link );
			$path       = isset( $parsed_url['path'] ) ? $parsed_url['path'] : '/';

			if ( isset( $parsed_url['query'] ) ) {
				$path .= '?' . $parsed_url['query'];
			}

			if ( isset( $parsed_url['fragment'] ) ) {
				$path .= '#' . $parsed_url['fragment'];
			}

			return $site_url . $path;
		}

		return $link; // External link, return as-is
	} else {
		// Relative link
		$link = ltrim( $link, '/' );

		return $site_url . '/' . $link;
	}
}