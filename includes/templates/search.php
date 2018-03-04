<?php
	get_header();
	$url_css = WP_PLUGIN_URL .'/wp-youtube-dl/public/css/style.css';
	$url_video = WP_PLUGIN_URL .'/wp-youtube-dl/public/download.php?id=';
?>
<link rel="stylesheet" href="<?php echo $url_css; ?>">

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">	
			<div id="buttons" style="width: 100%;display: inline-flex;"> 
				<input id="query" type="text" style="width: 80%;" />
				<button id="search-button" style="width: 20%;">Buscar</button>
			</div>
			<div id="results">
			</div>			
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php 
	wp_register_script(
		'wp-youtube-dl-jqscript', 
		WP_PLUGIN_URL. '/wp-youtube-dl/public/js/jquery.min.js', 
		array('jquery'), 
		'1', 
		true 
	);
	wp_enqueue_script('wp-youtube-dl-jqscript'); 
	wp_register_script(
		'wp-youtube-dl-script', 
		WP_PLUGIN_URL. '/wp-youtube-dl/public/js/script.js', 
		array('jquery'), 
		'1', 
		true 
	);
	wp_enqueue_script('wp-youtube-dl-script'); 
	wp_localize_script(
		'wp-youtube-dl-script', 
		'my_ajax_object',  
		array( 
			'ajax_url' => admin_url( 'admin-ajax.php' ) 
		) 
	);
	get_footer();