<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>



<?php
	// Author info
	$authorID = get_the_author_meta('ID');
	$url = get_author_posts_url($authorID);
	$fullName = get_author_fullname($authorID);
	$email = get_the_author_meta('user_email');
	$avatar = get_avatar_url(get_avatar( $email, '100', 'http://placehold.it/100' ));
	$url2 = $fullName;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="post__image">
		<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		<img src="<?php echo $image[0]; ?>" >
	</div>

	<?php
		if (in_category('Liveblog')) {
			include(locate_template('templates/single-live.php'));
		} else {
			include(locate_template('templates/single.php'));
		};
	?>

</article>

<section class="author-card">
	<img class="author-card__img" src="<?php echo $avatar ?>">
	<div class="author-card__info">
		<span class="author-card__name"><?php echo $fullName ?></span>
		<p class="author-card__bio">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia debitis incidunt excepturi, voluptatem.</p>
		<ul class="author-card__links">
			<!-- <li class="author-card__social__item"><a href="" class="icon icon--twitter">T</a></li> -->
			<li class="author-card__link"><a class="icon-p icon-p--web" href="http://rossmackay.co">rossmackay.co</a></li>
			<li class="author-card__link"><a class="icon-p icon-p--twitter" href="http://twitter.com/r_mcky">@r_mcky</a></li>
		</ul>
	</div>
</section>

<section class="related">
	<h3 class="related__header">
		Related
	</h3>
	<ul class="article-grid">
		<li class="article-grid__item">
			<a class="article-grid__link" href="#">
				<img class="article-grid__img" src="http://p-hold.com/350/200" alt="">
				<span class="article-grid__text">Article 1</span>
			</a>
		</li>
		<li class="article-grid__item">
			<a class="article-grid__link" href="#">
				<img class="article-grid__img" src="http://p-hold.com/350/200" alt="">
				<span class="article-grid__text">Article 2</span>
			</a>
		</li>
		<li class="article-grid__item">
			<a class="article-grid__link" href="#">
				<img class="article-grid__img" src="http://p-hold.com/350/200" alt="">
				<span class="article-grid__text">Article 3</span>
			</a>
		</li>
	</ul>
</section>

<section class="related">
	<h3 class="related__header">
		Related
	</h3>
	<ul class="article-grid">
		<li class="article-grid__item">
			Article 1
		</li>
		<li class="article-grid__item">
			Article 2
		</li>
		<li class="article-grid__item">
			Article 3
		</li>
	</ul>
</section>



<?php endwhile; ?>

<?php get_footer(); ?>
