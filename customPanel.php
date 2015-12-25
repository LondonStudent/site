<?php 
/*Custom Panel*/
?>
<div id="customPanel">
 <div id="button"><i class="fa fa-cog"></i></div>
 <h3>Customize</h3>
 
 <div class="item">
      <span class="item_title">Header Style</span>
      <a href="javascript:void(0);" id="header1" style="background-color:#ec5e57;">Header1</a> <a href="javascript:void(0);" id="header2">Header2</a>
 </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
	/*Display color Panel*/
	$('#customPanel #button').toggle(function(){
	  $('#customPanel').animate({right:"0px"},"fast","linear");
	},
	function(){
	  $('#customPanel').animate({right:"-210px"},"fast","linear");
	 }
	);
	
	/*Header style*/
	$('#header2').click(function(){
	   $('#top').addClass('header2');
	   $('#primary_menu ul').addClass('alignleft');
	   $(this).css('background-color','#ec5e57');
	   $('#header1').css('background-color','#333');
	   $('#top .top_banner').remove();
	   $('#top .logo').after('<div class="top_banner"><a href="http://www.bluehost.com/track/badjohnny" target="_blank"><img border="0" src="http://demo.themevan.com/citynews/wp-content/uploads/sites/14/2015/08/bh-ppc-banners-dynamic-760x80.png"></a></div>');
	});
	$('#header1').click(function(){
	   $('#top').removeClass('header2');
	   $('#primary_menu ul').removeClass('alignleft');
	   $(this).css('background-color','#ec5e57');
	   $('#header2').css('background-color','#333');
	   $('#top .top_banner').remove();
	});
});
</script>