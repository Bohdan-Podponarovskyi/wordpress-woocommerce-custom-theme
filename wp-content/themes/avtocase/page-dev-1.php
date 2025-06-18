<?php
/**
 * Template Name: Dev_1
 */
?>

<style>
	header {
		display: none !important;
	}
</style>

<?php get_header(); ?>
<?php //echo do_shortcode('[avtocase_recent_products]') ?>
<?php the_content(); ?>
<?php //get_template_part('template-parts/sections/about'); ?>
<?php get_footer(); ?>
