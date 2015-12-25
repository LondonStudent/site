( function( $ )
{
	"use strict";
	wp.customize( 'blogname', function( value )
	{
		value.bind( function( to )
		{
			$( '.site-title a' ).html( to );
		} );
	} );
	
	
	wp.customize( 'blogdescription', function( value )
	{
		value.bind( function( to )
		{
			$( '.site-description' ).html( to );
		} );
	} );


 	wp.customize( 'main_heading_font', function( value )
	{
		value.bind( function( to )
		{
			$( 'body' ).append( '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' + to + '">' );
			
			$( 'h1,h2,h3,h4,h5,h6,.post_list li a.post_title,.pushy a').css( 'font-family', '"' + to + '"' );
		} );
	} );
	
	wp.customize( 'logo_font', function( value )
	{
		value.bind( function( to )
		{
			$( 'body' ).append( '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' + to + '">' );
			
			$( '.logo a').css( 'font-family', '"' + to + '"' );
		} );
	} );
	
	wp.customize( 'menu_font', function( value )
	{
		value.bind( function( to )
		{
			$( 'body' ).append( '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' + to + '">' );
			
			$( '#primary_menu ul li a').css( 'font-family', '"' + to + '"' );
		} );
	} );
	
	wp.customize( 'content_font', function( value )
	{
		value.bind( function( to )
		{
			$( 'body' ).append( '<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=' + to + '">' );
			
			$( 'body,p,.post_navi a,.tagcloud a').css( 'font-family', '"' + to + '"' );
		} );
	} );
	
	wp.customize( 'global_color', function( value )
	{
		value.bind( function( to )
		{	
			$( 'a:active,a:hover,#primary_menu ul li.current a,#primary_menu ul li a:hover,#breadcrumbs .goback:hover,.channel .channel_title a,.post .entry-title a:hover,.post .entry-tools a:hover,.post_list li a.post_title:hover,#popup_window h3 a,.entry-content a,.comment-author a:hover,  .comment-list .pingback a:hover,  .comment-list .trackback a:hover,.comment-metadata a:hover').css( 'color', '"' + to + '"' );
			
			$( '.channel .channel_title a,.tagcloud a:hover,#popup_window .language_list li a:hover,#popup_window .dashboard_items li a:hover,.alaya_pagenavi span,.alaya_pagenavi a.page:hover,.contact-form input[type="submit"],#topbar #tools a:hover,.button.button-primary,button.button-primary,input[type="submit"].button-primary,input[type="reset"].button-primary,input[type="button"].button-primary').css( 'border-color', '"' + to + '"' );
			
            $( '.post_slider.flexslider .flex-control-paging li a.flex-active,.post.sticky .sign,.alaya_pagenavi span,.alaya_pagenavi a.page:hover,#respond input[type="submit"],.contact-form input[type="submit"],#topbar #tools a:hover,.button.button-primary,button.button-primary,input[type="submit"].button-primary,input[type="reset"].button-primary,input[type="button"].button-primary').css( 'background-color', '"' + to + '"' );
		} );
	} );
	
	
} )( jQuery );