<?php
/**
 * Template: Category loop
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
?>
    <div class="alaya_loader"><i class="fa fa-spinner fa-spin"></i></div>
	<?php
	 $include='';
	 if($category<>''){
       $include_slug_array=explode(',',$category);
	   for($i=0;$i<count($include_slug_array);$i++){
		 $terms = get_term_by('slug', $include_slug_array[$i], 'category'); 
		 $include .= $terms->term_id.',';
	   }
	   $include = trim($include, ',');
	  }
	   
	  $terms = get_terms('category',array('hide_empty'=>true,'parent'=>0,'include'=>$include));
	  foreach ($terms as $term){
			$catid=$term->term_id;
			$catname=$term->name;
	 ?>
      <!--category block-->
      <section class="channel <?php echo esc_attr($columns_class);?>">
          <h5 class="channel_title"><a href="<?php echo esc_url(home_url('/'));?>/?cat=<?php echo esc_attr($catid);?>" class="channel_link"><i class="fa fa-arrow-circle-o-right"></i> <?php echo esc_attr($catname);?></a></h5>
           <?php
              query_posts(array('post_type'=>'post','posts_per_page'=>1,'cat'=>$catid));
              while ( have_posts() ) : the_post();
                set_query_var( 'template', 'standard');
                set_query_var( 'title', 'yes');
                set_query_var( 'thumbnail', 'yes');
			     get_template_part('tpl/tpl','loop');
			  endwhile; 
			  wp_reset_query();       
          ?>
           
          <?php
          $mycats=get_categories ('include='.$catid);
	      $postcount=$mycats[0]->category_count;
	      if($postcount>1):
          ?>
          <ul class="post_list">
          <?php
	          query_posts(array('post_type'=>'post','posts_per_page'=>3,'cat'=>$catid,'offset'=>-1));
              while ( have_posts() ) : the_post();
          ?>
            <li>
            <?php if(has_post_thumbnail()):?>
            <a href="<?php the_permalink();?>" class="thumbnail"><?php the_post_thumbnail('thumbnail');?></a>
            <?php endif;?>
            <a href="<?php the_permalink();?>" class="post_title"><?php the_title();?></a>
            <p><?php echo esc_attr(get_the_time(get_option('date_format')));?></p><div class="clear"></div>
            </li>
          <?php
	          endwhile; 
			  wp_reset_query();  
          ?>
          </ul>
          <?php endif;?>
      </section>
      <?php 
           } 
      ?>