<?php 
	$hidden_field_name = 'is_submit_hidden';	
	if(isset($_POST[$hidden_field_name]) && $_POST[$hidden_field_name] == 'Y') {
		if(!update_option('num_inst_is', $_POST['num-inst'])){
			add_option('num_inst_is',  $_POST['num-inst']);
		}

		if(!update_option('api_key_gm_is', $_POST['api-key-gm'])){
			add_option('api_key_gm_is',  $_POST['api-key-gm']);
		}
	
		?>
			<div class='updated'><p><strong> <?php _e('Ajustes guardados.' ); ?>  </strong></p></div>
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
						<input class="small-text" type="number" max="100" min="1" step="1" name="num-inst" value="<?php echo get_option('num_inst_is') ; ?>" > 
					</td>
				</tr>		
				<tr>
					<td><b>API KEY Google YouTube:</b></td>
					<td>
						<input type="text" name="api-key-gm" value="<?php echo get_option('api_key_gm_is') ; ?>" size="80">
					</td>
				</tr>
				<tr>
					<td><b>Página para el buscador:</b></td>
					<td>
						<input type="text" name="api-key-gm" value="<?php echo get_option('api_key_gm_is') ; ?>" size="80">
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