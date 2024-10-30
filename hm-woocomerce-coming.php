<?php
/*
Plugin Name: Hm woocommerce coming soon plugin
Plugin URI: http://wordpress.org/extend/plugins/wordpress-importer/
Description: Manage your comingsoon product easily in WooCommerce..
Author: wpheck
Author URI: http://wordpress.org/
Version: 1.0
Text Domain: hm-woo
License: GPL version 2 or later - http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/


if( ! defined( 'HMWCS_HACK_MSG' ) ) define( 'HMWCS_HACK_MSG', __( 'Sorry cowboy! This is not your place', 'hm-woo' ) );

/**
 * Protect direct access
 */
if ( ! defined( 'ABSPATH' ) ) die( HMWCS_HACK_MSG );

/**
 * Defining constants
 */
if( ! defined( 'HMWCS_VERSION' ) ) define( 'HMWCS_VERSION', '1.0.0' );
if( ! defined( 'HMWCS_MENU_POSITION' ) ) define( 'HMWCS_MENU_POSITION', 96 );
if( ! defined( 'HMWCS_PLUGIN_DIR' ) ) define( 'HMWCS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
if( ! defined( 'HMWCS_FILES_DIR' ) ) define( 'HMWCS_FILES_DIR', HMWCS_PLUGIN_DIR . 'hm-woocommerce-assets' );
if( ! defined( 'HMWCS_PLUGIN_URI' ) ) define( 'HMWCS_PLUGIN_URI', plugins_url( '', __FILE__ ) );
if( ! defined( 'HMWCS_FILES_URI' ) ) define( 'HMWCS_FILES_URI', HMWCS_PLUGIN_URI . '/hm-woocommerce-assets' );


require_once HMWCS_FILES_DIR . '/inc/setting.php';
require_once HMWCS_FILES_DIR . '/inc/enable-coming-soon.php';
require_once HMWCS_FILES_DIR . '/hm-woocommerce-coming-soon-scripts.php';
require_once HMWCS_FILES_DIR . '/inc/page-view.php';



function hmwcs_comingsoon() {
        global $post;
        if( !is_object($post) ) 
        return;
        if ( get_post_meta( $post->ID, 'comingsoon_custom_field', true ) == 'yes' ) {
            return true;
        } else {
            return false;
        }
    }

