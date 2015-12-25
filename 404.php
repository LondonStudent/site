<?php
/**
 * 404 Page
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
 
   get_header();
?>
      <h2 class="archive_title"><span><?php _e('404','alaya');?></span></h2>
      
      <!--1200px Grid-->
      <div id="cn_content" class="container row">
      
       <!--Main Content-->         
        <div id="main">
	      <!--Standard Posts-->
	      <div class="error_404">             
			      <div class="entry-content">
				    <blockquote><?php _e('It seems we can\'t find what you\'re looking for. Perhaps the page not exsit or it was removed by administrator.','alaya');?></blockquote>
				    <div class="search_form"> 
				    <form action="<?php echo home_url('/');?>" method="get" name="searchform" class="popup_form">
					      <div class="four columns alpha">
						    <input type="text" name="s" class="u-full-width" placeholder="Input Keyword" />
					      </div>
					      <div class="two columns alpha omega">
						  	<input type="submit" name="search_button" class="button-primary" value="Search" />
					      </div>
					  </form>
					  </div>
				  </div>     
         </div>
        </div>
      </div>
<?php
   get_template_part('tpl/tpl','bottom');       
   get_footer();
?>