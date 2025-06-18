<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!--<body --><?php //body_class( 'modal-overlay-active' ); ?><!-->-->
<?php wp_body_open(); ?>
    <?php get_template_part( 'template-parts/sections/header', 'main' ); ?>
<!--    --><?php //woocommerce_mini_cart(); ?>
    <div id="smooth-wrapper">
        <div id="smooth-content">
