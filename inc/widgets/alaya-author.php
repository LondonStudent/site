<?php
/**
 * Authors Widgets
 * @package Alaya Framework
 * @subpackage City News
 * @since 1.0
 */
class alaya_author extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'alaya_author', // Base ID
			__( '(CityNews) Blog Authors', 'alaya' ), // Name
			array( 'description' => __( 'Display the site authors, editors and contributors', 'alaya' ), ) // Args
		);

	}

	/**
	 * Front-end display of widget
	**/
	public function widget( $args, $instance ) {
				
		extract( $args );

		$title = apply_filters('widget_title', isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : 'Site Authors' );
		$type_admin = isset( $instance['type_admin'] ) ? esc_attr( $instance['type_admin'] ) : false;
		$type_author = isset( $instance['type_author'] ) ? esc_attr( $instance['type_author'] ) : false;
		$type_contributor = isset( $instance['type_contributor'] ) ? esc_attr( $instance['type_contributor'] ) : false;
		$type_editor = isset( $instance['type_editor'] ) ? esc_attr( $instance['type_editor'] ) : false;
		
		
		// Admins
		if ( $type_admin ):
			$admin_query = new WP_User_Query(
				array( 'role' => 'administrator', 'orderby' => 'post_count', 'order' => 'DESC' )
			);
			$admin = $admin_query->get_results();
		endif;

		// Authors
		if ( $type_author ):
			$author_query = new WP_User_Query(
				array( 'role' => 'author', 'orderby' => 'post_count', 'order' => 'DESC' )
			);
			$author = $author_query->get_results();
		endif;

		// Contributors
		if ( $type_contributor ):
			$contributor_query = new WP_User_Query(
				array( 'role' => 'contributor', 'orderby' => 'post_count', 'order' => 'DESC' )
			);
			$contributor = $contributor_query->get_results();
		endif;

		// Editors
		if ( $type_editor ):
			$editor_query = new WP_User_Query(
				array( 'role' => 'editor', 'orderby' => 'post_count', 'order' => 'DESC' )
			);
			$editor = $editor_query->get_results();
		endif;

		// Store all as site authors
		$site_authors = array_merge (
			isset( $admin ) ? $admin : array(),
			isset( $author ) ? $author : array(),
			isset( $contributor ) ? $contributor : array(),
			isset( $editor ) ? $editor : array()
		);


		echo $before_widget;
		if ( $title ) echo $before_title . $title . $after_title;
		?>
        
		<div class="inner">
			<ul>
			<?php
            foreach ( $site_authors as $author ):
                
                // Get the author ID
                $author_id = $author->ID;
				
                // Retrieve the gravatar image by author email address
                $author_avatar = get_avatar( get_the_author_meta( 'user_email', $author_id ), '150', '', get_the_author_meta( 'display_name', $author_id ) );
                ?>
                
                <li>
                    <a class="author-avatar" href="<?php echo esc_url(get_author_posts_url( $author_id )); ?>" title="<?php echo esc_attr(get_the_author_meta( 'display_name', $author_id )); ?>" rel="author">
                        <?php echo $author_avatar; ?>
                    </a>
                        <span class="author-name">
                            <a href="<?php echo get_author_posts_url( $author_id ); ?>" rel="author">
                                <?php
                                $author_name = get_the_author_meta( 'first_name', $author_id );
                                $author_last_name = get_the_author_meta( 'last_name', $author_id );
                        
                                if ( $author_name || $author_last_name ) {
                                    echo '<span class="f-name">' . esc_attr($author_name) . '</span> <span class="l-name">' . esc_attr($author_last_name) . '</span>';
                                } else {
                                    echo esc_attr(get_the_author_meta( 'display_name', $author_id ));
                                } ?>
                            </a>
                        </span>
                </li>
                        
            <?php 
            endforeach;
            wp_reset_postdata(); 
            ?>
            </ul>
            
		</div>
            
		<?php	
		echo $after_widget;
		
		
	}
	
	
	/**
	 * Sanitize widget form values as they are saved
	**/
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['type_admin'] = $new_instance['type_admin'];
		$instance['type_author'] = $new_instance['type_author'];
		$instance['type_contributor'] = $new_instance['type_contributor'];
		$instance['type_editor'] = $new_instance['type_editor'];
		
		return $instance;
		
	}
	
	
	/**
	 * Back-end widget form
	**/
	public function form( $instance ) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => ' Site Authors',
			'type_admin' => false,
			'type_author' => false,
			'type_contributor' => false,
			'type_editor' => false,
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'alaya'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		<p>
			<label><?php _e( 'Show:', 'alaya' ); ?></label><br />
			<input type="checkbox" id="<?php echo $this->get_field_id( 'type_admin' ); ?>" name="<?php echo $this->get_field_name( 'type_admin' ); ?>"  value="1" <?php if ($instance["type_admin"] == true) echo 'checked="checked"'; ?> />
     		<label for="<?php echo $this->get_field_id('type_admin'); ?>"><?php _e( 'Administrators', 'alaya' ); ?></label><br />

			<input type="checkbox" id="<?php echo $this->get_field_id( 'type_author' ); ?>" name="<?php echo $this->get_field_name( 'type_author' ); ?>"  value="1" <?php if ($instance["type_author"] == true) echo 'checked="checked"'; ?> />
     		<label for="<?php echo $this->get_field_id('type_author'); ?>"><?php _e( 'Authors', 'alaya' ); ?></label><br />

     		<input type="checkbox" id="<?php echo $this->get_field_id( 'type_contributor' ); ?>" name="<?php echo $this->get_field_name('type_contributor'); ?>"  value="1" <?php if ($instance["type_contributor"] == true) echo 'checked="checked"'; ?> />
     		<label for="<?php echo $this->get_field_id( 'type_contributor' ); ?>"><?php _e( 'Contributors', 'alaya' ); ?></label><br />

     		<input type="checkbox" id="<?php echo $this->get_field_id( 'type_editor' ); ?>" name="<?php echo $this->get_field_name( 'type_editor' ); ?>"  value="1" <?php if ($instance["type_editor"] == true) echo 'checked="checked"'; ?> />
     		<label for="<?php echo $this->get_field_id( 'type_editor' ); ?>"><?php _e( 'Editors', 'alaya' ); ?></label>
    	</p>
	<?php
	}

}
register_widget( 'alaya_author' );
?>