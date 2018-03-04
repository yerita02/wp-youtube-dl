<?php

	function include_template_wp_youtube_dl_function( $template_path ) {
		global $post;

		if($post->ID == get_option('wp_youtube_dl-id_page')){
			$template_path = plugin_dir_path( __FILE__ ). 'templates/search.php';
		}
	    
	    return $template_path;
	} 

	function wp_youtube_dl_load_data_ajustes(){
        $arrDatos['api_key'] = get_option('wp_youtube_dl-api_key');
        $arrDatos['nro_max'] = get_option('wp_youtube_dl-nro_max');

        echo json_encode($arrDatos);
        exit();
    }	

    function wp_youtube_dl_load_data_video(){
    	$paramDatos=$_POST['pDatos'];
		$id = $paramDatos['idVideo'];

		parse_str(file_get_contents('http://www.youtube.com/get_video_info?video_id='.$id), $video_data);
		$streams = empty($video_data['url_encoded_fmt_stream_map']) ? null : $video_data['url_encoded_fmt_stream_map'];
		$arrDatos = array();
		if(!empty($streams)){			
			$streams = explode(',',$streams);
			$counter = 1;
			foreach ($streams as $ind => $data) {
				parse_str($data,$data);
				foreach ($data as $key => $value) {
					if($key == 'url' || $key == 'type'){
						if($key == 'type'){
							$value = explode(';',$value)[0];
						}						

						$arrDatos[$ind][][$key] = $value;
					}
				}
				$counter++;
			}
		}

        echo json_encode($arrDatos);
        exit();
    }