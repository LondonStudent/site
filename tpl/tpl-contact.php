<?php
/**
 * Template: Contact Content
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */

$contact_subheading=vp_metabox('contact_meta.contact_info.0.contact_subheading');
$contact_address=vp_metabox('contact_meta.contact_info.0.contact_address');
$contact_email=vp_metabox('contact_meta.contact_info.0.contact_email');
$contact_phone=vp_metabox('contact_meta.contact_info.0.contact_phone');
$contact_form_7=vp_metabox('contact_meta.contact_form.0.contact_form_7');
$email=vp_metabox('contact_meta.contact_form.0.receive_email');
?>
      
      <!--1200px Grid-->
      <div class="container row">
      
       <!--Main Content-->         
        <div id="main">
          
	      <!--Standard Posts-->
	      <div id="contact-page"  class="sixteen columns alpha omega">
	         
             <section class="seven columns alpha contact-text">
              
                <?php if($contact_subheading<>''):?>
	            <h3 class="subheading"><?php echo sanitize_text_field ($contact_subheading);?></h3>
	            <?php endif;?>
	           	<div class="entry-content">
	           	  <?php the_content();?>
	           	</div>
	           	<ul class="contact-info">
                 <?php if(isset($contact_address) && $contact_address<>''):?>
	              <li><i class="fa fa-send"></i> <?php echo sanitize_text_field ($contact_address);?> </li>
	             <?php 
				 endif;
				 if(isset($contact_email) && $contact_email<>''):?>
	              <li><i class="fa fa-envelope"></i> <?php echo sanitize_email($contact_email);?></li>
	             <?php 
				 endif;
				 if(isset($contact_phone) && $contact_phone<>''):?>
	              <li><i class="fa fa-phone"></i> <?php echo sanitize_text_field ($contact_phone);?></li>
	             <?php endif;?>
               </ul>
               
             </section>
             
             <section class="seven columns omega contact-form">
              <h2><?php the_title();?></h2>
             <?php if($contact_form_7<>''):?>
                <?php echo do_shortcode(sanitize_text_field($contact_form_7));?>
             <?php else:?>
               <form id="contact-form" action="<?php echo get_template_directory_uri();?>/send-mail.php" method="post">
                <?php 
				if(!isset($email) || $email==''){
				    $email=get_option('admin_email');
				}				
				?>
                <input type="hidden" id="to" name="to" value="<?php echo sanitize_email($email);?>">
                <p><label><input type="text" name="name" id="name" placeholder="Name" class="required"></label></p>
                <p><label><input type="email" name="email" id="email" placeholder="Email" class="required email"></label></p>
                <p><label><input type="text" name="subject" id="subject" placeholder="Subject" class="required"></label></p>
                <p><label><textarea name="message" id="message" placeholder="Your message goes here" class="required"></textarea></label></p>					
                <p><input type="submit" class="button submit" value="SEND" /></p>
                
                <!-- AJAX Loader and Alert -->
                <div class="loader"></div>
                <div class="alert"></div>  
               </form>
             <?php endif;?>
             </section>
          
         </div>
      </div>
    </div>