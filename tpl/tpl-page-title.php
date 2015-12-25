<?php
/**
 * Template: Page Title
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
?>

 <?php if(is_category()):
	get_template_part('tpl/tpl','slider');
 ?>
 <h2 class="archive_title"><span><?php echo esc_attr(single_cat_title( '', false));?></span></h2>
 <?php elseif(is_tag()):?>
  <h2 class="archive_title"><span><?php echo __('Tag: ','alaya'). esc_attr(single_tag_title('', false));?></span></h2>
 <?php elseif (is_day()):?>
  <h2 class="archive_title"><span><?php echo __('Date: ','alaya'). esc_attr(get_the_time('F jS, Y'));?></span></h2>
 <?php elseif (is_month()):?>
  <h2 class="archive_title"><span><?php echo __('Month: ','alaya'). esc_attr(get_the_time('F, Y'));?></span></h2>
 <?php elseif (is_year()):?>
  <h2 class="archive_title"><span><?php echo __('Year: ','alaya'). esc_attr(get_the_time('Y'));?></span></h2>
 <?php elseif (is_search()):?>
  <h2 class="archive_title"><span><?php echo __('Search: ','alaya').esc_attr($_GET['s']);?></span></h2>
 <?php elseif (is_page()):?>
  <h2 class="archive_title"><span><?php the_title();?></span></h2>
 <?php elseif (is_author()):
   if(isset($_GET['author_name'])) :
	$author = get_userdatabylogin($author_name);
   else :
	$author = get_userdata(intval($author));
   endif;
 ?>
  <h2 class="archive_title"><span><?php echo esc_attr($author->display_name);?></span></h2>
 <?php endif;?>