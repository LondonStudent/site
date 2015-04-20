<div class="post__header">
	<h1 class="post__title"><?php the_title(); ?></h1>
	<div class="post__meta">
		<p><?php the_time('F jS, Y'); ?> by <a href="<?php echo $url; ?>"><?php echo $url2 ?></a></p>
	</div>
</div>

<div class="post__content">
	<?php the_content(); ?>
</div>
