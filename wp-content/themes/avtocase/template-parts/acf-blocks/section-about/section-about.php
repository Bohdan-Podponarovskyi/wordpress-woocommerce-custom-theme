<section class="about">
    <div class="about__container container--sm container">
        <div class="about__inner">
            <div class="about__top-wrap">
                <div class="about__top-card card">
                    <div class="about__icon-wrap about__icon-card">
                        <span class="svg-wrap">
                            <svg>
                                <use href="<?php echo Avtocase\sprite_url() ?>#card"></use>
                            </svg>
                        </span>
                    </div>
                    <div class="about__text-wrap">
                        <h3 class="about__text-title heading--h4 heading--h3-desktop "><?php echo get_field( 'about_card_heading' ); ?></h3>
                        <p class="about__text-desсr"><?php echo get_field( 'about_card_text' ); ?></p>
                    </div>
                </div>
                <div class="about__icon-arrow">
                    <span class="svg-wrap">
                        <svg>
                            <use href="<?php echo Avtocase\sprite_url() ?>#arrow"></use>
                        </svg>
                    </span>
                </div>
                <div class="about__top-card card">
                    <div class="about__icon-wrap about__icon-box">
                        <span class="svg-wrap">
                            <svg>
                                <use href="<?php echo Avtocase\sprite_url() ?>#box"></use>
                            </svg>
                        </span>
                    </div>
                    <div class="about__text-wrap">
                        <h3 class="about__text-title heading--h4 heading--h3-desktop"><?php echo get_field( 'about_box_heading' ); ?></h3>
                        <p class="about__text-desсr"><?php echo get_field( 'about_box_text' ); ?></p>
                    </div>
                </div>
            </div>


			<?php
			$img_url = get_field( 'about_bottom_image' );
			?>
            <div class="about__bottom-wrap lazy" data-bg="<?php echo Avtocase\image_url('about-bg.webp')?>">
                <div class="about__bottom-top">
                    <h3 class="about__bottom-title heading--h5 heading--h4-desktop custom-wysiwyg">
						<?php echo get_field( 'about_bottom_heading' ); ?>
                    </h3>
					<?php if ( $img_url ): ?>
                        <div class="about__img-wrap img-wrap">
                            <img
                                    class="lazy"
                                    data-src="<?php echo $img_url; ?>"
                                    alt="test"
                            >
                        </div>
					<?php endif; ?>

					<?php if ( have_rows( 'about_bottom_benefits' ) ): ?>
                        <div class="about__item custom-wysiwyg">
							<?php while ( have_rows( 'about_bottom_benefits' ) ): the_row();
								$number = get_sub_field( 'about_benefits_numeric' );
								$label  = get_sub_field( 'about_benefits_descr' );
								?>
                                <div class="about__item-benefits">
                                    <h2 class="about__item-title heading--h3 heading--h2-desktop">
										<?php echo $number; ?>
                                    </h2>
                                    <div class="about__item-descr">
										<?php echo $label; ?>
                                    </div>
                                </div>
							<?php endwhile; ?>
                        </div>
					<?php endif; ?>
                </div>

				<?php if ( $desc = get_field( 'about_bottom_text' ) ): ?>
                    <div class="about__bottom-descr">
						<?php echo $desc; ?>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </div>
</section>

