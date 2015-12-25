<?php
/**
 * Comment
 *
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */


// Do not delete these lines
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
	
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'Wonders'); ?></p> 
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<?php if ( have_comments() ) : ?>
<section id="comments">
         <h3 class="comment-title section-title"><?php comments_number(__('NO COMMENTS ON THIS POST', 'Wonders'), __('ONE COMMENT ON THIS POST', 'Wonders'), __('% COMMENTS ON THIS POST', 'Wonders'));?> <?php printf(__('To &#8220;%s&#8221;', 'Wonders'), the_title('', '', false)); ?></h3>
         
        <ol id="comment-list" class="comment-list">
               <?php wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 80,
				) );?> 
        </ol>
        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
        <div class="comment-navigation">
           <div class="nav-previous"><?php previous_comments_link() ?></div>
           <div class="nav-next"><?php next_comments_link() ?></div>
        </div>
        <?php endif;?>
</section>
<?php endif; ?>

<?php comment_form(); ?>