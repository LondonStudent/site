/* Miao functions */

var jQuery;

jQuery(document).ready(function($){
	 "use strict";

    /*Show the popup*/
    function showPopup(button,content){
       $(button).click(function(){
	    $('#popup_window,.page_mask').add(content).fadeIn();
	    var popup_height=$('#popup_window').height();
	    $('#popup_window').css('margin-top',-popup_height/2);
	   });
    }
    showPopup('.search_btn','#popup_search');
    showPopup('.cart_btn','#popup_cart');
    showPopup('.user_btn','#popup_login');
    showPopup('.user_btn_logged','#popup_dashboard');
    showPopup('.languages_btn','#popup_lang');

    /*Close the popup*/
    $('.close_popup,.page_mask').on('click',function(){
	    $('#popup_window,.popup_content,.page_mask').fadeOut();
    })

	//Primary Menu
	$("#primary_menu ul.sf-menu").superfish({
	       pathLevels:    3 ,
		   delay:         100
    });

    /*Mega menu
    /*Just can use hover function, because it's depended on jquery.hoverdelay.js */
    $('#primary_menu ul li').hover(function(e) {
      $(this).find('.mega-menu').fadeIn();
    }, function() {
      $(this).find('.mega-menu').fadeOut();
    }, 250);


    $('#primary_menu > ul > li > ul.sub-menu').prepend('<li class="up-arrow"></li>');
    $('#primary_menu > ul > li > div.mega-menu').prepend('<div class="up-arrow"></div>');

    $("#top_menu ul.sf-menu").superfish({
	       pathLevels:    3 ,
		   delay:         100,
		   autoArrows:    true
    });

    $('.menu_button').on('click',function(){
	    $(".pushy").niceScroll({
				   cursorcolor:"#000",
				   scrollspeed:70,
				   horizrailenabled:false,
				   autohidemode:true,
				   cursorwidth:5,
				   zindex:99999
		});
    });

	/*Center the LOGO*/
	function centerLOGO(){
		var total_menu_items = $('#primary_menu > ul > li').length;
		var half_position_even=total_menu_items/2;
		var half_position_odd=(total_menu_items+1)/2;
		var get_logo_html='<li class="logo">'+$('.logo').html()+'</li>';
	    var ex = /^\d+$/;
		if (ex.test(total_menu_items/2)) {
		   $('#primary_menu > ul > li:nth-child('+half_position_even+')').after(get_logo_html);
		}else{
		   $('#primary_menu > ul > li:nth-child('+half_position_odd+')').after(get_logo_html);
		}
	}


	$(window).on('scroll',function() {
	   if($(this).width()>767){

	        /*Shrinking the header*/
	        if($(document).scrollTop() > $('#cn_content').offset().top - parseFloat($('#cn_content').css('marginTop').replace(/auto/, 100))){
		      $('#top').addClass('shrinked');
		      $('#backtoTop').fadeIn();
			}else{
			  $('#top').removeClass('shrinked');
			  $('#backtoTop').fadeOut();
			}

		}
	 });

	 $('#start-read').on('click',function(){
		 $('body').animate({scrollTop:$('#main').offset().top-40},'slow');
	 });

	 /*Set the overlay size*/
	 function overlay_size(){
		 $('.post .thumbnail').each(function(){
		     $('#masonry_blog .post,#masonry_channel_3col .channel,.masonry_channel .channel').show();
			 var overlay_width,overlay_height,marginTop,marginLeft;
		     var wrapper_width=$(this).width();
		     var wrapper_height=$(this).height();

			 if($(this).children('img').height()<wrapper_height){
			   $(window).load(function(){
				wrapper_height=$(this).children('img').height();
			    if(wrapper_height==0){
				    wrapper_height=200;
			    }
				$(this).css('height',wrapper_height);
			   })

			 }

			 if($(window).width()>800){
		       overlay_width=wrapper_width-20;
			   overlay_height=wrapper_height-20;
			 }else{
			   overlay_width=wrapper_width;
			   overlay_height=wrapper_height;
			 }
			   marginTop=overlay_height/2;
			   marginLeft=overlay_width/2;

		     $(this).children('.overlay').css({
			   width:overlay_width+'px',
			   height:overlay_height+'px',
			   marginTop:'-'+marginTop+'px',
			   marginLeft:'-'+marginLeft+'px'
		     });
			 $(this).children('.overlay').children('i').css({
			   width:'20px',
			   height:'20px',
			   display:'block',
			   left:'50%',
			   top:'50%',
			   position:'absolute',
			   marginTop:'-10px',
			   marginLeft:'-10px'
		     });
		 });
	 }


	 /*Masonry Channel*/
	 $('.masonry_channel .channel').addClass('omega').addClass('alpha');
		var columns = 2,
		setColumns = function() { columns = $( window ).width() > 640 ? 2 : $(window).width() > 320 ? 2 : 1; };
		setColumns();
		$(window).resize(setColumns);

		var $masonry_channel=$( '.masonry_channel' ).masonry(
		{
			itemSelector: '.channel',
			columnWidth:  function( containerWidth ) { return containerWidth / columns;}
		});

		$masonry_channel.imagesLoaded( function(){
			$masonry_channel.masonry();
		    $('.channel').fadeIn();
		    $('.alaya_loader').fadeOut();
		});

	/*Masonry Channel 3 columns*/
	var channel_columns = 3,
		setChannelColumns = function() { channel_columns = $( window ).width() > 640 ? 3 : $(window).width() > 320 ? 3 : 1; };
		setChannelColumns();
		$(window).resize(setChannelColumns);

		var $masonry_channel_3col=$( '.masonry_channel_3col' ).masonry(
		{
			itemSelector: '.channel',
			columnWidth:  function( containerWidth ) { return containerWidth / channel_columns;}
		});

		$masonry_channel_3col.imagesLoaded( function(){
			$masonry_channel_3col.masonry();
		    $('.channel').fadeIn();
		    $('.alaya_loader').fadeOut();
		});

	    /*Masonry blog 2 columns*/
		var post_columns_2 = 2,
		setPostColumns_2 = function() { post_columns_2 = $( window ).width() > 640 ? 2 : $(window).width() > 320 ? 2 : 1; };
		setPostColumns_2();
		$(window).resize(setPostColumns_2);


		var $masonry_blog_2=$( '.masonry_blog_2').masonry(
		{
			itemSelector: '.post',
			columnWidth:  function( containerWidth ) { return containerWidth / post_columns_2;},
		});

		$masonry_blog_2.imagesLoaded( function(){
			$masonry_blog_2.masonry();
		    $('.post').fadeIn();
		    $('.alaya_loader').fadeOut();
		});

	    /*Masonry blog 3 columns*/
		var post_columns = 3,
		setPostColumns = function() { post_columns = $( window ).width() > 640 ? 3 : $(window).width() > 320 ? 3 : 1; };
		setPostColumns();
		$(window).resize(setPostColumns);

		var $masonry_blog=$( '.masonry_blog' ).masonry(
		{
			itemSelector: '.post',
			columnWidth:  function( containerWidth ) { return containerWidth / post_columns;}
		});
		$masonry_blog.imagesLoaded( function(){
			$masonry_blog.masonry();
		    $('.post').fadeIn();
			$('.alaya_loader').fadeOut();
		});

	/*Back to Top*/
	$('#backtoTop').on('click',function(){
		$('body').animate({scrollTop:0},'slow');
		return false;
	});

	if($(window).width()<=959){
	  $("#topbar").sticky({topSpacing:0});
	}

	/*View Map*/
	$('#map_toggle').toggle(function(){
		$('.contact_content').slideUp();
		$('#map_toggle i').removeClass('fa-angle-up').addClass('fa-angle-down');
	},function(){
		$('.contact_content').slideDown();
		$('#map_toggle i').removeClass('fa-angle-down').addClass('fa-angle-up');
	})

	/*colorbox*/
	$('.lightbox').colorbox({maxWidth:"98%",maxHeight:"98%"});
	$('.attachment a').colorbox({maxWidth:"98%",maxHeight:"98%"});
	$('.gallery-icon a').colorbox({maxWidth:"98%",maxHeight:"98%"});
	$('.wp-caption a').colorbox({maxWidth:"98%",maxHeight:"98%"});

	/*Gallery*/
	$("#gallery").justifiedGallery({
		  captions:true,
		  rowHeight:400,
		  lastRow : 'nojustify',
		  sizeRangeSuffixes:{'lt100':'',
			'lt240':'',
			'lt320':'',
			'lt500':'',
			'lt640':'',
			'lt1024':''}
	}).on('jg.complete', function (){
	    $("#gallery").fadeIn();
		$('#gallery a').colorbox({maxWidth:"98%",maxHeight:"98%"});
	});;

	$('.sticky').prepend('<div class="sign">Featured</div>');

	$('.woocommerce ul.products li.product a img').hover(function(){
		$(this).parent().next().show();
	},function(){
		$(this).parent().next().hide();
	});
	$('.woocommerce ul.products li.product .button.add_to_cart_button').hover(function(){
		$(this).show();
	},function(){
		$(this).hide();
	});


	/* Ajax Comment */
    var commentform=$('#commentform');
    commentform.prepend('<div id="comment-status" ></div>');
    var statusdiv=$('#comment-status');
	var list ;

    $('a.comment-reply-link').click(function(){
	  list = $(this).parent().parent().parent().attr('id');
    });


    commentform.submit(function(){
		if($('#comments').length==0){
		  $('#respond').before('<section id="comments"><h2 class="comment-title">'+comment_title+'</h2></section>');
		}

        var formdata=commentform.serialize();
        statusdiv.html('<p>Processing...</p>');
        var formurl=commentform.attr('action');

        $.ajax({
            type: 'post',
            url: formurl,
            data: formdata,
            error: function(XMLHttpRequest, textStatus, errorThrown)
                {
                    statusdiv.html('<p class="ajax-error" >You might have left one of the fields blank, or be posting too quickly</p>');
                },
            success: function(data, textStatus){
              if(data == "success" || textStatus == "success"){
                    statusdiv.html('<p class="ajax-success" >Thanks for your comment. We appreciate your response.</p>').delay(2000).fadeOut('slow');
					data=data.replace("success","");

					if($("#comments").has("ol.comment-list").length > 0){
							if(list != null){
								$('div.rounded').prepend(data);
							}
							else{
								$('ol.comment-list').append(data);
							}
					}
					else{
					   $("#comments").append('<ol class="comment-list"></ol>');
					   $('ol.comment-list').html(data);
					}
			  }else{
						statusdiv.html('<p class="ajax-error" >Please wait a while before posting your next comment</p>');
						commentform.find('textarea[name=comment]').val('');
			  }
            }
        });
        return false;
    });

    /*Weather*/
   var html;
   $.simpleWeather({
    location: 'London, UK',
    woeid: '',
    unit: 'c',
    success: function(weather) {
      html = '<span><i class="icon-'+weather.code+'"></i> '+weather.temp+'&deg;'+weather.units.temp+' '+weather.city+'</span>';

      $("#weather").html(html);
    },
    error: function(error) {
      $("#weather").html('<p>'+error+'</p>');
    }
   });

});
