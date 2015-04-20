<?php get_header(); ?>

<section class="article-row">
	<ul class="headline">
        <?php
            // WP_Query arguments
            $args = array (
                'category_name'          => 'headline',
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    ?>
        <a href="<?php the_permalink(); ?>">
            <h1><?php the_title(); ?></h1>
            <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID, 'thumbnail') ); ?>
<img src="<?php echo $url ?>">
        </a>
                    <?php
                }
            } else {
                // no posts found
            }

            // Restore original Post Data
            wp_reset_postdata();
        ?>
	</ul>
    <hr>
</section>
<section class="article-row">
    <ul class="front-left">
                <?php
            // WP_Query arguments
            $args = array (
                'category_name'          => 'front-left',
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    ?>
         <a href="<?php the_permalink(); ?>">
            <h1><?php the_title(); ?></h1>
            <?php the_post_thumbnail();?>
        </a>
                    <?php
                }
            } else {
                // no posts found
            }

            // Restore original Post Data
            wp_reset_postdata();
        ?>
    </ul>
        <ul class="front-middle">
                <?php
            // WP_Query arguments
            $args = array (
                'category_name'          => 'front-middle',
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    ?>
        <a href="<?php the_permalink(); ?>">
            <h1><?php the_title(); ?></h1>
            <?php the_post_thumbnail();?>
        </a>
                    <?php
                }
            } else {
                // no posts found
            }

            // Restore original Post Data
            wp_reset_postdata();
        ?>
    </ul>
        <ul class="front-right">
                <?php
            // WP_Query arguments
            $args = array (
                'category_name'          => 'front-right',
            );

            // The Query
            $query = new WP_Query( $args );

            // The Loop
            if ( $query->have_posts() ) {
                while ( $query->have_posts() ) {
                    $query->the_post();
                    ?>
        <a href="<?php the_permalink(); ?>">
            <h1><?php the_title(); ?></h1>
            <?php the_post_thumbnail();?>
        </a>
                    <?php
                }
            } else {
                // no posts found
            }

            // Restore original Post Data
            wp_reset_postdata();
        ?>
    </ul>
</section>
<hr>

<?php get_footer(); ?>