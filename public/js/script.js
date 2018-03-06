var key;
var nro_max;
var nextPage;
var prevPage;

$(document).ready(function () {
	cargarDatosConfig();

  $('#search-button').click(function (event) {
      event.preventDefault();
      var searchTerm = $('#query').val();			        
      getRequest(searchTerm);
  });
});

function cargarDatosConfig(){
  jQuery(function($) {
    $.ajax({
      url: my_ajax_object.ajax_url,
      type: 'post',
      data: {
        action: 'wp_youtube_dl_load_data_ajustes',
      },
      success: function( data ) {
        var results = JSON.parse(data);
        key = results.api_key;
        nro_max = parseInt(results.nro_max);
      }
    });
  });
} 

function getRequest(searchTerm) {
	var htmlLoader = 	'<div id="loader" class="container">' + 
											'<div class="item item-1"></div>' + 
											'<div class="item item-2"></div>' +
											'<div class="item item-3"></div>' +
											'<div class="item item-4"></div>' +
										'</div>';
	$('.content-area').append(htmlLoader); 

  url = 'https://www.googleapis.com/youtube/v3/search';
  var params = {
    part: 'snippet',
    q: searchTerm,
    key: key,
    maxResults: 50
  };

  if(nextPage){
  	params.pageToken = nextPage;
  }

  $.getJSON(url, params, function (searchTerm) {
     showResults(searchTerm);
  });
}

function showResults(results) {  
  var entries = results.items;
  nextPage = results.nextPageToken;
  nextPage = results.prevPageToken;

  $.each(entries, function (index, value) {
    var title = value.snippet.title;
    var thumbnail = value.snippet.thumbnails.default.url;
    var videoId = value.id.videoId;
    var html = "";
    $('#results .video-item').remove();
    /*jQuery(function($) {*/
	    $.ajax({
	      url: my_ajax_object.ajax_url,
	      type: 'post',
	      data: {
	        action: 'wp_youtube_dl_load_data_video',
	        pDatos : {
	        	'idVideo' : videoId
	        }
	      },
	      success: function( data ) {
	        var results = JSON.parse(data);
	        /*console.log(results);*/
	        
	        if(results.length > 0){
	        	html += '<div class="video-item">';
				    html +=		'<img src="' + thumbnail + '" />';
				    html += 	'<div class="content-video"><p>' + title + '</p></div>';
				    html +=		'<div class="content-link">';

				    $.each(results, function (ind, videoData) {
				    	console.log(videoData);
				    	var url = videoData[0]['url'];
				    	if(videoData[1]['url']){
				    		url = videoData[1]['url'];
				    	}

				    	var type = videoData[0]['type'];
				    	if(videoData[1]['type']){
				    		type= videoData[1]['type'];
				    	}

				    	var clase = '';
				    	if(type == 'video/mp4'){
				    		type = 'MP4';
				    		clase = 'label label-success';
				    	}else if(type == 'video/3gpp'){
				    		type = '3GPP';
				    		clase = 'label label-warning';
				    	}else if(type == 'video/webm'){
				    		type = 'WEBM';
				    		clase = 'label label-info';
				    	}

				    	html += '<a class="video-item-link '+clase+'" download href="'+ url +'">' + type + '</a>';
				    });
				    html += '</div></div>';

				    $('#results').append(html);
	        }
	      }
	    });
	  /*});*/   
  }); 

  
  $('#loader').remove();				    
}
