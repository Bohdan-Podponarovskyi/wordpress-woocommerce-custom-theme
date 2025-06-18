<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;

get_header();

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

/**
 * Hook: woocommerce_sidebar.
 * Only display sidebar on product category pages, not on the main shop page
 *
 * @hooked woocommerce_get_sidebar - 10
 */
if ( is_product_category() ) { ?>
	<aside class="sidebar">
		<?php do_action( 'woocommerce_sidebar' ); ?>
	</aside>
<?php }

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
do_action( 'woocommerce_shop_loop_header' );

// Check if this is the main shop page (not a category page)
if ( is_shop() && ! is_product_category() ) {
	// SHOW CATEGORY SLIDERS INSTEAD OF REGULAR PRODUCT GRID

	$categories = get_terms( array(
		'taxonomy'   => 'product_cat',
		'hide_empty' => true,
		'exclude'    => array( get_option( 'default_product_cat' ) ),
		'orderby'    => 'menu_order', // Use custom order if set
		'order'      => 'ASC',
	) );

	if ( ! empty( $categories ) && ! is_wp_error( $categories ) ) {
		?>
        <?php foreach ( $categories as $category ) { ?>
            <section class="products woocommerce" data-swiper-block>
                <div class="container--full-mob">
                    <div class="products__inner">
                        <div class="products__header">
                            <h3 class="heading--h3"><?php echo esc_html( $category->name ); ?></h3>
                            <a class="btn btn--outline" href="<?php echo esc_url( get_term_link( $category ) ); ?>">
                                <span class="btn__text"><?php echo esc_html__( 'Переглянути всі', 'avtocase' ); ?></span>
                            </a>
                        </div>
                        <?php echo Avtocase\swiper_collection_products( $category, 8 ); ?>
                    </div>
                </div>
            </section>
        <?php } ?>
		<?php
	} else {
		do_action( 'woocommerce_no_products_found' );
	}

} else {
	// REGULAR PRODUCT LOOP FOR CATEGORY PAGES

	if ( woocommerce_product_loop() ) {
		do_action( 'woocommerce_before_shop_loop' );
		woocommerce_product_loop_start();

		if ( wc_get_loop_prop( 'total' ) ) {
			while ( have_posts() ) {
				the_post();
				do_action( 'woocommerce_shop_loop' );
				wc_get_template_part( 'content', 'product' );
			}
		}

		woocommerce_product_loop_end();
		do_action( 'woocommerce_after_shop_loop' );
	} else {
		do_action( 'woocommerce_no_products_found' );
	}
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

get_footer();
