<?php

	function include_template_eventos_function( $template_path ) {
	    if ( get_post_type() == 'eventos' ) {
	        if ( is_single() ) {
	            if ( $theme_file = locate_template( array ( 'single-eventos.php' ) ) ) {
	                $template_path = $theme_file;
	            } else {
	                $template_path = plugin_dir_path( __FILE__ ) . '/templates/single-eventos.php';
	            }
	        }

	        if ( is_archive() ) {
	            if ( $theme_file = locate_template( array ( 'archive-eventos.php' ) ) ) {
	                $template_path = $theme_file;
	            } else {
	                $template_path = plugin_dir_path( __FILE__ ) . '/templates/archive-eventos.php';
	            }
	        }
	    }
	    return $template_path;
	} 