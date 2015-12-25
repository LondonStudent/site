<?php
/**
 * Template: Posts Loop
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
?>             
		<!---Posts-->
		<?php
		  $ex_css='';
		  if($template=='masonry'){
			  $ex_css='three_columns';
			  $thumbnail_size='medium';
		  }elseif($template=='masonry-sidebar'){
			  $ex_css='two_columns post-'.get_the_ID();
			  $thumbnail_size='medium';
		  }elseif($template=='list'){
		      $ex_css='thumbnail_s post-'.get_the_ID();
		      $thumbnail_size="thumbnail";
		  }else{
			  $thumbnail_size='large';
		  }
		  if(is_attachment() || is_search()){
			  $ex_css="post"." post-".get_the_ID();
		  }
		?>
		<article <?php post_class($ex_css);?>>
		<?php echo alaya_format_media($thumbnail,$title,$thumbnail_size);?>
		
		<div class="entry-body">
		<?php if($title<>'no'):?>
		  <span class="category"><?php echo get_the_category_list( ', ' );?></span>
		  <h4 class="entry-title"><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h4>
		  <span class="title-divider"></span>
		<?php endif;?>
		  
		  <div class="entry-content">
		    <?php 
		    if(is_single()){
		     the_content();
		     wp_link_pages('before=<div class="page-navi">&after=</div>');
		    }else{
			  the_excerpt();
		    }
		   ?>
		    
		    <?php if(is_single()):?>
		    <?php 
			   //Tags
			   $posttags=get_the_tags();
			   if($posttags <>''):?>
               <div class="taglist">
                  <i class="fa fa-tag"></i> <?php the_tags('',' '); ?>
               </div>   
               <?php endif;?>  
            <?php endif;?>
            <div class="clear"></div>
		  </div>
		  <footer class="entry-tools">
		    <span><?php echo get_the_time(get_option('date_format'));?></span>		    
		    
		    <?php if(!is_single()):?>
		    <a href="<?php the_permalink();?>" class="morelink"><?php _e('Continue to read','alaya');?> <i class="fa fa-long-arrow-right"></i></a>
		    <?php elseif(!null==alaya_opt('post_share') && alaya_opt('post_share')==1):
		    ?>
		    <div class="share"><?php echo alaya_share(get_the_ID());?></div>
		    <?php endif;?>
		  </footer>
		 </div>
		</article>

