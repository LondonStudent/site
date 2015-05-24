<header class="post__header">
	<?php
		$imgId = get_post_thumbnail_id( $post->ID );
		$image = wp_get_attachment_image_src($imgId, 'single-post-thumbnail' );
		$attributionName = get_post_meta($imgId, 'ls_attribution_name', true);
		$attributionURL = get_post_meta($imgId, 'ls_attribution_url', true);
	?>
	<?php if ($image) { ?>
		<div class="post__image">
			<img src="<?php echo $image[0]; ?>" >
			<?php if($attributionURL) { ?>
				<div class="post__image__attribution">Image via <a href="<?php echo $attributionURL; ?>"><?php echo $attributionName ? $attributionName : $attributionURL; ?></a></div>
			<?php } ?>
		</div>
	<?php } ?>
    
    <div>
    <?php
		if (in_category('Comment')) {
			echo "";
		} else {
			echo(get_template_part('byline'));
		};
	?>
	</div>
</header>



<div class="post__content">
	<?php the_content(); ?>
</div>
