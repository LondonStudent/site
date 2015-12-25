<?php
/**
 * Recent Posts Widgets
 * @package Alaya Framework
 * @subpackage City News
 * @since 1.0
 */
class alaya_recent_posts extends WP_Widget {


	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'alaya_recent_posts', // Base ID
			__( '(CityNews) Recent Posts with thumbnail', 'alaya' ), // Name
			array( 'description' => __( 'Show the recent posts with thumbnail and excerpt', 'alaya' ), ) // Args
		);

	}
	
   function widget($args, $instance) {
        extract( $args );
		$title = apply_filters('widget_title', $instance['title'] );
		$number = $instance['number'];
        $thumbnail= $instance['thumbnail'];
		$widgetID = alaya_random_string(6,false);
		$category= alaya_cat_slug($instance['category']);
		
		echo $before_widget;
		echo $before_title;
		echo esc_attr($title);
		echo $after_title;
		
		echo alaya_post_list($number,$thumbnail,$category);
		echo $after_widget;
   }
   
   function update($new_instance, $old_instance) {
	   $instance['category'] = strip_tags( $new_instance['category'] );
	   $instance['title'] = strip_tags( $new_instance['title'] );
       $instance['thumbnail'] = strip_tags( $new_instance['thumbnail'] );
	   $instance['number'] = strip_tags($new_instance['number']);                
       return $instance;
   }
   function form($instance) {  
	   $defaults = array( 'title' => __('Recent Blog', 'alaya'),'number' => '5','thumbnail' => 'yes','category'=>'');
	   $instance = wp_parse_args( (array) $instance, $defaults ); 
		
	   $title = esc_attr($instance['title']);
       $thumbnail = esc_attr($instance['thumbnail']);
	   $category = esc_attr($instance['category']);
	   $number = esc_attr($instance['number']);
   ?>
    <p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title', 'alaya'); ?></label>
	<input type="text" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo $title; ?>" />
    </p>
   
    <p>
        <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php _e('Number','alaya'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $number; ?>" id="<?php echo $this->get_field_id('number'); ?>" style="width:20%;" /> <span style="color:#999;">The Max number:20</span>
    </p>
    
     <p>
        <label for="<?php echo esc_attr($this->get_field_id('thumbnail')); ?>"><?php _e('Show thumbnail','alaya'); ?></label>
        <select name="<?php echo esc_attr($this->get_field_name('thumbnail')); ?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('thumbnail')); ?>">
        <?php if($thumbnail == 'yes'){?>
           <option value="no">No</option>
        <?php }elseif($thumbnail=='no'){?>
           <option value="yes">Yes</option>
        <?php }?>
           <option value="<?php if($thumbnail == 'yes'){echo 'yes';}elseif($thumbnail=='no'){echo 'no';}?>" selected="selected"><?php if($thumbnail == 'yes'){echo'Yes';}elseif($thumbnail=='no'){echo'No';}?></option>
        </select>
    </p>
    
     <p>
            <label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php _e('Category:','alaya'); ?></label>
            <select name="<?php echo $this->get_field_name('category'); ?>" class="widefat" id="<?php echo $this->get_field_id('category'); ?>">
                <?php if($cate_name==''):?>
                <option value="">All</option>
                <?php endif;?>
                <?php 
				$thecatlist_A = get_categories('hide_empty=0');
                $catdlist = array();
				foreach ($thecatlist_A as $catforlist){ 
				$cate_name = $catforlist->cat_name;
				?>
                <option value="<?php echo esc_attr($cate_name);?>" <?php if($category == $cate_name){ echo "selected='selected'";} ?>><?php echo esc_attr($cate_name); ?></option>
                <?php }?>
            </select>
     </p>
   <?php
   }
}
register_widget('alaya_recent_posts');
?>