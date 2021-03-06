<?php
/**
 * Header: Style 1
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
?>
      <header id="top">
	      <!--LOGO-->
	      <div class="logo">
	        <a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_html(bloginfo('name'));?>">
	        <?php if(null!==alaya_opt('custom_logo') && alaya_opt('custom_logo') <> ''):?>
	          <span><img src="<?php echo esc_url(alaya_opt('custom_logo'));?>" /></span>
	        <?php else:?>
	          <span><?php esc_html(bloginfo('name'));?></span>
	        <?php endif;?>
	        </a>
	        <div class="local_info">
	          <span class="local_date"><?php echo date('l jS F Y');?></span>
	          <span id="weather"></span>
	        </div>
	      </div>
	      
	      <!--Primary Menu-->
	      <nav id="primary_menu">
		     <ul class="sf-menu">
			   <?php wp_nav_menu(array(
				  'theme_location' => 'primary_navi',
				  'container' => '',
				  'menu_class' => '',
				  'echo' => true,
                  'walker' => new alaya_mega_menu(),
				  'fallback_cb' => 'alaya_default_menu',
				  'items_wrap'      => '%3$s',
                  'depth' => 5)
                  );
	           ?>
			</ul>
			
	      </nav>
	      
      </header>
      
      <?php
      if(is_home()):
       if(alaya_opt('home_slider_cat')<>''){
        $slider_cat = alaya_cat_id(alaya_opt('home_slider_cat'));
       }else{
	    $slider_cat = '';
       }
      set_query_var( 'enable_slider', alaya_opt('home_slider'));
      set_query_var( 'posts_per_slide', 1);
      set_query_var( 'posts_number', 3);
      set_query_var( 'slide_effect', 'slide');
      set_query_var( 'cat_id', $slider_cat);
	  get_template_part('tpl/tpl','slider');
	  endif;
	  ?>