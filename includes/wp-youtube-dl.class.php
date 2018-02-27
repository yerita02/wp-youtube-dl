<?php 
	
if ( !class_exists( 'WP_YouTube_dl' ) ) {
	class WP_YouTube_dl extends WP_Widget {
		/**
		 * Sets up the widgets name etc
		 */
		public function __construct() {
			$widget_ops = array( 
				'classname' => 'wp_youtube_dl',
				'description' => 'Este plugin proveera las funcionalidades para hacer busquedas de videos desde un input tipo autocompletar. Los videos son obtenidos por medios de la API de YouTube',
			);
			parent::__construct( 'wp_youtube_dl', 'Buscador de Videos', $widget_ops );
		}
		

		/**
		 * Outputs the content of the widget
		 *
		 * @param array $args
		 * @param array $instance
		 */
		public function widget( $args, $instance ) {
			// outputs the content of the widget
		}

		/**
		 * Outputs the options form on admin
		 *
		 * @param array $instance The widget options
		 */
		public function form( $instance ) {
			// outputs the options form on admin
		}

		/**
		 * Processing widget options on save
		 *
		 * @param array $new_instance The new options
		 * @param array $old_instance The previous options
		 *
		 * @return array
		 */
		public function update( $new_instance, $old_instance ) {
			// processes widget options to be saved
		}

		/**
		 * Sets the active value to the option 'wp_youtube_dl-active'
		 */
		public static function init() {
            add_option('wp_youtube_dl-active', 'yes');
        }

        public static function remove() {
            delete_option('wp_youtube_dl-active');
        }               
	}
}

