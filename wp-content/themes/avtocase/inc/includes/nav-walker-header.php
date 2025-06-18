<?php

namespace Avtocase;

class Nav_Walker_Header extends \Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = null) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}

	function end_lvl(&$output, $depth = 0, $args = null) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$classes = empty($item->classes) ? array() : (array) $item->classes;
		$classes[] = 'menu__item';

		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

		$id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li' . $id . $class_names .'>';

		$attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
		$attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
		$attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
		$attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';

		$link_class = 'menu__link';
		$link_content = '';

		// Special handling for cart if needed
		if (in_array('cart-item', $classes)) {
			$link_class = 'menu__cart';
			$link_content = '<span class="svg-wrap"><svg><use href="' . sprite_url() . '#cart"></use></svg></span>';
		} else {
			$link_content = (isset($args->link_before) ? $args->link_before ?? '' : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after ?? '' : '');
		}

		$item_output = isset($args->before) ? $args->before ?? '' : '';
		$item_output .= '<a class="' . $link_class . '"' . $attributes .'>';
		$item_output .= $link_content;
		$item_output .= '</a>';
		$item_output .= isset($args->after) ? $args->after ?? '' : '';

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}

	function end_el(&$output, $item, $depth = 0, $args = null) {
		$output .= "</li>\n";
	}
}