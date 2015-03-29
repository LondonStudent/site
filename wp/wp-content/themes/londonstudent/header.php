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

<?php //wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	<nav class="navbar">
		<div class="navbar__left">
			<a href="" id="nav-toggle">Sidebar</a>
		</div>

		<a href="/" class="navbar__logo">LondonStudent</a>

		<ul class="navbar__right">
				<li><a href="#">Search?</a></li>
		</ul>
	</nav>

<div id="site-canvas" class="site-canvas">
<!-- <div id="site-canvas" class="site-canvas site-canvas--active"> -->
	<div class="offcanvas">
		<ul class="sidebar__feed">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<li class="sidebar__feed__item">
					<a class="sidebar__feed__link" href="<?php the_permalink(); ?>">
						<span class="sidebar__feed__date"><?php the_time('F jS, Y'); ?></span>
						<span class="sidebar__feed__title"><?php the_title(); ?></span>
					</a>
				</li>
			<?php endwhile; else : ?>
			<?php endif; ?>

		</ul>
	</div>
	<div class="content">
