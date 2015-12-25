<?php
/**
 * Template: Popup and side tool icons
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
?>
      
      <!--Popup-->
      <div id="popup_window" class="popup_content">
        <a href="javascript:void(0)" class="close_popup"><i class="fa fa-close"></i></a>
	    
	    <?php if(null==alaya_opt('search') || alaya_opt('search')=='0'):?>
	    <div id="popup_search" class="popup_content">
		    <h3><?php _e('Searching','alaya');?></h3>
		    <div class="content container">
			  <form action="<?php echo esc_url(home_url('/'));?>" method="get" name="searchform" class="popup_form">
			      <div class="four columns alpha">
				    <input type="text" name="s" class="u-full-width" placeholder="<?php _e('Keyword','alaya');?>" />
			      </div>
			      <div class="four columns alpha">
					  <select name="post_type" class="u-full-width">
						  <option value="post"><?php _e('Blog Posts','alaya');?></option>
						  <?php if(is_plugin_active('woocommerce/woocommerce.php')):?>
						  <option value="product"><?php _e('Products','alaya');?></option>
						  <?php endif;?>
					  </select>
			      </div>
			      <div class="four columns alpha omega">
				  	<input type="submit" name="search_button" class="button-primary" value="<?php _e('Search','alaya');?>" />
			      </div>
			  </form>
		    </div>
	     </div>
	     <?php endif;?>
	    
	     
	     <?php if ( has_nav_menu( 'lang_navi' ) ):?>
	     <!--Language-->
	     <div id="popup_lang" class="popup_content">
		    <h3><?php _e('Choose language','alaya');?></h3>
		    <div class="content">
			   <ul class="language_list">
				 <?php wp_nav_menu(array(
				  'theme_location' => 'lang_navi',
				  'container' => '',
				  'menu_class' => '',
				  'echo' => true,
				  'items_wrap'      => '%3$s',
                  'depth' => 5)
                  );
	             ?>
			   </ul>
		    </div>
	     </div>
	     <?php endif;?>
	     
      </div>
      <div class="page_mask"></div>