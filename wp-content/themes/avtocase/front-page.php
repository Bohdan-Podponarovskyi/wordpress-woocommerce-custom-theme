<?php
/**
 * Template Name: Home
 */
?>

<?php get_header(); ?>

<main id="main" class="main avtocase-page avtocase-page--home">
	<?php get_template_part( 'template-parts/sections/hero-video' ); ?>
	<?php the_content(); ?>
</main>

<?php get_footer(); ?>
