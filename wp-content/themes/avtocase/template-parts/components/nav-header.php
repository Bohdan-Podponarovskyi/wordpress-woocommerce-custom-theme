<nav class="menu">
    <?php
    wp_nav_menu( array(
            'theme_location' => 'header-nav-left',
            'container' => false,
            'menu_class' => 'menu__list',
            'walker' => new Avtocase\Nav_Walker_Header(),
    ))
    ?>
</nav>
<?php get_template_part('template-parts/components/logo'); ?>
<nav class="menu">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'header-nav-right',
		'container' => false,
		'menu_class' => 'menu__list',
		'walker' => new Avtocase\Nav_Walker_Header(),
	))
	?>
</nav>