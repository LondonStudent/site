<?php
/**
 * Template: Bottom Widgets
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
?>
<?php
if ( !is_active_sidebar( 'bottom_widget_1' ) && !is_active_sidebar( 'bottom_widget_2' ) && !is_active_sidebar( 'bottom_widget_3' ) && !is_active_sidebar( 'bottom_widget_4' )) {
	return;
}
?>
      <div id="bottom_widget">
         <div class="container">
	       <section class="four columns">
	        <?php if ( ! dynamic_sidebar('bottom_widget_1' ) ):?>
		      <div class="widget">
		          <h6 class="widget_title"><?php _e('RECENT POSTS','alaya');?></h6>
		          <?php echo alaya_post_list(5,'yes','');?>
		      </div>
            <?php endif;?>
	      </section>
	      
	      <section class="four columns">
	          <?php if ( ! dynamic_sidebar('bottom_widget_2' ) ):?>
		      <div class="widget">
		        <h6 class="widget_title"><?php _e('RECENT COMMENTS','alaya');?></h6>
                <?php wp_list_comments( array( 'style' => 'ul' ) ); ?>
		      </div>
		      <?php endif;?>
	      </section>
	      
	      <section class="four columns">
	       <?php if ( ! dynamic_sidebar('bottom_widget_3' ) ):?>
	         <div class="widget">
		      <h6 class="widget_title"><?php _e('FlICKR GALLERY','alaya');?></h6>
		      <div id="flickr_gallery" class="gallery_widget clearfix"></div>
		      <div class="clearfix"></div>
		       <script type="text/javascript">
				  jQuery('#flickr_gallery').jflickrfeed({
					limit:12,
					qstrings: {
						id: '79688583@N03'
					},
					itemTemplate:
							'<a rel="colorbox" class="lightbox" href="{{image_b}}" title="{{title}}">' +
								'<img src="{{image_m}}" alt="{{title}}" />' +
							'</a>'
					}, function() {
						jQuery('#flickr_gallery a').colorbox();
					});
		       </script>
	         </div>
	       <?php endif;?>
	      </section>
	      	    
	      <section class="four columns omega">
	      <?php if ( ! dynamic_sidebar('bottom_widget_4' ) ):?>
		      <div class="widget">
		         <h6 class="widget_title"><?php _e('THEMEVAN','alaya');?></h6>
		         <div class="textwidget">
			        <p>We are addicted to WordPress development and provide Easy to using & Shine Looking themes selling on ThemeForest.</p><p>Tel : (000) 456-7890<br />Email : mail@CompanyName.com<br />Address : NO 86 XX ROAD, XCITY, XCOUNTRY.</p>		
		         </div>
		      </div>
		   <?php endif;?>
	      </section>
       </div>
     
    </div> <!--//Bottom widgets-->