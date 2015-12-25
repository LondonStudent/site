<?php
/**
 * Default Page
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
 
   get_header();
   $enable_slider=0;
   $posts_per_slide=3;
   $slide_effect='slide';
   $posts_number=6;
   $slide_cat='';
   while ( have_posts() ) : the_post();
    $enable_slider=vp_metabox('custom_page_meta.content.0.enable_slider');
    $posts_number=vp_metabox('custom_page_meta.content.0.posts_number');
    $posts_per_slide=vp_metabox('custom_page_meta.content.0.posts_per_slide');
    $slide_effect=vp_metabox('custom_page_meta.content.0.slide_effect');
    $slide_cat=vp_metabox('custom_page_meta.content.0.slider_cat');
    set_query_var( 'enable_slider', esc_attr($enable_slider));
    set_query_var( 'posts_number', esc_attr($posts_number));
    set_query_var( 'posts_per_slide', esc_attr($posts_per_slide));
    set_query_var( 'slide_effect', esc_attr($slide_effect));
    if(!isset($slide_cat) || $slide_cat==''){
       $slide_cat='all';
    }
    set_query_var( 'cat_id', alaya_cat_id(esc_attr($slide_cat)));
    get_template_part('tpl/tpl','slider');
  endwhile;
?>
      <?php get_template_part('tpl/tpl','page-title');  ?>
      
      <!--1200px Grid-->
      <div id="cn_content" class="container row">
      
       <!--Main Content-->         
        <div id="main">
	      <!--Standard Posts-->
	      <div id="standard_blog_full" class="twelve columns alpha omega">     
		        <?php        
		        /* Load Content */     
		        while ( have_posts() ) : the_post();
		        ?>
			      <div class="entry-content">
				    <?php the_content();?>
				  </div>
		        <?php
			      endwhile;
			    ?>       
         </div>
        </div>
      </div>
<?php
   get_template_part('tpl/tpl','bottom');       
   get_footer();
?>