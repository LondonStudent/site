<?php
/**
 * Global Header
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
ob_start();
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<?php
	if ( ! function_exists( '_wp_render_title_tag' ) ) {
		function theme_slug_render_title() {
	?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php
		}
		add_action( 'wp_head', 'theme_slug_render_title' );
	}
	?>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/> 
	<!-- Mobile Specific Metas
  ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/> 

	<!--[if lt IE 9]>
    <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js" type="text/javascript"></script>
    <![endif]-->

    <?php wp_head();?>
</head>
<body <?php body_class();?>>
 <?php get_template_part('tpl/tpl','slide-menu');?>
 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
 <div id="body-container">
      <!--Top Bar-->
      <div id="topbar">
           <!--Social Icons-->
	       <div class="social_icons">
		       <?php echo alaya_social();?>
		   </div>
		   <!--Menu button-->
           <div class="menu_button hide"><a href="javascript:void(0)"><i class="fa fa-bars"></i></a></div>

		   <!--Menu button-->
           <div class="menu_button"><a href="javascript:void(0)"><i class="fa fa-bars"></i></a></div>
           
	       <!--Tools-->
		   <div id="tools">
			 
			<?php if(null==alaya_opt('search') || alaya_opt('search')=='0'):?>
			   <a href="javascript:void(0);" class="search_btn"><i class="fa fa-search"></i></a>
			 <?php endif;?>
			 
			 <?php if ( has_nav_menu( 'lang_navi' ) ):?>
			     <a href="javascript:void(0);" class="languages_btn"><i class="fa fa-globe"></i> <?php _e('Languages','alaya');?></a>
			 <?php endif;?>		   
		   </div> 
      </div> 
           
	  <?php 
	  set_query_var( 'slider_shortcode', esc_attr(alaya_opt('slider_shortcode')));
	  get_template_part('tpl/tpl','header-'.esc_attr(alaya_opt('header_style')));
	  ?>