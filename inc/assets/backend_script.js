/**
 * Admin javascript 
 * @since 1.0
 */
 
jQuery(document).ready(function($){
	"use strict";
	
	//Hide and show the custom background options
	var header_style=$('input[name="header_style"]');
	var header_style_value=$('input[name="header_style"]:checked').val();
	
	function alaya_custom_background_options(){
	    if(header_style_value=='1'){
			 $('#top_banner').add('#top_banner_link').hide();
		}else if(header_style_value=='2'){
	 $('#top_banner').add('#top_banner_link').hide().show();
		}
	}alaya_custom_background_options();
	
	header_style.next('img').click(function(){
	    header_style_value=$(this).prev().val();
	    alaya_custom_background_options();
	});
	
	//Show post options
	$('#post_format_meta_metabox').hide();
	$('#imagesliees').hide();
	var post_format=$('input[name="post_format"]:checked').val();

	if(post_format=='video'){
	    $('#post_format_meta_metabox').show();
		$('#imagesliees').hide();
	}
	if(post_format=='audio'){
	    $('#post_format_meta_metabox').show();
		$('#imagesliees').hide();
	}
	if(post_format=='gallery'){
	    $('#post_format_meta_metabox').hide();
		$('#imagesliees').show();
	}
	$('#post-format-gallery').click(function(){
		       $('#post_format_meta_metabox').slideUp();
			   $('#imagesliees').show();
	});
	$('#post-format-video').click(function(){
		       $('#post_format_meta_metabox').slideDown();
			   $('#imagesliees').hide();
	});
	$('#post-format-audio').click(function(){
		       $('#post_format_meta_metabox').slideDown();
			   $('#imagesliees').hide();
	});
	$('#post-format-0').click(function(){
			   $('#post_format_meta_metabox').add('#imagesliees').slideUp();
	});


    //Show page options
	jQuery('.post-type-page #page-meta-boxes').add('.post-type-page #imagesliees').hide();
	var page_template=jQuery('select[name="page_template"]');
	
	function alaya_page_options(){
	    if(page_template.val()=='contact-template.php'){
			 jQuery('.post-type-page #contact_meta_metabox').show();
			 jQuery('.post-type-page #imagesliees').hide();
			 jQuery('.post-type-page #custom_page_meta_metabox').hide();
		}else if(page_template.val()=='gallery-template.php'){
		     jQuery('.post-type-page #imagesliees').show();
			 jQuery('.post-type-page #contact_meta_metabox').hide();
			 jQuery('.post-type-page #custom_page_meta_metabox').hide();
	    }else if(page_template.val()=='default' || page_template.val()=='custom-template.php'){
		     jQuery('.post-type-page #custom_page_meta_metabox').show();
			 jQuery('.post-type-page #imagesliees').hide();
			 jQuery('.post-type-page #contact_meta_metabox').hide();
		}else{
		     jQuery('.post-type-page #custom_page_meta_metabox').show();
			 jQuery('.post-type-page #imagesliees').hide();
			 jQuery('.post-type-page #contact_meta_metabox').hide();
		}
	}alaya_page_options();
	
	page_template.change(function(){
	    alaya_page_options();
	});
	
	//Replace the mailchimp for plugin link to aff link
	$('#toplevel_page_mailchimp-for-wp ul li:last-child a').attr('href','http://www.themevan.com/plugins/mailchimp-for-wordpress');
	$('#mc4wp-upgrade-box p:last-child a').attr('href','http://www.themevan.com/plugins/mailchimp-for-wordpress');
	
});