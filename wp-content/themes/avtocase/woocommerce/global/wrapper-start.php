<?php
/**
 * Content wrappers
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/wrapper-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


$page_class = '';

if ( is_product_category() ) {
    $page_class = 'avtocase-page--category';
} elseif ( is_shop() ) {
    $page_class = 'avtocase-page--shop';
}

?>

<main id="main" class="main avtocase-page <?php echo $page_class; ?>">
    <?php if ( is_product_category() ) { ?>
	    <div class="container grid--category">
    <?php } ?>
