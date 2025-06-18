<?php
/**
 * Template Name: Dev UI Kit
 */
?>

<?php get_header(); ?>

<style>
    main {
        padding-top: 100px;
    }
</style>

<div id="smooth-wrapper">
    <div id="smooth-content">
        <section class="ui-kit">
            <div class="container">
                <div class="typo">
                    <h1 class="heading--h2 heading--h1-desktop">Heading h1</h1>

                    <h2 class="heading--h3 heading--h2-desktop">Heading h2</h2>

                    <h3 class="heading--h4 heading--h3-desktop">Heading h3</h3>

                    <h4 class="heading--h5 heading--h4-desktop">Heading h4</h4>

                    <h5 class="heading--h5 heading--h5-desktop">Heading h5</h5>

                    <div class="subheading">Subheading</div>
                    <div class="footnote">footnote</div>
                    <div class="caption">caption</div>
                </div>
                <div class="buttons" style="display:flex; align-items: center; gap: 16px; flex-wrap: wrap; margin: 40px 0;">

                    <!-- simple btns -->
                    <button class="btn btn--primary">
                        <span class="btn__text">Label</span>
                    </button>

                    <button class="btn btn--outline">
                        <span class="btn__text">Label</span>
                    </button>

                    <button class="btn btn--promo">
                        <span class="btn__text">Label</span>
                    </button>

                    <!-- btn counter -->
                    <button class="btn btn--primary btn--text-icon-left">
                <span class="btn__counter">
                    1
                </span>
                        <span class="btn__text">Label</span>
                    </button>

                    <!-- text icons-left btns -->
                    <button class="btn btn--primary btn--text-icon-left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span class="btn__text">Label</span>
                    </button>

                    <button class="btn btn--outline btn--text-icon-left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span class="btn__text">Label</span>
                    </button>

                    <button class="btn btn--promo btn--text-icon-left">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span class="btn__text">Label</span>
                    </button>

                    <!-- text icons-right btns -->
                    <button class="btn btn--primary btn--text-icon-right">
                        <span class="btn__text">Label</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </button>

                    <button class="btn btn--outline btn--text-icon-right">
                        <span class="btn__text">Label</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </button>

                    <button class="btn btn--promo btn--text-icon-right">
                        <span class="btn__text">Label</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </button>

                    <!-- double icons btns -->
                    <button class="btn btn--primary btn--text-icon-double">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span class="btn__text">Label</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="white" stroke-width="2"/>
                        </svg>
                    </button>

                    <button class="btn btn--outline btn--text-icon-double">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span class="btn__text">Label</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </button>

                    <button class="btn btn--promo btn--text-icon-double">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span class="btn__text">Label</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </button>

                    <!-- single icons btns -->
                    <button class="btn btn--primary btn--icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </button>

                    <button class="btn btn--outline btn--icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </button>

                    <button class="btn btn--promo btn--icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </button>

                    <!-- rounded btns -->
                    <button class="btn btn--primary btn--rounded">
                        <span class="btn__text">Label</span>
                    </button>

                    <button class="btn btn--promo btn--text-icon-double btn--rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span class="btn__text">Label</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </button>

                    <button class="btn btn--outline btn--icon btn--rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="7" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </button>
                </div>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
