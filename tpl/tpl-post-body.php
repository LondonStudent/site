<?php
/**
 * Template: Single Post Content
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */

?>
        <?php
        /* Load Content */
        while ( have_posts() ) : the_post();
          set_query_var( 'template', 'standard');
          set_query_var( 'title', $title);
          set_query_var( 'thumbnail', $thumbnail);
	      get_template_part('tpl/tpl','loop');
	    ?>

		<?php if(!null==alaya_opt('post_author') && alaya_opt('post_author')==1):?>

		<!--Author-->
		<section id="author_vcard">
		<h3 class="author-title section-title"><?php _e('About Author','alaya');?></h3>
    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
    <?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?>

      <p><strong><?php the_author_meta('nickname'); ?></strong>
        </a>
		<?php the_author_meta('description'); ?><br>
		<a href="<?php the_author_url(); ?>"><?php the_author_url(); ?></a>
		</p>
		<br class="clearfix" />
		</section>
		<?php endif;?>

		<!--Prev / Next-->
		<div class="post_navi">
		<?php previous_post_link('<div class="alignleft item"><i class="fa fa-angle-left"></i>'.'%link'.'</div>'); ?>
		<?php next_post_link('<div class="alignright item">'.'%link'.'<i class="fa fa-angle-right"></i></div>'); ?>
		</div>

		<?php get_template_part('tpl/tpl','related-posts'); ?>

		<!--Comment-->
		<?php
		if ( comments_open() || get_comments_number()) {
			comments_template();
		}
		endwhile;
		?>
