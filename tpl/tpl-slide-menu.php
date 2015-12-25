<?php
/**
 * Header: Style 1
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
?>

<!-- Pushy Menu -->
<nav class="pushy pushy-left">
    <ul>
        <?php wp_nav_menu(array(
				  'theme_location' => 'primary_navi',
				  'container' => '',
				  'menu_class' => '',
				  'echo' => true,
				  'fallback_cb' => 'alaya_default_menu',
				  'items_wrap'      => '%3$s',
                  'depth' => 5)
                  );
	    ?>
    </ul>
</nav>

<!-- Site Overlay -->
<div class="site-overlay"></div>