<div class="commentdiv">

    <?php get_header(); ?>

    <h1>

        <?php the_title(); ?><br>
        <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta('display_name'); ?></a>
    </h1>

    <h2>
        <?php the_time('F jS, Y'); ?>  </h2><br>


</div>
