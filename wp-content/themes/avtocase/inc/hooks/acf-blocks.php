<?php

namespace Avtocase;

function register_acf_blocks() {
	/**
	 * We register our block's with WordPress's handy
	 * register_block_type();
	 *
	 * @link https://developer.wordpress.org/reference/functions/register_block_type/
	 */
	register_block_type( get_template_directory() . '/template-parts/acf-blocks/carousel-banners' );
	register_block_type( get_template_directory() . '/template-parts/acf-blocks/carousel-cards' );
	register_block_type( get_template_directory() . '/template-parts/acf-blocks/grid-bento' );
	register_block_type( get_template_directory() . '/template-parts/acf-blocks/section-about' );
	register_block_type( get_template_directory() . '/template-parts/acf-blocks/collection-products' );
	register_block_type( get_template_directory() . '/template-parts/acf-blocks/seat-animation' );
	register_block_type( get_template_directory() . '/template-parts/acf-blocks/section-video' );
}

/**
 * Add custom block category
 * register_block_type();
 */
function add_custom_block_category( $categories ) {
	return array_merge(
		array(
			array(
				'slug'  => 'avtocase-blocks',
				'title' => 'Avtocase Theme Blocks',
			)
		),
		$categories
	);
}