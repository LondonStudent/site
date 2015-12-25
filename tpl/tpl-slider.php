<?php
/**
 * Template: Slider 
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
?>        

<?php 
  $thumbnail_size='large';
  if($enable_slider==1):
	if($posts_per_slide=='')$posts_per_slide=1;
	if($posts_per_slide<=2){
	   $thumbnail_size='large';
	}else{
	   $thumbnail_size='medium';
	}
	if($posts_number=='')$posts_number=6;
	if($slide_effect=='')$slide_effect='slide';
?>      
<!-- Slider main container -->
<div class="cn-slider-container" id="citynews-slider">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        <?php
        query_posts('posts_per_page='.esc_attr($posts_number).'&post_type=post&cat='.esc_attr($cat_id));
        while ( have_posts() ) : the_post();
        $header_image='';
	      if(has_post_thumbnail()):
	         $header_image_array=wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), $thumbnail_size );
	         $header_image=$header_image_array[0];
	      endif; 
	    ?>
        <div class="swiper-slide" style="background-image:url(<?php echo esc_url($header_image);?>);">
           <div class="overlay"></div>
           <div class="text"> 
            <h2>
               <span><?php echo get_the_category_list( ', ' );?> / <?php echo get_the_time(get_option('date_format'))?></span>
               <a href="<?php echo esc_url(get_permalink());?>" title="<?php echo esc_html(get_the_title());?>"><?php echo esc_html(get_the_title());?></a>
            </h2>
            <?php if($posts_per_slide==1):?>
            <p><?php echo esc_html(get_the_excerpt());?></p>
            <?php endif;?>
           </div>
        </div>
    <?php 
    endwhile;
	wp_reset_query();    
    ?>
    </div>
    
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
    
    <script type="text/javascript">
    jQuery(document).ready(function($){
        var numberPerSlide=1;
        
        function numberPerView(){
	        if($(window).width()<768){
		        numberPerSlide=1;
	        }else{
		        numberPerSlide=<?php echo esc_attr($posts_per_slide);?>;
	        }
        }numberPerView();
        
        $(window).resize(function(){
	        numberPerView();
        });
        
        if(numberPerSlide==1){
		   $('.cn-slider-container').addClass('fullwidth');
	    }
	    
	    $('.cn-slider-container .text').delay('500').fadeIn();
    
	    var swiper = new Swiper('.cn-slider-container', {

	        nextButton: '.swiper-button-next',
	        prevButton: '.swiper-button-prev',
	        spaceBetween: 1,
	        slidesPerView: numberPerSlide,
	        effect: '<?php echo esc_attr($slide_effect);?>',
            preloadImages: false,
            lazyLoading: true
	    });
	    
    });
    </script>
    
</div>
<?php endif;?>