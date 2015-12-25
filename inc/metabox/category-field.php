<?php
/**
 * Custom category field
 * @package Alaya_framework
 * @subpackage City News
 * @since 1.0
 */


// Add term page
function alaya_taxonomy_add_new_meta_field() {
	// this will add the custom meta field to the add new term page
	?>
	<div class="form-field">
		<label for="term_meta[template]"><?php _e( 'Template', 'alaya' ); ?></label>
		<select name="term_meta[template]" id="term_meta[template]">
		  <option value="standard">Standard</option>
		  <option value="standard-sidebar">Standard With Sidebar</option>
		  <option value="masonry">Masonry</option>
		  <option value="masonry-sidebar">Masonry With Sidebar</option>
		</select>
		<p class="description"><?php _e( 'Select a template for the archive page.','alaya' ); ?></p>
	</div>
	
	<div class="form-field">
		<label for="term_meta[slider]"><?php _e( 'Slider', 'alaya' ); ?></label>
		<select name="term_meta[slider]" id="term_meta[slider]">
		  <option value="0">No</option>
		  <option value="1">Yes</option>
		</select>
		<p class="description"><?php _e( 'Enable the slider for the archive page.','alaya' ); ?></p>
	</div>
	
	<div class="form-field slider-settings">
		<label for="term_meta[slider_post_number]"><?php _e( 'The Total Number Of Posts In The Slider', 'alaya' ); ?></label>
		<input type="text" name="term_meta[slider_post_number]" id="term_meta[slider_post_number]" value="" />
	</div>
	
	<div class="form-field slider-settings">
		<label for="term_meta[slider_posts_per_slide]"><?php _e( 'The Posts Per Slide', 'alaya' ); ?></label>
		<input type="text" name="term_meta[slider_posts_per_slide]" id="term_meta[slider_posts_per_slide]" value="" />
		<p class="description"><?php _e( 'How many posts in a slide?','alaya' ); ?></p>

	</div>
	
	<div class="form-field">
		<label for="term_meta[slider_effect]"><?php _e( 'Slide Effect', 'alaya' ); ?></label>
		<select name="term_meta[slider_effect]" id="term_meta[slider_effect]">
		  <option value="slide">Slide</option>
		  <option value="fade">Fade</option>
		  <option value="cube">3D Cube</option>
		  <option value="coverflow">3D Coverflow</option>
		</select>
	</div>
<?php
}
add_action( 'category_add_form_fields', 'alaya_taxonomy_add_new_meta_field', 10, 2 );

// Edit term page
function alaya_taxonomy_edit_meta_field($term) {
 
	// put the term ID into a variable
	$t_id = $term->term_id;
 
	// retrieve the existing value(s) for this meta field. This returns an array
	$term_meta = get_option( "taxonomy_$t_id" ); ?>
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[template]"><?php _e( 'Template', 'alaya' ); ?></label></th>
		<td>
		<select name="term_meta[template]" id="term_meta[template]">		  
		  <option value="standard" <?php if(esc_attr( $term_meta['template'])=='standard')echo 'selected="selected"'; ?>>Standard</option>
		  <option value="standard-sidebar" <?php if(esc_attr( $term_meta['template'])=='standard-sidebar')echo 'selected="selected"'; ?>>Standard with Sidebar</option>
		  <option value="masonry" <?php if(esc_attr( $term_meta['template'])=='masonry')echo'selected="selected"'; ?>>Masonry</option>
		  <option value="masonry-sidebar" <?php if(esc_attr( $term_meta['template'])=='masonry-sidebar')echo 'selected="selected"'; ?>>Masonry with Sidebar</option>
		  
		</select>
		<p class="description"><?php _e( 'Select a template for the archive page.','alaya' ); ?></p>
		</td>
	</tr>
	
	<tr class="form-field">
	<th scope="row" valign="top"><label for="term_meta[slider]"><?php _e( 'Slider', 'alaya' ); ?></label></th>
		<td>
		<select name="term_meta[slider]" id="term_meta[slider]">		  
		  <option value="0" <?php if(esc_attr( $term_meta['slider'])=='0')echo 'selected="selected"'; ?>>No</option>
		  <option value="1" <?php if(esc_attr( $term_meta['slider'])=='1')echo 'selected="selected"'; ?>>Yes</option>
		</select>
		<p class="description"><?php _e( 'Enable the slider for the archive page.','alay' ); ?></p>
		</td>
	</tr>
	
	<tr class="form-field slider_settings">
	<th scope="row" valign="top"><label for="term_meta[slider_post_number]"><?php _e( 'The Total Number Of Posts In The Slider', 'alaya' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[slider_post_number]" id="term_meta[slider_post_number]" value="<?php echo esc_attr( $term_meta['slider_post_number'] ) ? esc_attr( $term_meta['slider_post_number'] ) : '6'; ?>">
		</td>
	</tr>
	
	<tr class="form-field slider_settings">
	<th scope="row" valign="top"><label for="term_meta[slider_posts_per_slide]"><?php _e( 'The Posts Per Slide', 'alaya' ); ?></label></th>
		<td>
			<input type="text" name="term_meta[slider_posts_per_slide]" id="term_meta[slider_posts_per_slide]" value="<?php echo esc_attr( $term_meta['slider_posts_per_slide'] ) ? esc_attr( $term_meta['slider_posts_per_slide'] ) : '1'; ?>">
		<p class="description"><?php _e( 'How many posts in a slide?','alaya' ); ?></p>
		</td>
	</tr>
	
	<tr class="form-field slider_settings">
	<th scope="row" valign="top"><label for="term_meta[slider_effect]"><?php _e( 'Slider Effect', 'alaya' ); ?></label></th>
		<td>
		<select name="term_meta[slider_effect]" id="term_meta[slider_effect]">		  
		  <option value="slide" <?php if(esc_attr( $term_meta['slider_effect'])=='slide')echo 'selected="selected"'; ?>>Slide</option>
		  <option value="fade" <?php if(esc_attr( $term_meta['slider_effect'])=='fade')echo 'selected="selected"'; ?>>Fade</option>
		  <option value="cube" <?php if(esc_attr( $term_meta['slider_effect'])=='cube')echo 'selected="selected"'; ?>>3D Cube</option>
		  <option value="coverflow" <?php if(esc_attr( $term_meta['slider_effect'])=='coverflow')echo 'selected="selected"'; ?>>3D Coverflow</option>
		</select>
		</td>
	</tr>
<?php
}
add_action( 'category_edit_form_fields', 'alaya_taxonomy_edit_meta_field', 10, 2 );

// Save extra taxonomy fields callback function.
function save_taxonomy_custom_meta( $term_id ) {
	if ( isset( $_POST['term_meta'] ) ) {
		$t_id = $term_id;
		$term_meta = get_option( "taxonomy_$t_id" );
		$cat_keys = array_keys( $_POST['term_meta'] );
		foreach ( $cat_keys as $key ) {
			if ( isset ( $_POST['term_meta'][$key] ) ) {
				$term_meta[$key] = $_POST['term_meta'][$key];
			}
		}
		// Save the option array.
		update_option( "taxonomy_$t_id", $term_meta );
	}
}  
add_action( 'edited_category', 'save_taxonomy_custom_meta', 10, 2 );  
add_action( 'create_category', 'save_taxonomy_custom_meta', 10, 2 );

?>