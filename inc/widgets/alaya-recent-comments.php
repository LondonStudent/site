<?php
/**
 * Recent Comments Widgets
 * @package Alaya Framework
 * @subpackage City News
 * @since 1.0
 */

class alaya_recent_comments extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'alaya_recent_comments', // Base ID
			__( '(CityNews) Recent Comments', 'alaya' ), // Name
			array( 'description' => __( 'Display the most latest comments with avatar ', 'alaya' ), ) // Args
		);
		
	}

	
	/**
	 * Front-end display of widget
	**/
	public function widget( $args, $instance ) {
				
		extract( $args );

		$title = apply_filters('widget_title', isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'Latest Comments' );
		$comments_show = isset( $instance['comments_show'] ) ? esc_attr( $instance['comments_show'] ) : '5';
		

		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title;
		echo alaya_recent_comment($comments_show);
		echo $after_widget;
		
	}
	
	
	/**
	 * Sanitize widget form values as they are saved
	**/
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();

		/* Strip tags to remove HTML. For text inputs and textarea. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['comments_show'] = strip_tags( $new_instance['comments_show'] );
		
		return $instance;
		
	}
	
	
	/**
	 * Back-end widget form
	**/
	public function form( $instance ) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'Latest Comments',
			'comments_show' => '5',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e('Title:', 'alaya'); ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($instance['title']); ?>" class="widefat" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'comments_show' )); ?>"><?php _e('Comments to show:', 'alaya'); ?></label>
			<input type="text" id="<?php echo esc_attr($this->get_field_id( 'comments_show' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'comments_show' )); ?>" value="<?php echo esc_attr($instance['comments_show']); ?>" size="1" />
		</p>
		<p>
	<?php
	}

}
register_widget( 'alaya_recent_comments' );
?>