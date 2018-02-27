<?php 
	$hidden_field_name = 'is_submit_hidden';	
	if(isset($_POST[$hidden_field_name]) && $_POST[$hidden_field_name] == 'Y') {
		if(!update_option('wp_youtube_dl-nro_max', $_POST['wp_youtube_dl-nro_max'])){
			add_option('wp_youtube_dl-nro_max',  $_POST['wp_youtube_dl-nro_max']);
		}

		if(!update_option('wp_youtube_dl-api_public_key', $_POST['wp_youtube_dl-api_public_key'])){
			add_option('wp_youtube_dl-api_public_key',  $_POST['wp_youtube_dl-api_public_key']);
		}

		if(!update_option('wp_youtube_dl-api_private_key', $_POST['wp_youtube_dl-api_private_key'])){
			add_option('wp_youtube_dl-api_private_key',  $_POST['wp_youtube_dl-api_private_key']);
		}

		if($_POST['page-dropdown'] != 0){			
			if(!update_option('wp_youtube_dl-id_page', $_POST['page-dropdown'])){
				add_option('wp_youtube_dl-id_page',  $_POST['page-dropdown']);
			}
		}
	
		?>
			<div id="setting-error-settings_updated" class="updated settings-error notice is-dismissible"> 
				<p><strong><?php _e('Ajustes guardados.' ); ?></strong></p>
				<button type="button" class="notice-dismiss"><span class="screen-reader-text">Descartar este aviso.</span></button>
			</div>
		<?php	
	}
?>

<div class='wrap'>
	<h1><?php echo __( 'Configuración de WP YouTube Download', 'wp-youtube-dl_textdomain' )  ?></h1>
	<form name="form-config" method="post" action="">
		<table class="form-table">
			<tbody>
				<tr>
					<td><b>Número de Videos por página:</b> </td>
					<td>
						<input class="small-text" type="number" max="100" min="1" step="1" name="wp_youtube_dl-nro_max" value="<?php echo get_option('wp_youtube_dl-nro_max') ; ?>" > 
					</td>
				</tr>		
				<tr>
					<td><b>API KEY Public Google YouTube:</b></td>
					<td>
						<input type="text" name="wp_youtube_dl-api_public_key" value="<?php echo get_option('wp_youtube_dl-api_public_key') ; ?>" size="80">
					</td>
				</tr>

				<tr>
					<td><b>API KEY Private Google YouTube:</b></td>
					<td>
						<input type="text" name="wp_youtube_dl-api_private_key" value="<?php echo get_option('wp_youtube_dl-api_private_key') ; ?>" size="80">
					</td>
				</tr>
				<tr>
					<td><b>Página para el buscador:</b></td>
					<td>
						<select name="page-dropdown"> 
							<option value="0"> <?php echo esc_attr( __( 'Seleccionar Página' ) ); ?> </option> 
							<?php 
								$pages = get_pages(); 
								$id_page_actual = get_option('wp_youtube_dl-id_page');
								foreach ( $pages as $page ) {
									$option = '<option value="' . $page->ID . '"'; 
									$option .= ($page->ID == $id_page_actual) ? ' selected ' : '';
									$option .= '>';
									$option .= $page->post_title;									
									$option .= '</option>';
									echo $option;
								}
							?>
						</select>
					</td>
				</tr>
			</tbody>
		</table>

		<p class="submit">
			<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Guardar Cambios') ?>" />
		</p>
		<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">			
	</form>
</div>