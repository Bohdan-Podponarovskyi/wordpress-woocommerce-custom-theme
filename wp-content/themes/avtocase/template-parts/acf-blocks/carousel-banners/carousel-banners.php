<?php if ( have_rows( 'carousel_banners' ) ) : ?>
    <section class="carousel-banners" data-swiper-block>
        <div class="container container--sm">
            <div class="carousel-banners__inner">
                <div class="swiper carousel-banners__swiper" data-swiper-container data-swiper-type="banners">
                    <div class="swiper-wrapper">
			            <?php while ( have_rows( 'carousel_banners' ) ) : the_row();
				            $heading     = acf_esc_html( get_sub_field( 'heading' ) );
				            $description = acf_esc_html( get_sub_field( 'description' ) );
				            $btn_text    = acf_esc_html( get_sub_field( 'btn_text' ) );
				            $btn_url     = acf_esc_html( get_sub_field( 'btn_url' ) );
				            ?>
                            <div class="swiper-slide carousel-banners__item">
                                <div class="carousel-banners__img-wrap">
                                    <picture>
                                        <source media="(min-width: 1140px)"
                                                data-srcset="<?php echo get_sub_field( 'img_desktop' )['url'] ?>">
                                        <source media="(min-width: 600px) and (max-width: 1139px)"
                                                data-srcset="<?php echo get_sub_field( 'img_tablet' )['url'] ?>">
                                        <img data-src="<?php echo get_sub_field( 'img' )['url'] ?>"
                                             alt="Image for slide with title <?php echo $heading ?>"
                                             class="lazy">
                                    </picture>
                                </div>
                                <div class="carousel-banners__item-content">
						            <?php if ( $heading ) : ?>
                                        <h3 class="heading--h4 heading--h3-desktop"><?php echo $heading ?></h3>
						            <?php endif; ?>
						            <?php if ( $description ) : ?>
                                        <p><?php echo $description ?></p>
						            <?php endif; ?>
						            <?php if ( $btn_url ) : ?>
                                        <a class="btn btn--promo" href="<?php echo $btn_url ?>">
                                            <span class="btn__text"><?php echo $btn_text ?></span>
                                        </a>
						            <?php endif; ?>
                                </div>
                            </div>
			            <?php endwhile; ?>
                    </div>
                </div>
                <div class="carousel-banners__swiper-nav">
		            <?php get_template_part('template-parts/components/nav', 'swiper', 'btn--primary'); ?>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>