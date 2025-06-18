<?php

namespace Avtocase;

use WP_Customize_Control;
const NAMESPACE_LOWER = 'avtocase';

function customize_register( $wp_customize ) {
	$wp_customize->add_section( NAMESPACE_LOWER . '_theme_options', array(
		'title'    => __( 'Опції теми', 'avtocase' ),
		'priority' => 10,
	) );

	// Phone 1_
	$wp_customize->add_setting( NAMESPACE_LOWER . '_phone_1', array() );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, NAMESPACE_LOWER . '_phone_1', array(
		'label' => __( 'Футер - Номер телефону 1', 'avtocase' ),
		'section' => NAMESPACE_LOWER . '_theme_options',
	) ) );

	// Phone 2
	$wp_customize->add_setting( NAMESPACE_LOWER . '_phone_2', array() );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, NAMESPACE_LOWER . '_phone_2', array(
		'label' => __( 'Футер - Номер телефону 2', 'avtocase' ),
		'section' => NAMESPACE_LOWER . '_theme_options',
	) ) );

	// Social 1
	$wp_customize->add_setting( NAMESPACE_LOWER . '_social_name_1', array() );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, NAMESPACE_LOWER . '_social_name_1', array(
		'label' => __( 'Футер - Назва соцмережі 1', 'avtocase' ),
		'section' => NAMESPACE_LOWER . '_theme_options',
	) ) );

	$wp_customize->add_setting( NAMESPACE_LOWER . '_social_link_1', array() );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, NAMESPACE_LOWER . '_social_link_1', array(
		'label' => __( 'Футер - Лінк соцмережі 1', 'avtocase' ),
		'section' => NAMESPACE_LOWER . '_theme_options',
	) ) );

	// Social 2
	$wp_customize->add_setting( NAMESPACE_LOWER . '_social_name_2', array() );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, NAMESPACE_LOWER . '_social_name_2', array(
		'label' => __( 'Футер - Назва соцмережі 2', 'avtocase' ),
		'section' => NAMESPACE_LOWER . '_theme_options',
	) ) );

	$wp_customize->add_setting( NAMESPACE_LOWER . '_social_link_2', array() );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, NAMESPACE_LOWER . '_social_link_2', array(
		'label' => __( 'Футер - Лінк соцмережі 2', 'avtocase' ),
		'section' => NAMESPACE_LOWER . '_theme_options',
	) ) );
}

add_action( 'customize_register', __NAMESPACE__ . '\customize_register' );

function theme_options(  ) {
	return array(
		'phone_1' => get_theme_mod( NAMESPACE_LOWER . '_phone_1', '' ),
		'phone_2' => get_theme_mod( NAMESPACE_LOWER . '_phone_2', '' ),
		'social_name_1' => get_theme_mod( NAMESPACE_LOWER . '_social_name_1', '' ),
		'social_link_1' => get_theme_mod( NAMESPACE_LOWER . '_social_link_1', '' ),
		'social_name_2' => get_theme_mod( NAMESPACE_LOWER . '_social_name_2', '' ),
		'social_link_2' => get_theme_mod( NAMESPACE_LOWER . '_social_link_2', '' ),
	);
}
