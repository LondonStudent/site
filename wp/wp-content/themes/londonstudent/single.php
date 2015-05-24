<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<?php
	// Author info
	$authorID = get_the_author_meta('ID');
	$url = get_author_posts_url($authorID);
	$fullName = get_author_fullname($authorID);
	$email = get_the_author_meta('user_email');
	//$avatar = get_avatar_url(get_avatar( $email, '100', 'http://placehold.it/100' ));
	$url2 = $fullName;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
		if (in_category('Liveblog')) {
			include(locate_template('templates/single-live.php'));
		} else {
			include(locate_template('templates/single.php'));
		};
	?>

</article>

<?php endwhile; ?>

<?php get_footer(); ?>
