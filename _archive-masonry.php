<?php
/**
 * Blog Layouts: Masonry with 3 columns.
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
?>        
            
      <!--1200px Grid-->
      <div id="cn_content" class="container row">
      
        <!--Main Content-->         
        <div id="main">
      
	      <div class="masonry_blog">
	      	   <div class="alaya_loader"><i class="fa fa-spinner fa-spin"></i></div>
	           <?php 
	           if (have_posts()):
	            if(is_paged()==false && is_home()==false){
					    //Sticky Post
					    $sticky = get_option( 'sticky_posts' );
					    $args = array(
					        'posts_per_page' => 10,
					        'post__in'  => $sticky,
					        'ignore_sticky_posts' => 1,
					        'cat' => $cat_id
					    );
					
					    query_posts( $args );
					    if ( $sticky[0] ) { 
			               /*Start Loop*/
			               while ( have_posts() ) : the_post();
			                  set_query_var( 'template', 'masonry');
			                  set_query_var( 'title', 'yes');
			                  set_query_var( 'thumbnail', 'yes');
			                  get_template_part( 'tpl/tpl', 'loop');
			               endwhile;
		               }
	                   wp_reset_query();
	               }

	           /*Start Loop*/
               while ( have_posts() ) : the_post();
                  set_query_var( 'template', 'masonry');
                  set_query_var( 'title', 'yes');
                  set_query_var( 'thumbnail', 'yes');
                  get_template_part( 'tpl/tpl', 'loop');
               endwhile;
               ?>
       
               <br class="clearfix" />
               
               <?php else:?>
			   <article class="post">
			     <div class="entry-content"><?php _e('There\'s no posts published now.','alaya');?></div>
		       </article>
			   <?php endif;?>
		    </div>
            
            <?php echo alaya_pagenavi();?>
        </div>
      </div>