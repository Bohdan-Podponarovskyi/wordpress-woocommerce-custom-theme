<?php if ( have_rows('grid_bento') ) : ?>
    <section class="grid-bento">
        <div class="container container--sm">
            <h3 class="grid-bento__title heading--h3 heading--h2-desktop">
                <?php echo  get_field('heading') ?>
            </h3>
            <div class="grid-bento__inner">
				<?php
				$class_order = ['tall', '', 'reverse', 'wide', '', '', 'tall', 'wide'];

				$bottom_indexes = [2, 7];

				$index = 0;

				while ( have_rows('grid_bento') ) : the_row();
					$title = get_sub_field('title');
					$subtitle = get_sub_field('subtitle');
					$image = get_sub_field('image');
					$image_mobile = get_sub_field('image_mobile');

					$current_class = isset($class_order[$index]) ? $class_order[$index] : $class_order[$index % count($class_order)];

					$extra_class = in_array($index, $bottom_indexes) ? 'bottom' : '';

					$index++;
					?>
                    <div class="grid-bento__item card <?php echo $current_class; ?>">
                        <div class="grid-bento__text-wrap <?php echo $extra_class; ?>">
                            <h4 class="heading--h5 heading--h4-desktop">
								<?php echo $title; ?>
                            </h4>
                            <p><?php echo $subtitle; ?></p>
                        </div>
                        <div class="grid-bento__img-wrap">
                            <picture>
                                <source media="(min-width: 1140px)"
                                        data-srcset="<?php echo $image; ?>">
                                <img data-src="<?php echo $image_mobile; ?>"
                                     alt="<?php echo $title; ?>"
                                     class="lazy">
                            </picture>
                        </div>
                    </div>
				<?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
