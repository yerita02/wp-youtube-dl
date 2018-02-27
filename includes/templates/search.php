<?php
	$url_auth = str_replace('/includes/templates', '', plugins_url( 'public/js/auth.js', __FILE__));
	$url_search = str_replace('/includes/templates', '', plugins_url( 'public/js/search.js', __FILE__));
	$string = explode('includes', plugin_dir_path( __FILE__ ));
	$url = $string[0];
?>

<!doctype html>
<html>
	<head>
		<title>Search</title>
	</head>
	<body>
		<div id="buttons">
			<label> 
				<input id="query" value='cats' type="text"/>
				<button id="search-button" disabled onclick="search()">Search</button>
			</label>
		</div>
		<div id="search-container">
		</div>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script src="<?php echo $url_auth; ?>"></script>
		<script src="<?php echo $url_search; ?>"></script>
		<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>
	</body>
</html>