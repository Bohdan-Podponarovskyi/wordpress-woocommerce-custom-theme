<?php if ( have_rows( 'carousel_cards' ) ) :
	$card_class = get_field( 'card_type' ) ? get_field( 'card_type' ) : 'rectangular';
?>
    <section class="carousel-cards <?php echo $card_class; ?>" data-swiper-block>
        <div class="container--full-mob">
            <h2 class="carousel-cards__title heading--h3 heading--h2-desktop"><?php echo get_field( 'heading' ) ?></h2>
            <p class="carousel-cards__label label-message"><?php echo get_field( 'badge' ) ?></p>
            <div class="carousel-cards__inner">
                <div class="swiper carousel-cards__swiper" data-swiper-container data-swiper-type="cards">
                    <div class="swiper-wrapper">
			            <?php while ( have_rows( 'carousel_cards' ) ) : the_row(); ?>
                            <div class="swiper-slide card">
                                <div class="img-wrap carousel-cards__img-wrap">
                                    <picture>
                                        <source media="(min-width: 1140px)"
                                                data-srcset="<?php echo get_sub_field( 'img_desktop' ) ?>">
                                        <img data-src="<?php echo get_sub_field( 'img' ) ?>"
                                             alt="Slide image"
                                             class="lazy">
                                </div>
                            </div>
			            <?php endwhile; ?>
                    </div>
                </div>
                <?php get_template_part('template-parts/components/nav', 'swiper', 'btn--primary'); ?>
            </div>
        </div>
    </section>
<?php endif ?>