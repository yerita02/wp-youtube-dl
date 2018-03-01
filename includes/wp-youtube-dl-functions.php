<?php

	function include_template_wp_youtube_dl_function( $template_path ) {
		global $post;

		if($post->ID == get_option('wp_youtube_dl-id_page')){
			$template_path = plugin_dir_path( __FILE__ ). 'templates/search.php';
		}
	    
	    return $template_path;
	} 