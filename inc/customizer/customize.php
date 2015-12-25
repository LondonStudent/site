<?php
/**
 * Common Functions Library
 * @package Alaya_framework
 * @since 1.0
 */

remove_action('shutdown', 'wp_ob_end_flush_all', 1);
function my_customize_register( $wp_customize )
	{
		//=====================Fonts======================================
		$wp_customize->add_section( 'fonts_setting' , array('title' => __( 'Fonts Setting', 'alaya' ),
													 'priority' => 25) );
																
		include_once 'fonts.php';														
	
		$wp_customize->add_setting( 'logo_font', array(	'default' => 'Voltaire',
																'transport' => 'refresh',
																'sanitize_callback' => 'esc_attr') );
																		
		$wp_customize->add_control( 'control_logo_font', array(	'label' => 'LOGO Font',
																		'section' => 'fonts_setting',
																		'settings' => 'logo_font',
																		'type' => 'select',
																		'choices' => $all_fonts ) );
		
		
		$wp_customize->add_setting( 'main_heading_font', array(	'default' => 'Roboto Slab',
																'transport' => 'refresh',
																'sanitize_callback' => 'esc_attr') );
																		
		$wp_customize->add_control( 'control_main_heading_font', array(	'label' => 'Heading Font',
																		'section' => 'fonts_setting',
																		'settings' => 'main_heading_font',
																		'type' => 'select',
																		'choices' => $all_fonts ) );
		
		
		$wp_customize->add_setting( 'menu_font', array(	'default' => 'Source Sans Pro',
														'transport' => 'refresh',
														'sanitize_callback' => 'esc_attr') );
														
		$wp_customize->add_control( 'control_menu_font', array(	'label' => 'Menu Font',
																		'section' => 'fonts_setting',
																		'settings' => 'menu_font',
																		'type' => 'select',
																		'choices' => $all_fonts ) );
																		
	    $wp_customize->add_setting( 'content_font', array(	'default' => 'PT Serif',
															'transport' => 'refresh',
															'sanitize_callback' => 'esc_attr') );
															
		$wp_customize->add_control( 'control_content_font', array(	'label' => 'Content Font',
																		'section' => 'fonts_setting',
																		'settings' => 'content_font',
																		'type' => 'select',
																		'choices' => $all_fonts ) );

	
	    //=====================Color======================================
		$wp_customize->add_section( 'color_setting' , array('title' => __( 'Color Setting', 'alaya' ),
													 'priority' => 25) );
													 
		$wp_customize->add_setting( 'global_color', array(	'default' => '#21aaff',
															'transport' => 'refresh',
															'sanitize_callback' => 'esc_attr') );
																		
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
		'control_nav_bar_color', array(  'label' => __( 'Global Color', 'alaya' ),												 'section' => 'color_setting',
				                 'settings' => 'global_color' ) ) );			
	
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
		$wp_customize->get_setting( 'logo_font' )->transport = 'postMessage';
		$wp_customize->get_setting( 'main_heading_font' )->transport = 'postMessage';
		$wp_customize->get_setting( 'menu_font' )->transport = 'postMessage';
		$wp_customize->get_setting( 'content_font' )->transport = 'postMessage';
		$wp_customize->get_setting( 'global_color' )->transport = 'postMessage';
	}
	// end my_customize_register
	
	add_action( 'customize_register', 'my_customize_register' );

    //Load Fonts
	function alaya_custom_fonts_url() {
	    $fonts_url = '';
	    $source_sans_pro = '';
	    $pt_serif = '';
	    $roboto_slab = '';
	    $voltaire = '';
	    
	    if ( get_theme_mod( 'menu_font', 'Source Sans Pro' )<>'Source Sans Pro' || get_theme_mod( 'content_font', 'PT Serif' )<>'PT Serif' || get_theme_mod( 'logo_font', 'Voltaire' )<>'Voltaire' || get_theme_mod( 'main_heading_font', 'Roboto Slab' )<>'Roboto Slab' ) {
		    $font_families = array();
		 
		    if(get_theme_mod( 'menu_font', 'Source Sans Pro' )<>'Source Sans Pro'){
		        $font_families[] = get_theme_mod( 'menu_font', 'Source Sans Pro' ).':400,600,700,900,400italic,600italic,700italic,900italic';
		    }
		 
		    if(get_theme_mod( 'content_font', 'PT Serif' )<>'PT Serif') {
		        $font_families[] = get_theme_mod( 'content_font', 'PT Serif' ).':400,700,400italic,700italic';
		    }
		    
		    if(get_theme_mod( 'main_heading_font', 'Roboto Slab' )<>'Roboto Slab'){
		        $font_families[] = get_theme_mod( 'main_heading_font', 'Roboto Slab' ).':400,700,300,100';
		    }
		    
		    if(get_theme_mod( 'logo_font', 'Voltaire' )<>'Voltaire'){
		        $font_families[] = get_theme_mod( 'logo_font', 'Voltaire' );
		    }
		    
		    $query_args = array(
	            'family' => urlencode( implode( '|', $font_families ) ),
	            'subset' => urlencode( 'latin,latin-ext,vietnamese,cyrillic-ext,cyrillic,greek,greek-ext' ),
	        );
	 
	        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
		}
	    
	    return esc_url_raw( $fonts_url );
	}
	
	function alaya_custom_font_styles() {
	    wp_enqueue_style( 'citynews-custom-fonts', alaya_custom_fonts_url(), array(), null );
	}
	add_action( 'wp_enqueue_scripts', 'alaya_custom_font_styles' );

	
	function my_customize_css()
	{ 
		?>

<?php 
if(get_theme_mod( 'logo_font', 'Voltaire' )<>'Voltaire' || get_theme_mod( 'main_heading_font', 'Roboto Slab' )<>'Roboto Slab' || get_theme_mod( 'menu_font', 'Source Sans Pro')<> 'Source Sans Pro' || get_theme_mod( 'content_font', 'Open Sans' )<>'Open Sans' || get_theme_mod( 'global_color', '#ad794e' )<>'#ad794e'):?>
<style type="text/css">
<?php if(get_theme_mod( 'global_color', '#21aaff' )<>'#21aaff'):?>
a:active,
a:hover,
#primary_menu ul li.current-menu-item a,
#primary_menu ul li a:hover,
#breadcrumbs .goback:hover,
.channel .channel_title a,
.post .entry-title a:hover,
.post .entry-tools a:hover,
.post_list li a.post_title:hover,
#popup_window h3 a,
.entry-content a,
.comment-author a:hover,  
.comment-list .pingback a:hover,  
.comment-list .trackback a:hover,  
.comment-metadata a:hover{
	color:<?php echo esc_html(get_theme_mod( 'global_color', '#21aaff' ));?>;
}
.channel .channel_title a,
.tagcloud a:hover,
#popup_window .language_list li a:hover,
#popup_window .dashboard_items li a:hover,
.alaya_pagenavi span,
.alaya_pagenavi a.page:hover,
.contact-form input[type="submit"],
#topbar #tools a:hover,
.button.button-primary,
button.button-primary,
input[type="submit"].button-primary,
input[type="reset"].button-primary,
input[type="button"].button-primary{
    border-color:<?php echo esc_html(get_theme_mod( 'global_color', '#21aaff' ));?>;
}
.post_slider.flexslider .flex-control-paging li a.flex-active,
.post.sticky .sign,
.alaya_pagenavi span,
.alaya_pagenavi a.page:hover,
#respond input[type="submit"],
.contact-form input[type="submit"],
#topbar #tools a:hover,
.button.button-primary,
button.button-primary,
input[type="submit"].button-primary,
input[type="reset"].button-primary,
input[type="button"].button-primary{
	background-color:<?php echo esc_html(get_theme_mod( 'global_color', '#ad794e' ));?>;
}
<?php endif;?>

<?php if(get_theme_mod( 'logo_font', 'Voltaire' )<>'Voltaire'):?>
.logo a{font-family:<?php echo esc_html(get_theme_mod( 'logo_font', 'Voltaire' ));?>}
<?php endif;?>

<?php if(get_theme_mod( 'main_heading_font', 'Roboto Slab' )<>'Roboto Slab'):?>
h1,h2,h3,h4,h5,h6,
.post_list li a.post_title,
.pushy a{font-family:<?php echo esc_html(get_theme_mod( 'main_heading_font', 'Roboto Slab' ));?>,Arial, Helvetica, sans-serif;}
<?php endif;?>

<?php if(get_theme_mod( 'menu_font', 'Source Sans Pro' )<>'Source Sans Pro'):?>
#primary_menu ul li a{font-family:<?php echo esc_html(get_theme_mod( 'menu_font', 'Source Sans Pro' ));?>,Arial, Helvetica, sans-serif;}
<?php endif;?>

<?php if(get_theme_mod( 'content_font', 'PT Serif' )<>'PT Serif'):?>
body,
p,
.post_navi a,
.tagcloud a{font-family:<?php echo esc_html(get_theme_mod( 'content_font', 'PT Serif'));?>,Arial, Helvetica, sans-serif;}
<?php endif;?>
</style>
<?php endif;?>

		<?php
	}
	// end my_customize_css
	
	add_action( 'wp_head', 'my_customize_css' );
	
	
	function my_customize_preview_js()
	{
		wp_enqueue_script( 'my-customizer', get_template_directory_uri() . '/inc/customizer/wp-theme-customizer.js', array( 'customize-preview' ), rand(), true );
	}
	
	add_action( 'customize_preview_init', 'my_customize_preview_js' );
?>