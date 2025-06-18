<?php
if ( is_front_page() ) {
	$class = 'header--transparent';
} else {
	$class = '';
}
?>
<header class="header <?php echo $class; ?>">
    <div class="header__inner">
		<?php get_template_part( 'template-parts/components/nav', 'header' ); ?>
    </div>
</header>
