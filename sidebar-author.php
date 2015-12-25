<?php
/**
 * Sidebar for author page
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */

if(isset($_GET['author_name'])) :
	$author = get_userdatabylogin($author_name);
   else :
	$author = get_userdata(intval($author));
   endif;
?>   
      
          <!--SideBar-->
	      <aside id="sidebar" class="four columns omega">
	          <div class="widget author_intro">
	          <?php echo get_avatar( $author->ID, 400 ); ?>
		          <h6 class="widget_title"><?php echo sanitize_text_field($author->display_name);?></h6>
		          <div class="textwidget">
			          <?php echo sanitize_text_field($author->description);?><br>
				<a href="<?php the_author_url(); ?>"><?php the_author_url(); ?></a>
		          </div>
		      </div>       
	      </aside>