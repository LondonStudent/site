<?php
/**
 * Sidebar for single page
 *
 * @package Alaya_framework
 * @subpackage City News
 */
?>   
      
          <!--SideBar-->
	      <aside id="sidebar" class="four columns omega">
	          <?php if ( ! dynamic_sidebar('post_sidebar' ) ):?>
	          <div class="widget">
		          <h6 class="widget_title"><?php _e('RECENT POSTS','alaya');?></h6>
		          <?php echo alaya_post_list(5,'yes','');?>
		      </div>
		      
		      <div class="widget">
		        <h6 class="widget_title"><?php _e('Categories','alaya');?></h6>
                <ul>
				 <?php wp_list_categories('orderby=name'); ?> 
  				</ul>
		      </div>	         
		      <?php endif;?>
	      </aside>