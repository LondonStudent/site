<h1 class="post__title"><?php the_title(); ?></h1>
	<div class="post__meta">
        <p><?php the_time('F jS, Y'); ?> by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('display_name'); ?></a></p>
