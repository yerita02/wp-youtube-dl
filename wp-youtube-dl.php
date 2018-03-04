<?php
/**
* Plugin Name: Buscador de Videos
* Plugin URI: 
* Description: Este plugin proveera las funcionalidades para hacer busquedas de videos desde un input tipo autocompletar. Los videos son obtenidos por medios de la API de YouTube. 
* Version: 1.0.0
* Author: Yeraldine Martinez
* Author URI: https://www.linkedin.com/in/yerita02
* License: GPL2
*/

require_once('includes/wp-youtube-dl.class.php');
require_once('includes/wp-youtube-dl-functions.php');

if ( is_admin() ) {
	function add_admin_page(){
    	add_menu_page(
	        __( 'Buscador YouTube', 'textdomain' ),
	        'Buscador YouTube',
	        'manage_options',
	        'wp-youtube-dl',
	        'wp_youtube_dl_admin_page',
	        'dashicons-video-alt3',
	        68
		);
    }

    function wp_youtube_dl_admin_page(){
    	include('admin/wp-youtube-dl-admin.php'); 	
    }
	add_action( 'admin_menu', 'add_admin_page' ); 
}

add_filter('template_include', 'include_template_wp_youtube_dl_function', 1 );

add_action('wp_ajax_nopriv_wp_youtube_dl_load_data_ajustes', 'wp_youtube_dl_load_data_ajustes');
add_action('wp_ajax_wp_youtube_dl_load_data_ajustes', 'wp_youtube_dl_load_data_ajustes');

add_action('wp_ajax_nopriv_wp_youtube_dl_load_data_video', 'wp_youtube_dl_load_data_video');
add_action('wp_ajax_wp_youtube_dl_load_data_video', 'wp_youtube_dl_load_data_video');

register_activation_hook( __FILE__, 'wp_youtube_dl_init');
function wp_youtube_dl_init(){	
	WP_YouTube_dl::init();
}

register_deactivation_hook(__FILE__, 'wp_youtube_dl_remove');
function wp_youtube_dl_remove(){
	WP_YouTube_dl::remove();
}