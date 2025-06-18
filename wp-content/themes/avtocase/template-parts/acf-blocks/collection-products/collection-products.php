<?php

defined( 'ABSPATH' ) || exit;

$category     = get_field( 'category' );
$custom_title = get_field( 'heading' );

$section_title = $custom_title ?:
	(is_object( $category ) ? $category->name :
		__( 'Магазин', 'avtocase' ));

$btn_link = $category ? get_term_link( $category ) : wc_get_page_permalink( 'shop' );
$btn_text = $category ?
	__( 'Переглянути всі', 'avtocase' ) :
	__( 'До каталогу', 'avtocase' );
?>

<section class="products woocommerce" data-swiper-block>
    <div class="container--full-mob">
        <div class="products__inner">
            <div class="products__header">
                <h3 class="heading--h3"><?php echo esc_html( $section_title ); ?></h3>
	            <?php if ( $btn_text && $btn_link ) { ?>
                    <a class="btn btn--outline" href="<?php echo esc_url( $btn_link ); ?>">
                        <span class="btn__text"><?php echo esc_html( $btn_text ); ?></span>
                    </a>
	            <?php } ?>
            </div>
            <?php echo Avtocase\swiper_collection_products( $category ); ?>
        </div>
    </div>
</section>