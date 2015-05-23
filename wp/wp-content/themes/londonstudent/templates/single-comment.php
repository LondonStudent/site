<header class="post__header">
	<?php
        $avatar = get_avatar( get_the_author_meta( $post->ID ), 32 );
		$imgId = get_post_thumbnail_id( $post->ID );
		$image = wp_get_attachment_image_src($imgId, 'single-post-thumbnail' );
		$attributionName = get_post_meta($imgId, 'ls_attribution_name', true);
		$attributionURL = get_post_meta($imgId, 'ls_attribution_url', true);
	?>
    
    <h1 class="post__title"><?php the_title(); ?></h1>
    
    //post the author's avatar
    <?php if ($avatar) { ?>
        <div class="post__avatar">
             <img src="<?php echo $avatar; ?>">
        </div>
    <?php } ?> 
    
    //post the image and attrib
	<?php if ($image) { ?>
		<div class="post__image">
			<img src="<?php echo $image[0]; ?>" >
			<?php if($attributionURL) { ?>
				<div class="post__image__attribution">Image via <a href="<?php echo $attributionURL; ?>"><?php echo $attributionName ? $attributionName : $attributionURL; ?></a></div>
			<?php } ?>
		</div>
	<?php } ?>
	<div class="post__meta">
		<p><?php the_time('F jS, Y'); ?> by <a href="<?php echo $url; ?>"><?php echo $url2 ?></a></p>
	</div>
</header>



<div class="post__content">
	<?php the_content(); ?>
</div>
