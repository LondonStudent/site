<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class('site-wrapper'); ?>>

    <svg display="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <symbol id="icon-menu" viewBox="0 0 1024 1024">
            <path class="path1" d="M64 192h896v192h-896zM64 448h896v192h-896zM64 704h896v192h-896z"></path>
        </symbol>
    </svg>

<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	<nav class="navbar">
		<div class="navbar__left">
			<a href="" id="nav-toggle"><svg class="icon icon-twitter"><use xlink:href="#icon-menu"></use></svg></a>
		</div>

		<a href="/" class="navbar__logo">
        <img src="<?php echo get_template_directory_uri(); ?>
/img/ls-logo.svg" alt="<?php echo get_template_directory_uri(); ?>
/img/ls-logo.png">
        </a>

		<ul class="navbar__right">
				<li><a href="/tips">Contact Us</a></li>
		</ul>
	</nav>

<div id="site-canvas" class="site-canvas">
    <?php
        if(is_front_page()) {
            echo "";}
		elseif(in_category('Comment')) {
			echo(get_template_part('comment', 'header'));
		} else {
            echo "";}
	?>
<!-- <div id="site-canvas" class="site-canvas site-canvas--active"> -->
	<div class="offcanvas">
		<ul class="sidebar__feed">
			<?php $postFeed = new WP_Query('post_type=post'); ?>
			<?php while ($postFeed->have_posts()) : $postFeed->the_post(); ?>
				<li class="sidebar__feed__item">
					<a class="sidebar__feed__link" href="<?php the_permalink(); ?>">
						<span class="sidebar__feed__date"><?php the_time('F jS, Y'); ?></span>
						<span class="sidebar__feed__title"><?php the_title(); ?></span>
					</a>
				</li>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</ul>
	</div>
	<div class="content">
