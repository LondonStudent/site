<?php
/**
 * Flickr Widgets
 * @package Alaya Framework
 * @subpackage City News
 * @since 1.0
 */
class alaya_flickr extends WP_Widget {
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'alaya_flickr', // Base ID
			__( '(CityNews) Flickr', 'alaya' ), // Name
			array( 'description' => __( 'Show your recent flickr photos', 'alaya' ), ) // Args
		);

	}
	
   public function widget( $args, $instance ) {
        extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$number = $instance['number'];
        $flickrID= $instance['flickrID'];
		$widgetID = alaya_random_string(6,false);
		echo $before_widget;
		echo $before_title;
		echo esc_attr($title);
		echo $after_title;
		?>
 <?php //Custom HTML Layout?>
        <div id="<?php echo esc_attr($widgetID);?>" class="gallery_widget clearfix"></div><div class="clearfix"></div>
        <script type="text/javascript">
		  jQuery('#<?php echo esc_attr($widgetID);?>').jflickrfeed({
			limit:<?php echo esc_attr($number);?>,
			qstrings: {
				id: '<?php echo esc_attr($flickrID);?>'
			},
			itemTemplate:
					'<a rel="colorbox" class="lightbox" href="{{image_b}}" title="{{title}}">' +
						'<img src="{{image}}" alt="{{title}}" />' +
					'</a>'
			}, function() {
				jQuery('#<?php echo esc_attr($widgetID);?> a').colorbox();
			});
        </script>
<?php //Custom HTML Layout End?>
        <?php
		echo $after_widget;
   }
   
   public function update($new_instance, $old_instance) {
	   $instance['title'] = strip_tags( $new_instance['title'] );
       $instance['flickrID'] = strip_tags( $new_instance['flickrID'] );
	   $instance['number'] = strip_tags($new_instance['number']);                
       return $instance;
   }
   public function form($instance) {  
	   $defaults = array( 'title' => __('Flickr', 'alaya'),'number' => '9','flickrID'=>'');
	   $instance = wp_parse_args( (array) $instance, $defaults ); 
		
	   $title = esc_attr($instance['title']);
       $flickrID = esc_attr($instance['flickrID']);
	   $number = esc_attr($instance['number']);
   ?>
    <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e('Title', 'alaya'); ?></label>
	<input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($title); ?>" />
    </p>
    
    <p>
	<label for="<?php echo esc_attr($this->get_field_id( 'flickrID' )); ?>"><?php _e('Flickr ID', 'alaya'); ?></label>
	<input type="text" id="<?php echo esc_attr($this->get_field_id( 'flickrID' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'flickrID' )); ?>" value="<?php echo esc_attr($flickrID); ?>" style="width:40%;" /> <span style="color:#999;"><a href="http://www.idgettr.com" target="_blank">Get ID</a></span>
    </p>
   
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number','alaya'); ?></label>
        <input type="text" name="<?php echo esc_attr($this->get_field_name('number')); ?>" value="<?php echo esc_attr($number); ?>" id="<?php echo esc_attr($this->get_field_id('number')); ?>" style="width:20%;" /> <span style="color:#999;">The Max number:20</span>
    </p>
   <?php
   }
}

register_widget('alaya_flickr');
?>