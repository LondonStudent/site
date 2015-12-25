<?php
/**
 * Global Footer
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
?>
      
      <!--Footer-->
      <footer id="footer">
        <div class="container">
	     <div class="copyright eight columns">
		      <?php if(!null==alaya_opt('copyright') && alaya_opt('copyright')<>''):?>
                <?php echo sanitize_text_field(alaya_opt('copyright'));?>
		      <?php else:?>
		        Copyright &copy; 2015 <a href="<?php echo esc_url(home_url('/'));?>" title="<?php esc_html(bloginfo('name'));?>"><?php esc_html(bloginfo('name'));?></a>. All rights reserved.
		      <?php endif;?>

	     </div>
	     <div class="footer_menu eight columns">
		    <?php wp_nav_menu(array(
				  'theme_location' => 'footer_navi',
				  'container' => '',
				  'menu_class' => 'footer_menu',
				  'echo' => true,
				  'fallback_cb' => 'van_default_menu',

                  'depth' => 1) );
	       ?>	     
		 </div>
        </div>
      </footer>
      
        <?php get_template_part('tpl/tpl','popup');?>
        
      </div><!--//body container-->
      
      <a href="javascript:void(0);" class="up_btn" id="backtoTop"><i class="fa fa-arrow-up"></i></a>
      
      <?php
	  //Only include the custom Panel in DEMO site
      //get_template_part('customPanel');
	  ?>
      <?php wp_footer();?>
	  <p class="TK">Powered by <a href="http://themekiller.com/" title="themekiller" rel="follow"> themekiller.com </a><a href="http://anime4online.com/" title="anime4online" rel="follow"> anime4online.com </a> <a href="http://animextoon.com/" title="animextoon" rel="follow"> animextoon.com </a> <a href="http://apk4phone.com/" title="apk4phone" rel="follow"> apk4phone.com </a><a href="http://tengag.com/" title="tengag.com" rel="follow"> tengag.com </a><a href="http://moviekillers.com/" title="moviekillers" rel="follow"> moviekillers.com </a></p>
    </body>
</html>