<?php get_header(); ?>

<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="post__header">
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<?php if ($image) { ?>
			<div class="post__image">
				<img src="<?php echo $image[0]; ?>" >
			</div>
		<?php } ?>

		<h1 class="post__title"><?php the_title(); ?></h1>
	</header>

	<div class="post__content">
		<?php the_content(); ?>
	</div>


</article>

<?php get_footer(); ?>
