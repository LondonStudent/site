<?php
/**
 * Template: Gallery Content
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
?>
        
      
      <!--1200px Grid-->
      <div id="cn_content" class="container row">
      
       <!--Main Content-->
        <?php while ( have_posts() ) : the_post();?>         
        <div id="main">
        <?php if(alaya_opt('header_style')==1):?>
          <h2 class="archive_title"><span><?php the_title();?></span></h2>
        <?php endif;?>
          
          <article class="post">
             <div class="entry-content">
	           <?php the_content();?>
             </div>
          </article>
          
	      <div id="gallery">
		    <?php
			   if ( $images = get_children(array(
              'post_parent' => get_the_ID(),
              'post_type' => 'attachment',
              'numberposts' => 50,
              'order' => 'ASC',
              'orderby' => 'menu_order',
              'post_mime_type' => 'image',))){
                foreach( $images as $image ) {
                      $attachmenturl=wp_get_attachment_url($image->ID);
                      $attachmentimage=wp_get_attachment_image($image->ID, 'large' );
                      $attachment_caption=$image->post_excerpt;
                      $caption='';
                      if($attachment_caption<>''){
	                      $caption='<div class="caption">'.esc_attr($attachment_caption).'</div>';
                      }
                      echo '<a href="'.esc_url($attachmenturl).'" class="gallery-item group-'.get_the_ID().'" title="'.esc_attr($attachment_caption).'">'.$attachmentimage.esc_attr($caption).'</a>';
                }
              }
		    ?>
		    <script type="text/javascript">
			    jQuery(document).ready(function($){
				  $(".group-<?php the_ID()?>").colorbox({rel:'group-<?php the_ID()?>',slideshow:true});
				});
		    </script>
		  </div>
	     </div>
	     <?php endwhile;?>
      </div>