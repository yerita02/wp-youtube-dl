<?php

	function include_template_wp_youtube_dl_function( $template_path ) {
		global $post;

		if($post->ID == get_option('wp_youtube_dl-id_page')){
			/*$string = explode('/themes', TEMPLATEPATH);
			$template_path = $string[0] . '/plugins/wp_youtube_dl/includes/templates/search.php';*/
			$template_path = plugin_dir_path( __FILE__ ). 'templates/search.php';
		}
	    
	    return $template_path;
	} 