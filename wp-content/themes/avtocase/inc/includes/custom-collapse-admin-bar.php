<?php

namespace Avtocase;

// admin bar customisation

final class Custom_Collapse_Admin_Bar {
	public static function init() {
		add_action( 'admin_bar_init', [ __CLASS__, 'hooks' ] );
	}

	public static function hooks() {
		// remove html margin bumps
		remove_action( 'wp_head', '_admin_bar_bump_cb' );

		add_action( 'wp_enqueue_scripts', [ __CLASS__, 'collapse_styles' ] );
		add_action( 'admin_bar_menu', [ __CLASS__, 'remove_nodes' ], 999 );
	}

	public static function collapse_styles() {
		$styles = "
          #wpadminbar
          {
             transition: clip-path .3s ease 1s, background-color .2s ease 1s;

             clip-path: polygon( 0 0, 32px 0, 32px 100%, 0 100% );
          }

          #wpadminbar:not( :hover )
          {
             background-color: rgba( 29, 35, 39, 0 );
          }

          #wpadminbar:not( :hover ) .ab-item::before
          {
             color: #1d2327;

             transition-delay: 1s;
          }

          #wpadminbar .ab-item
          {
             position: relative;
          }

          #wpadminbar #wp-admin-bar-site-name > .ab-item::after
          {
             content: '';
             position: absolute;
             top: 7px;
             left: 7px;
             z-index: -1;

             width: 20px;
             height: 20px;

             border-radius: 50%;

             background-color: #fff;

             opacity: .8;

             transition: opacity .2s ease 1s;
          }

          #wpadminbar:hover #wp-admin-bar-site-name > .ab-item::after
          {
             opacity: 0;

             transition-delay: 0s;
          }

          #wpadminbar:not( :hover ) > *
          {
             pointer-events: none;
          }

          #wpadminbar:hover
          {
             transition-delay: 0s;

             clip-path: polygon( 0 0, 100% 0, 100% 100vh, 0 100vh );
          }

          @media screen and ( max-width: 782px )
          {
             #wpadminbar
             {
                clip-path: polygon( 0 0, 50px 0, 50px 100%, 0 100% );
             }
             
              #wpadminbar #wp-admin-bar-site-name > .ab-item::after {
                 top: 13px;
	             left: 14px;
	             width: 24px;
	             height: 24px;
              }
          }
       ";

		wp_register_style( 'collapse-admin-bar', false );
		wp_add_inline_style( 'collapse-admin-bar', $styles );
		wp_enqueue_style( 'collapse-admin-bar' );
	}

	public static function remove_nodes( $wp_admin_bar ) {
		$wp_admin_bar->remove_node( 'wp-logo' );
		$wp_admin_bar->remove_node( 'search' );
	}
}