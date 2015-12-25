/**
 * Shortcodes javascript
 * @package Alaya_framework
 * @since 1.0
 */
 
jQuery(document).ready(function($){
	 "use strict";
	 
	 //Toggle block
     $('.alaya_toggle .alaya_toggle_title').click(
	    function(){
	         if($(this).children('i').attr('class')=='fa fa-plus-square'){
			   $(this).next().slideDown();
			   $(this).children('i').attr('class','fa fa-minus-square');
			 }else{
			   $(this).next().slideUp();
			   $(this).children('i').attr('class','fa fa-plus-square');
			 }
		}
	 );
	 
	 //Tabs
	 $('.alaya_tab_box').each(function(){
	     var tabTitle = ".alaya_tab_items ul li";
		 var tabContent = '.alaya_tab_content .alaya_tab';
		 $(this).find(tabTitle + ":first").addClass("alaya_cur");
		 $(this).find(tabContent).not(":first").hide();
		 $(tabTitle).unbind("click").bind("click", function(){
			 $(this).siblings("li").removeClass("alaya_cur").end().addClass("alaya_cur");
			 var index = $(tabTitle).index( $(this) );
			 $(tabContent).eq(index).siblings(tabContent).hide().end().fadeIn("slow");
		 });
	 })
	 
})