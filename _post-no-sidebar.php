<?php
/**
 * Post Layouts: FullWidth
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
      
	      <!--Standard Posts-->
	      <div class="standard_blog_full thirdty columns alpha omega">
             <div id="breadcrumbs">
	           <div class="navi">
	           <?php alaya_breadcrumbs();?> 
	           </div>
	           <?php if(!null==alaya_opt('post_share') && alaya_opt('post_share')==1):?>
	           <div class="share">
		          <?php echo alaya_share(get_the_ID());?>
	           </div>
	           <?php endif;?>
             </div>
       
             <?php 
             set_query_var( 'title', 'yes');
             set_query_var( 'thumbnail', esc_attr($single_thumbnail));
             get_template_part('tpl/tpl','post-body');
             ?>      
         </div>
        </div>
      </div>