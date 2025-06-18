<?php
// TODO: for footer
//    $avtocase_theme_options = Avtocase\theme_options();
//    AvtoCase\dump( $avtocase_theme_options );
//
//    if ( ! empty( $avtocase_theme_options['phone_1'] ) ) {
//	    echo $avtocase_theme_options['phone_1'];
//	    echo Avtocase\clean_phone( $avtocase_theme_options['phone_1'] );
//    }
//
//    if ( ! empty( $avtocase_theme_options['phone_2'] ) ) {
//	    echo $avtocase_theme_options['phone_2'];
//	    echo Avtocase\clean_phone( $avtocase_theme_options['phone_2'] );
//    }
//
//    if ( ! empty( $avtocase_theme_options['social_name_1'] ) ) {
//        echo $avtocase_theme_options['social_name_1'];
//    }
//    if ( ! empty( $avtocase_theme_options['social_link_1'] ) ) {
//        echo $avtocase_theme_options['social_link_1'];
//    }
//
//    if ( ! empty( $avtocase_theme_options['social_name_2'] ) ) {
//	    echo $avtocase_theme_options['social_name_2'];
//    }
//    if ( ! empty( $avtocase_theme_options['social_link_2'] ) ) {
//	    echo $avtocase_theme_options['social_link_2'];
//    }
?>


<footer class="footer lazy" data-bg="<?php echo Avtocase\image_url('footer-bg.webp')?>">
    <div class="footer__top">
        <div class="container container--md">
            <div class="footer__top-inner">
                <div class="footer__info">
                    <?php get_template_part('template-parts/components/logo'); ?>
                    <p class="footer__text">
                        У нас найбільший та найкращий вибір кейсів для авто. Чому? Тому що ти можеш створити кейс,
                        який тільки побажаєш! Індивідуальна вишивка, написи, лого, різні кольори,
                    </p>
                    <div class="footer__phones">
                        <a href="tel:" class="footer__phone heading--h3">095 333 84 44</a>
                        <a href="tel:" class="footer__phone heading--h3">098 333 84 44</a>
                    </div>
                    <div class="footer__links">
                        <a href="" class="footer__link btn btn--outline-light btn--text-icon-left">
                            <span class="svg-wrap">
                                <svg>
                                    <use href="<?php echo Avtocase\sprite_url() ?>#arrow-link"></use>
                                </svg>
                            </span>
                            <span class="btn__text">Підписатись на Instagram</span>
                        </a>
                        <a href="" class="footer__link btn btn--outline-light btn--text-icon-left">
                            <span class="svg-wrap">
                                <svg>
                                    <use href="<?php echo Avtocase\sprite_url() ?>#arrow-link"></use>
                                </svg>
                            </span>
                            <span class="btn__text">Підписатись на TikTok</span>
                        </a>
                    </div>
                </div>
                <div class="footer__nav">
                    <h3 class="footer__nav-title heading--h3 heading--h5-desktop">Меню</h3>
                    <div class="footer__menus">
                        <nav class="footer__menu">
                            <ul class="footer__menu-list">
                                <li class="footer__menu-item">
                                    <a href="" class="footer__menu-link">Головна</a>
                                </li>
                                <li class="footer__menu-item">
                                    <a href="" class="footer__menu-link">Магазин</a>
                                </li>
                                <li class="footer__menu-item">
                                    <a href="" class="footer__menu-link">Конструктор</a>
                                </li>
                                <li class="footer__menu-item">
                                    <a href="" class="footer__menu-link">Про нас</a>
                                </li>
                                <li class="footer__menu-item">
                                    <a href="" class="footer__menu-link">Контакти</a>
                                </li>
                            </ul>
                        </nav>
                        <nav class="footer__menu">
                            <ul class="footer__menu-list">
                                <li class="footer__menu-item">
                                    <a href="" class="footer__menu-link">Політика конфіденційності</a>
                                </li>
                                <li class="footer__menu-item">
                                    <a href="" class="footer__menu-link">Гарантії</a>
                                </li>
                                <li class="footer__menu-item">
                                    <a href="" class="footer__menu-link">Про оплату</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom lazy" data-bg="<?php echo Avtocase\image_url('footer-bg-marquee.webp')?>">
        <div class="footer__carousel" data-swiper-block>
            <div class="swiper carousel-marquee" data-swiper-container data-swiper-type="marquee">
                <div class="swiper-wrapper">
                    <div class="swiper-slide carousel-marquee__item">
<!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/scary-face.webp"-->
<!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">КЕЙСИ</div>
                    </div>
                    <div class="swiper-slide carousel-marquee__item">
<!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/stupid-face.webp"-->
<!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">ПОДУШКИ</div>
                    </div>
                    <div class="swiper-slide carousel-marquee__item">
<!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/mysterious-face.webp"-->
<!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">НАКИДКИ</div>
                    </div>
                    <div class="swiper-slide carousel-marquee__item">
<!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/funny-smile.webp"-->
<!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">КИЛИМКИ</div>
                    </div>

                    <div class="swiper-slide carousel-marquee__item">
<!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/scary-face.webp"-->
<!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">КЕЙСИ</div>
                    </div>
                    <div class="swiper-slide carousel-marquee__item">
<!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/stupid-face.webp"-->
<!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">ПОДУШКИ</div>
                    </div>
                    <div class="swiper-slide carousel-marquee__item">
<!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/mysterious-face.webp"-->
<!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">НАКИДКИ</div>
                    </div>
                    <div class="swiper-slide carousel-marquee__item">
<!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/funny-smile.webp"-->
<!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">КИЛИМКИ</div>
                    </div>
                    <div class="swiper-slide carousel-marquee__item">
                        <!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/scary-face.webp"-->
                        <!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">КЕЙСИ</div>
                    </div>
                    <div class="swiper-slide carousel-marquee__item">
                        <!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/stupid-face.webp"-->
                        <!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">ПОДУШКИ</div>
                    </div>
                    <div class="swiper-slide carousel-marquee__item">
                        <!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/mysterious-face.webp"-->
                        <!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">НАКИДКИ</div>
                    </div>
                    <div class="swiper-slide carousel-marquee__item">
                        <!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/funny-smile.webp"-->
                        <!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">КИЛИМКИ</div>
                    </div>

                    <div class="swiper-slide carousel-marquee__item">
                        <!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/scary-face.webp"-->
                        <!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">КЕЙСИ</div>
                    </div>
                    <div class="swiper-slide carousel-marquee__item">
                        <!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/stupid-face.webp"-->
                        <!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">ПОДУШКИ</div>
                    </div>
                    <div class="swiper-slide carousel-marquee__item">
                        <!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/mysterious-face.webp"-->
                        <!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">НАКИДКИ</div>
                    </div>
                    <div class="swiper-slide carousel-marquee__item">
                        <!--                        <img src="https://www.dev.avtocase.com.ua/wp-content/uploads/2025/05/funny-smile.webp"-->
                        <!--                             alt="emoji" class="carousel__labels-img">-->
                        <div class="carousel-marquee__text heading--h3 heading--h3--desktop">КИЛИМКИ</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
