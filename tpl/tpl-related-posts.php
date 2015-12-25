<?php
/**
 * Related Posts
 * @package Alaya Framework
 * @subpackage City News
 * @since 1.0
 */

global $alaya_option; 

if ( $alaya_option['single_related_posts_show_by'] == 'related_cat' ) {
	$alaya_taxs = get_the_category( $post->ID ); // Display related posts by category
} else {
	$alaya_taxs = wp_get_post_tags( $post->ID ); // Display related posts by tag
}


if ( $alaya_taxs ) {

	$alaya_tax_ids = array();

	foreach($alaya_taxs as $individual_tax) $alaya_tax_ids[] = $individual_tax->term_id;

	$posts_to_show = 3;

	if ( $alaya_option['single_related_posts_show_by'] == 'related_cat' ) { 
		// Loop argumnetsnts show posts by category
		$args = array(
			'category__in' => $alaya_tax_ids,
			'post__not_in' => array( $post->ID ),
			'posts_per_page' => $posts_to_show,
			'ignore_sticky_posts' => 1
		);
	} else { 
		// Loop argumnetsnts show posts by category
		$args = array(
			'tag__in' => $alaya_tax_ids,
			'post__not_in' => array( $post->ID ),
			'posts_per_page' => $posts_to_show,
			'ignore_sticky_posts' => 1
		);
	}

	$alaya_related_posts = new WP_Query( $args );
	 if( $alaya_related_posts->have_posts() && alaya_opt('related_posts')==1 ) : 
?>
	
    <section class="related-posts">
    
        <h3 class="section-title"><?php _e( 'You may also like', 'alaya' ); ?></h3>
    
        <div class="grids">
            <?php 
				while ( $alaya_related_posts->have_posts() ) : $alaya_related_posts->the_post(); ?>
		
				<div class="item post">
					  <div class="thumbnail">
					      <a title="<?php the_title();?>" href="<?php the_permalink();?>">
							<?php 
							if ( has_post_thumbnail() ) {
								the_post_thumbnail( 'medium' );
							}
							?></a>
					  </div>
					  <header class="entry-header">
						  <h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
					  </header>
				</div>
			
				<?php endwhile; ?>
            
            	<?php wp_reset_postdata(); ?>
                <div class="clearfix"></div>

         </div>
    </section>

<?php 
   endif;
} ?>