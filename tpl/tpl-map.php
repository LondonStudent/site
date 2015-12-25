<?php
/**
 * Template: Map 
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */
?>        
    <div id="cn_content" class="container row">
      <?php
      if(!null==vp_metabox('contact_meta.contact_info.0.contact_map') && vp_metabox('contact_meta.contact_info.0.contact_map')<>''):
      ?>
      <!--FullWidth Slider-->
      <div id="slider" class="map">
      	<a href="javascript:void(0)" id="map_toggle"><i class="fa fa-angle-up"></i></a>
        <div class="contact_content">
	       <?php get_template_part('tpl/tpl','contact'); ?>
        </div>
        <?php echo str_replace('&','&amp;',vp_metabox('contact_meta.contact_info.0.contact_map'));?>
      </div>
      <?php endif;?>
   </div>