<?php
/**
 * Shortcodes generator HTML
 * @package Alaya_framework
 * @since 1.0
 */
?>

<form class="sh-wrap">
	<br>
	<label for="sh_list">Shortcodes</label>
	<br>
	<select id="sh_list" name="sh_list" class="widefat sh-list" style="width: 50%;">
		<option value="column">Column</option>
		<option value="tabs">Tabs Wrapper</option>
		<option value="tab_item">-- Tab Item</option>
		<option value="toggle">Toggle</option>
		<option value="dropcap">Dropcap</option>
		<option value="separator">Separator</option>
		<option value="clear">Clear Float</option>
		<option value="heading">Heading</option>
        <option value="btn">Button</option>
        <option value="feature_item">Feature Item</option>
        <option value="member">Member</option>
        <option value="messagebox">Message Box</option>
        <option value="social_icons">Social Icons</option>
        <option value="spacing">Spacing</option>
         <option value="skills">Skills Wrapper</option>
        <option value="skill">-- Skill</option>
	</select>
	<!-- end shortcodes -->
	<br>
	<br>
	
	
	<!-- shortcodes fields ====================================== -->
	
	<!-- column -->
	<div class="column">
		<label for="column_width">Width</label>
		<br>
		<select id="column_width" name="column_width" class="widefat" style="width: 30%;">
			<option>1/2</option>
			<option>1/3</option>
			<option>1/4</option>
			<option>2/3</option>
			<option>3/4</option>
		</select>
		<br>
		<br>
        <label for="column_last">Is it the last column in a row?</label>
        <br>
		<select id="column_last" name="column_last" class="widefat" style="width: 30%;">
			<option value="0">No</option>
			<option value="1">Yes</option>
		</select>
        <br>
		<br>
		<label for="column_content">Content</label>
		<br>
		<textarea id="column_content" name="column_content" rows="4" cols="50" class="widefat" style="width: 50%;"></textarea>
		<br>
		<br>
	</div>
	<!-- end column -->
	
	
	<!-- tab_item -->
	<div class="tab_item" style="display: none;">
		<label for="tab_title">Tab Title</label>
		<br>
		<input type="text" id="tab_title" name="tab_title" class="widefat" style="width: 30%;">
		<br>
		<br>
		<label for="tab_content">Tab Content</label>
		<br>
		<textarea id="tab_content" name="tab_content" rows="4" cols="50" class="widefat" style="width: 50%;"></textarea>
		<br>
		<br>
	</div>
	<!-- end tab item -->
	
	<!-- toggle -->
	<div class="toggle" style="display: none;">
		<label for="toggle_active">Active</label>
		<br>
		<select id="toggle_active" name="toggle_active" class="widefat" style="width: 30%;">
			<option value="off">Disactive</option>
			<option value="open">Active</option>
		</select>
		<br>
		<br>
		<label for="toggle_title">Title</label>
		<br>
		<input type="text" id="toggle_title" name="toggle_title" class="widefat" style="width: 30%;">
		<br>
		<br>
		<label for="toggle_content">Content</label>
		<br>
		<textarea id="toggle_content" name="toggle_content" rows="4" cols="50" class="widefat" style="width: 50%;"></textarea>
		<br>
		<br>
	</div>
	<!-- end toggle -->
	
	
	<!-- separator -->
	<div class="separator" style="display: none;">
		<label for="separator_color">Border color</label>
		<br>
		<input type="text" id="separator_color" name="sepeator_color" value="" class="widefat" style="width: 30%;" />
		<br><span class="alaya_desc">Enter your color code, e.g. #000000</span>
		<br>
	</div>
	<!-- end separator -->
	
	
	<!-- list -->
	<div class="list" style="display: none;">
        <label for="list_styles">List Styles</label>
		<br>
		<select id="list_styles" name="list_styles" class="widefat" style="width: 30%;">
			<option value="correct">Correct</option>
			<option value="error">Error</option>
            <option value="download">Download</option>
            <option value="star">Star</option>
		</select>
		<br>
		<br>
		<label for="list_content">Content</label>
		<br>
		<textarea id="list_content" name="list_content" rows="4" cols="50" class="widefat" style="width: 50%;">
<ul>
  <li>You list content here</li>
  <li>You list content here</li>
  <li>You list content here</li>
</ul>
        </textarea>
		<br><span class="alaya_desc">You must organize the list content as "ul li"</span>
		<br>
		<br>
	</div>
	<!-- end list -->
	
	
	<!-- heading -->
	<div class="heading" style="display: none;">
		<label for="heading_title">Title</label>
		<br>
		<input type="text" id="heading_title" name="heading_title" value="" class="widefat" style="width: 30%;" />
		<br>
        <br>
        <label for="heading_size">Size</label>
		<br>
        <select id="heading_size" name="heading_size" class="widefat" style="width: 30%;">
			<option value="h2">h2</option>
			<option value="h3">h3</option>
            <option value="h4">h4</option>
            <option value="h5">h5</option>
            <option value="h6">h6</option>
		</select>
		<br>
        <br>
         <label for="heading_top">Top</label>
		<br>
		<input type="text" id="heading_top" name="heading_top" value="" class="widefat" style="width: 30%;" />
		<br><span class="alaya_desc">Distance from above section, e.g. 30px</span>
		<br>
        <br>
         <label for="heading_bottom">Bottom</label>
		<br>
		<input type="text" id="heading_bottom" name="heading_bottom" value="" class="widefat" style="width: 30%;" />
		<br><span class="alaya_desc">Distance from next section, e.g. 30px</span>
		<br>
        <br>
	</div>
	<!-- end heading -->
	
	
	<!-- Button -->
	<div class="btn" style="display: none;">
		<label for="button_text">Button Text</label>
		<br>
		<input type="text" id="button_text" name="button_text" value="button" class="widefat" style="width: 30%;" />
		<br>
		<br>
        <label for="button_link">Button Link</label>
		<br>
		<input type="text" id="button_link" name="button_link" value="" class="widefat" style="width: 30%;" />
		<br><span class="alaya_desc">Don't forget add "http://" in front of the link.</span>
        <br>
		<br>
        <label for="button_link_target">Open Link in a new window/tab?</label>
		<br>
		<select id="button_link_target" name="button_link_target" class="widefat" style="width: 30%;">
			<option value="_self">No</option>
            <option value="_blank">Yes</option>
		</select>
		<br>
        <br>
        <label for="button_link_anchor">Is it anchor link?</label>
		<br>
		<select id="button_link_anchor" name="button_link_anchor" class="widefat" style="width: 30%;">
			<option value="0">No</option>
            <option value="1">Yes</option>
		</select>
		<br>
        <br>
        <!--<label for="button_aligned">Button position</label>
		<br>
		<select id="button_aligned" name="button_aligned" class="widefat" style="width: 30%;">
			<option value="left">Left</option>
            <option value="center">Center</option>
            <option value="right">Right</option>
		</select>
		<br>
        <br>-->
        <label for="button_size">Button size</label>
		<br>
		<select id="button_size" name="button_size" class="widefat" style="width: 30%;">
			<option value="small">Small</option>
            <option value="large">Large</option>
            <option value="large-x">Large X</option>
		</select>
		<br>
        <br>
        <label for="button_color">Button color</label>
		<br>
		<select id="button_color" name="button_color" class="widefat" style="width: 30%;">
			<option value="black">Black</option>
            <option value="grey">Grey</option>
            <option value="white">White</option>
            <option value="blue">Blue</option>
            <option value="red">Red</option>
            <option value="orange">Orange</option>
            <option value="green">Green</option>
            <option value="pink">Pink</option>
            <option value="purple">Purple</option>
            <option value="">None</option>
		</select>
		<br>
        <br>
        <label for="button_bgcolor">Custom background color</label>
		<br>
		<input type="text" id="button_bgcolor" name="button_bgcolor" value="" class="widefat" style="width: 30%;" />
		<br><span class="alaya_desc">e.g. #000000</span>
        <br>
		<br>
        <label for="button_textcolor">Custom text color</label>
		<br>
		<input type="text" id="button_textcolor" name="button_textcolor" value="" class="widefat" style="width: 30%;" />
		<br><span class="alaya_desc">e.g. #ffffff</span>
        <br>
        <br>
        <label for="button_bordercolor">Custom border color</label>
		<br>
		<input type="text" id="button_bordercolor" name="button_bordercolor" value="" class="widefat" style="width: 30%;" />
		<br><span class="alaya_desc">e.g. #333333</span>
        <br>
		<br>
	</div>
	<!-- end Button -->
	
	
	<!-- feature_item -->
	<div class="feature_item" style="display: none;">
		<label for="feature_title">Feature Title</label>
		<br>
		<input type="text" id="feature_title" name="feature_title" value="" class="widefat" style="width: 30%;" />
		<br>
		<br>
        <label for="feature_image_url">Feature Image URL</label>
		<br>
		<input type="text" id="feature_image_url" name="feature_image_url" value="" class="widefat" style="width: 30%;" />
		<br><span class="alaya_desc">You should upload the image via "Media" first, then paste the image URL here.</span>
        <br>
        <br>
        <label for="feature_link">Feature Link</label>
		<br>
		<input type="text" id="feature_link" name="feature_link" value="" class="widefat" style="width: 30%;" />
		<br><span class="alaya_desc">Don't forget http:// in front of the link, also, if you don't wanna add the link, just leave it empty.</span>
        <br>
		<br>
        <label for="feature_link_target">Open Link in a new window/tab?</label>
		<br>
		<select id="feature_link_target" name="feature_link_target" class="widefat" style="width: 30%;">
			<option value="_self">No</option>
            <option value="_blank">Yes</option>
		</select>
		<br>
        <br>
        <label for="feature_column">Columns</label>
		<br>
		<select id="feature_column" name="feature_column" class="widefat" style="width: 30%;">
			<option value="2">Two columns</option>
            <option value="3">Three columns</option>
            <option value="4">Four columns</option>
		</select>
		<br>
        <br>
        <label for="feature_last">Is it the last one item in a row?</label>
		<br>
		<select id="feature_last" name="feature_last" class="widefat" style="width: 30%;">
			<option value="">No</option>
            <option value="_last">Yes</option>
		</select>
		<br>
        <br>
        <label for="feature_content">Feature Content</label>
		<br>
		<textarea id="feature_content" name="feature_content" rows="4" cols="50" class="widefat" style="width: 50%;"></textarea>
		<br>
		<br>
	</div>
	<!-- end feature_item -->
    
    <!-- member -->
	<div class="member" style="display: none;">
		<label for="member_name">Member Name</label>
		<br>
		<input type="text" id="member_name" name="member_name" value="" class="widefat" style="width: 30%;" />
		<br>
		<br>
        <label for="avatar_url">Avatar URL</label>
		<br>
		<input type="text" id="avatar_url" name="avatar_url" value="" class="widefat" style="width: 30%;" />
		<br><span class="alaya_desc">You should upload the image via "Media" first, then paste the image URL here.</span>
        <br>
        <br>
        <label for="member_gender">Gender</label>
		<br>
		<select id="member_gender" name="member_gender" class="widefat" style="width: 30%;">
			<option value="gentle">Gentle</option>
            <option value="lady">Female</option>
		</select>
		<br>
        <br>
        <label for="member_job">Job</label>
		<br>
		<input type="text" id="member_job" name="member_job" value="" class="widefat" style="width: 30%;" />
        <br>
		<br>
        <label for="member_bio">Bio</label>
		<br>
		<textarea type="text" id="member_bio" name="member_bio" value="" class="widefat"></textarea>
        <br>
		<br>
        
        <label for="member_column">Columns</label>
		<br>
		<select id="member_column" name="member_column" class="widefat" style="width: 30%;">
			<option value="2">Two columns</option>
            <option value="3">Three columns</option>
            <option value="4">Four columns</option>
		</select>
		<br>
        <br>
        <label for="member_last">Is it the last one item in a row?</label>
		<br>
		<select id="member_last" name="member_last" class="widefat" style="width: 30%;">
			<option value="">No</option>
            <option value="_last">Yes</option>
		</select>
		<br>
		<br>
	</div>
	<!-- end member -->
    
    <!-- messagebox -->
	<div class="messagebox" style="display: none;">
        <label for="messagebox_type">MessageBox Type</label>
		<br>
		<select id="messagebox_type" name="messagebox_type" class="widefat" style="width: 30%;">
			<option value="notification">Notification</option>
            <option value="question">Question</option>
            <option value="warning">Warning</option>
            <option value="goodchoice">Good Choice</option>
		</select>
		<br>
        <br>
        <label for="messagebox_content">MessageBox Content</label>
		<br>
		<input type="text" name="messagebox_content" id="messagebox_content" class="widefat" />
		<br>
        <br>
	</div>
	<!-- end messagebox -->

	<!-- social_icon -->
	<div class="social_icons" style="display: none;">
       <label for="social_icons_size">Size</label>
		<br>
		<select id="social_icons_size" name="social_icons_size" class="widefat" style="width: 30%;">
			<option value="">small</option>
            <option value="big">big</option>
		</select>
        <br/><br/>
		<label for="facebook">Facebook URL</label>
		<br>
		<input type="text" id="facebook" name="facebook" class="widefat" style="width: 50%;">
		<br>
		<br>
        <label for="twitter">Twitter URL</label>
		<br>
		<input type="text" id="twitter" name="twitter" class="widefat" style="width: 50%;">
		<br>
		<br>
         <label for="dribbble">Dribbble URL</label>
		<br>
		<input type="text" id="dribbble" name="dribbble" class="widefat" style="width: 50%;">
		<br>
		<br>
         <label for="flickr">Flickr URL</label>
		<br>
		<input type="text" id="flickr" name="flickr" class="widefat" style="width: 50%;">
		<br>
		<br>
        <label for="instagram">Instagram URL</label>
		<br>
		<input type="text" id="instagram" name="instagram" class="widefat" style="width: 50%;">
		<br>
		<br>
         <label for="googleplus">Google+ URL</label>
		<br>
		<input type="text" id="googleplus" name="googleplus" class="widefat" style="width: 50%;">
		<br>
		<br>
         <label for="linkedin">LinkedIn URL</label>
		<br>
		<input type="text" id="linkedin" name="linkedin" class="widefat" style="width: 50%;">
		<br>
		<br>
         <label for="tumblr">Tumblr URL</label>
		<br>
		<input type="text" id="tumblr" name="tumblr" class="widefat" style="width: 50%;">
		<br>
		<br>
         <label for="deviantart">Deviantart URL</label>
		<br>
		<input type="text" id="deviantart" name="deviantart" class="widefat" style="width: 50%;">
		<br>
		<br>
         <label for="behance">Behance URL</label>
		<br>
		<input type="text" id="behance" name="behance" class="widefat" style="width: 50%;">
		<br>
		<br>
        <label for="pinterest">Pinterest URL</label>
		<br>
		<input type="text" id="pinterest" name="pinterest" class="widefat" style="width: 50%;">
		<br>
		<br>
        <label for="youtube">Youtube URL</label>
		<br>
		<input type="text" id="youtube" name="youtube" class="widefat" style="width: 50%;">
		<br>
		<br>
        <label for="vimeo">Vimeo URL</label>
		<br>
		<input type="text" id="vimeo" name="vimeo" class="widefat" style="width: 50%;">
		<br>
		<br>
        <label for="weibo">Weibo URL</label>
		<br>
		<input type="text" id="weibo" name="weibo" class="widefat" style="width: 50%;">
		<br>
		<br>
        <label for="wechat">WeChat</label>
		<br>
		<input type="text" id="wechat" name="wechat" class="widefat" style="width: 50%;">
		<br>
		<br>
         <label for="xing">Xing URL</label>
		<br>
		<input type="text" id="xing" name="xing" class="widefat" style="width: 50%;">
		<br>
		<br>
         <label for="yelp">Yelp URL</label>
		<br>
		<input type="text" id="yelp" name="yelp" class="widefat" style="width: 50%;">
		<br>
        <br>
        <label for="vk">VK URL</label>
		<br>
		<input type="text" id="vk" name="vk" class="widefat" style="width: 50%;">
		<br>
        <br>
         <label for="github">Github URL</label>
		<br>
		<input type="text" id="github" name="github" class="widefat" style="width: 50%;">
		<br>
        <br>
         <label for="rss">RSS</label>
		<br>
		<input type="text" id="rss" name="rss" class="widefat" style="width: 50%;">
		<br>
		<br>
	</div>
	<!-- end social_icon -->
    
    <!-- post list -->
	<div class="post_list" style="display: none;">
        <label for="post_list_number">Number of posts to show</label>
		<br>
		<input type="text" id="post_list_number" name="post_list_number" value="" class="widefat" style="width: 30%;" />
		<br><span class="alaya_desc">If you leave it empty, it will display 5 posts</span>
        <br>
        <label for="post_list_category">From categories</label>
		<br>
		<input type="text" id="post_list_category" name="post_list_category" value="" class="widefat" style="width: 30%;" />
		<br><span class="alaya_desc">Please add category slug, separate multiple category slugs with commas. If you leave it empty, it will show the posts from all categories</span>
        <br>
        <label for="post_list_thumbnail">Show the featured thumbnail?</label>
		<br>
		<select id="post_list_thumbnail" name="post_list_thumbnail" class="widefat" style="width: 30%;">
			<option value="yes">Yes</option>
            <option value="no">No</option>
		</select>
		<br>
        <br>
	</div>
	<!-- end post list -->
    
    <!-- spacing -->
	<div class="spacing" style="display: none;">
        <span class="alaya_desc">The value can be a pixel value,percent or auto, e.g. 10px, 20% or auto.</span>
        <br>
        <label for="spacing_top">Top</label>
		<br>
		<input type="text" id="spacing_top" name="spacing_top" value="0" class="widefat" style="width: 30%;" />
		<br>
        <br>
        <label for="spacing_bottom">Bottom</label>
		<br>
		<input type="text" id="spacing_bottom" name="spacing_bottom" value="0" class="widefat" style="width: 30%;" />
		<br>
        <label for="spacing_left">Left</label>
		<br>
		<input type="text" id="spacing_left" name="spacing_left" value="0" class="widefat" style="width: 30%;" />
		<br>
        <br>
        <label for="spacing_right">Right</label>
		<br>
		<input type="text" id="spacing_right" name="spacing_right" value="0" class="widefat" style="width: 30%;" />
		<br>
        <br>
	</div>
	<!-- end spacing -->
    
     <!-- skill -->
	<div class="skill" style="display: none;">
        <label for="skill_title">Skill Title</label>
		<br>
		<input type="text" id="skill_title" name="skill_title" value="" class="widefat" style="width: 30%;" />
		<br>
        <br>
        <label for="skill_percent">Percent Value</label>
		<br>
		<input type="text" id="skill_percent" name="skill_percent" value="50%" class="widefat" style="width: 30%;" />
		<br>
        <br>
        <label for="skill_hide_percent">Hide Percent</label>
		<br>
	    <select id="skill_hide_percent" name="skill_hide_percent" class="widefat" style="width: 30%;">
			<option value="0">No</option>
            <option value="1">Yes</option>
		</select>
		<br>
        <br>
        <label for="skill_text">Instead Percent Text</label>
		<br>
		<input type="text" id="skill_text" name="skill_text" value="" class="widefat" style="width: 30%;" />
        <br><span class="alaya_desc">Use this text to instead of the percent number, but if you hide percent above, the text will be also hidden.</span>
        <br>
        <br>
        <label for="skill_color">Background Color</label>
		<br>
		<input type="text" id="skill_color" name="skill_color" value="#48A876" class="widefat" style="width: 30%;" />
		
	</div>
	<!-- end skill -->
	
	<!-- end shortcodes fields ====================================== -->
	
	
	<button type="button" id="insert-button" class="button button-primary button-large btn-sh-insert">Insert Shortcode</button>
</form>


<script type="text/javascript">
jQuery(document).ready( function($)
	{
		var sh_selected = 'column';
		
		$( '.sh-list' ).change( function()
		{
			$( '.sh-wrap div' ).hide();
			
			sh_selected = $( '.sh-list' ).val();
			
			$( '.' + sh_selected ).show();
		});
		
		
		// insert button
		$( '.btn-sh-insert' ).click( function()
		{
			// sh_out
			var sh_out = "";
			
			//Column
			if ( sh_selected == 'column' )
			{
				var column_width = $( '#column_width' ).val();
				var column_last = $( '#column_last' ).val();
				var column_content = $( '#column_content' ).val();
				var last;
				
				if(column_last=='1'){last='_last';}else{last='';}
				
				if(column_width=='1/2'){
				  sh_out = '[alaya_one_half'+last+']' + column_content + '[/alaya_one_half'+last+']';
				}else if(column_width=='1/3'){
					  sh_out = '[alaya_one_third'+last+']' + column_content + '[/alaya_one_third'+last+']';
				}else if(column_width=='1/4'){
					  sh_out = '[alaya_one_fourth'+last+']' + column_content + '[/alaya_one_fourth'+last+']';
				}else if(column_width=='2/3'){
					  sh_out = '[alaya_two_third'+last+']' + column_content + '[/alaya_two_third'+last+']';
				}if(column_width=='3/4'){
					  sh_out = '[alaya_three_fourth'+last+']' + column_content + '[/alaya_three_fourth'+last+']';
				}
			}
			//Tabs
			else if ( sh_selected == 'tabs' )
			{
				sh_out = '[alaya_tabs][/alaya_tabs]';
			}
			//Tab item
			else if ( sh_selected == 'tab_item' )
			{
				var tab_content = $( '#tab_content' ).val();
				var tab_title = $( '#tab_title' ).val();
				
				sh_out = '[alaya_tab title="' + tab_title + '"]'+tab_content+'[/alaya_tab]';
			}

			// Toggle
			else if ( sh_selected == 'toggle' )
			{
				var toggle_active = $( '#toggle_active' ).val();
				var toggle_title = $( '#toggle_title' ).val();
				var toggle_content = $( '#toggle_content' ).val();
				
				sh_out = '[alaya_toggle status="' + toggle_active + '" title="' + toggle_title + '"]' + toggle_content + '[/alaya_toggle]';
			}
			
			//Dropcap
			else if ( sh_selected == 'dropcap' )
			{
				sh_out = '[alaya_dropcap][/alaya_dropcap]';
			}
			
			//Separator
			else if ( sh_selected == 'separator' )
			{
				var separator_color = $( '#separator_color' ).val();
				sh_out = '[alaya_line color="'+separator_color+'"]';
			}
			
			//clear
			else if ( sh_selected == 'clear' )
			{
				sh_out = '[alaya_clear]';
			}
			
			//List
			else if ( sh_selected == 'list' )
			{
				var list_content = $( '#list_content' ).val();
				var list_styles=$('#list_styles').val();
				
				sh_out = '[alaya_list style="'+list_styles+'"]' + list_content + '[/alaya_list]';
			}
			
			//Heading
			else if ( sh_selected == 'heading' )
			{
				var heading_title = $( '#heading_title' ).val();
				var heading_size = $( '#heading_size' ).val();
				var heading_top = $( '#heading_top' ).val();
				var heading_bottom = $( '#heading_bottom' ).val();
				
				sh_out = '[alaya_heading size="'+heading_size+'" heading="'+heading_title+'" top="'+heading_top+'" bottom="'+heading_bottom+'"]';
			}
			
			
			//Button
			else if ( sh_selected == 'btn' )
			{
				var button_text = $( '#button_text' ).val();
				var button_link = $( '#button_link' ).val();
				var button_link_target = $( '#button_link_target' ).val();
				var button_link_anchor = $( '#button_link_anchor' ).val();
				var button_aligned = $( '#button_aligned' ).val();
				var button_size = $( '#button_size' ).val();
				var button_color = $( '#button_color' ).val();
				var button_bgcolor = $( '#button_bgcolor' ).val();
				var button_textcolor = $( '#button_textcolor' ).val();
				var button_bordercolor = $( '#button_bordercolor' ).val();
				
				sh_out = '[alaya_button text="'+button_text+'" href="'+button_link+'" target="'+button_link_target+'" anchor="'+button_link_anchor+'" size="'+button_size+'" color="'+button_color+'" bg_color="'+button_bgcolor+'" text_color="'+button_textcolor+'" border_color="'+button_bordercolor+'"]';
			}
			
			//Feature item
			else if ( sh_selected == 'feature_item' )
			{
				var feature_title = $( '#feature_title' ).val();
				var feature_image_url = $( '#feature_image_url' ).val();
				var feature_link = $( '#feature_link' ).val();
				var feature_link_target = $( '#feature_link_target' ).val();
				var feature_animation = $( '#feature_animation' ).val();
				var feature_content = $( '#feature_content' ).val();
				var feature_column = $( '#feature_column' ).val();
				var feature_last = $( '#feature_last' ).val();
				var prefix;
				var suffix;
				
				if(feature_column==2){
				    prefix='[alaya_one_half'+feature_last+']';
					suffix='[/alaya_one_half'+feature_last+']';
				}else if(feature_column==3){
				    prefix='[alaya_one_third'+feature_last+']';
					suffix='[/alaya_one_third'+feature_last+']';
				}else if(feature_column==4){
				    prefix='[alaya_one_fourth'+feature_last+']';
					suffix='[/alaya_one_fourth'+feature_last+']';
				}
				
				sh_out = prefix+'[alaya_feature_item title="'+feature_title+'" image_url="'+feature_image_url+'" href="'+feature_link+'" target="'+feature_link_target+'"]' + feature_content + '[/alaya_feature_item]'+suffix;
			}
			
			//Member
			else if ( sh_selected == 'member' )
			{
				var member_name = $( '#member_name' ).val();
				var avatar_url = $( '#avatar_url' ).val();
				var member_job = $( '#member_job' ).val();
				var member_gender = $( '#member_gender' ).val();
				var member_bio = $( '#member_bio' ).val();
				var member_column = $( '#member_column' ).val();
				var member_last = $( '#member_last' ).val();
				var prefix;
				var suffix;
				
				if(member_column==2){
				    prefix='[alaya_one_half'+member_last+']';
					suffix='[/alaya_one_half'+member_last+']';
				}else if(member_column==3){
				    prefix='[alaya_one_third'+member_last+']';
					suffix='[/alaya_one_third'+member_last+']';
				}else if(member_column==4){
				    prefix='[alaya_one_fourth'+member_last+']';
					suffix='[/alaya_one_fourth'+member_last+']';
				}
				
				sh_out = prefix+'[alaya_member name="'+member_name+'" avatar="'+avatar_url+'" job="'+member_job+'" gender="'+member_gender+'"]' + member_bio + '[/alaya_member]'+suffix;
			}
			
			//Social icons
			else if ( sh_selected == 'social_icons' )
			{
				var facebook = $( '#facebook' ).val();
				var twitter = $( '#twitter' ).val();
				var dribbble = $( '#dribbble' ).val();
				var flickr = $( '#flickr' ).val();
				var googleplus = $( '#googleplus' ).val();
				var linkedin = $( '#linkedin' ).val();
				var tumblr = $( '#tumblr' ).val();
				var deviantart = $( '#deviantart' ).val();
				var behance = $( '#behance' ).val();
				var pinterest = $( '#pinterest' ).val();
				var youtube = $( '#youtube' ).val();
				var vimeo = $( '#vimeo' ).val();
				var xing = $( '#xing' ).val();
				var yelp = $( '#yelp' ).val();
				var vk = $( '#vk' ).val();
				var github = $( '#github' ).val();
				var instagram = $( '#instagram' ).val();
				var weibo = $( '#weibo' ).val();
				var wechat = $( '#wechat' ).val();
				var rss = $( '#rss' ).val();
				var social_icons_size = $( '#social_icons_size' ).val();
				
				sh_out = '[alaya_social_icon size="'+social_icons_size+'" facebook="'+facebook+'" twitter="'+twitter+'" dribbble="'+dribbble+'" flickr="'+flickr+'" instagram="'+instagram+'" googleplus="'+googleplus+'" linkedin="'+linkedin+'" tumblr="'+tumblr+'" deviantart="'+deviantart+'" behance="'+behance+'" pinterest="'+pinterest+'" youtube="'+youtube+'" vimeo="'+vimeo+'" xing="'+xing+'" yelp="'+yelp+'" wechat="'+wechat+'" weibo="'+weibo+'" vk="'+vk+'" github="'+github+'" rss="'+rss+'"]';
			}
			
			//post list
			else if ( sh_selected == 'post_list' )
			{
				var post_list_thumbnail = $( '#post_list_thumbnail' ).val();
				var post_list_number = $( '#post_list_number' ).val();
				var post_list_category = $( '#post_list_category' ).val();
				
				sh_out = '[alaya_post_list thumbnail="'+post_list_thumbnail+'" number='+post_list_number+' category="'+post_list_category+'"]';
			}
			
			//Spacing
			else if ( sh_selected == 'spacing' )
			{
				var spacing_left = $( '#spacing_left' ).val();
				var spacing_right = $( '#spacing_right' ).val();
				var spacing_top = $( '#spacing_top' ).val();
				var spacing_bottom = $( '#spacing_bottom' ).val();
				
				sh_out = '[alaya_spacing left="'+spacing_left+'" right='+spacing_right+' top="'+spacing_top+'" bottom="'+spacing_bottom+'"]';
			}
			
			//Messagebox
			else if ( sh_selected == 'messagebox' )
			{
				var messagebox_type = $( '#messagebox_type' ).val();
				var messagebox_content = $( '#messagebox_content' ).val();
				
				sh_out = '[alaya_messagebox type="'+messagebox_type+'"]'+messagebox_content+'[/alaya_messagebox]';
			}
			
			//Skills
			else if ( sh_selected == 'skills' )
			{
				sh_out = '[alaya_skills][/alaya_skills]';
			}
			
			//Skill
			else if ( sh_selected == 'skill' )
			{
				var skill_title = $( '#skill_title' ).val();
				var skill_percent = $( '#skill_percent' ).val();
				var skill_text = $( '#skill_text' ).val();
				var skill_hide_percent = $( '#skill_hide_percent' ).val();
				var skill_color = $( '#skill_color' ).val();
				
				sh_out = '[alaya_skill title="'+skill_title+'" percent="'+skill_percent+'" text="'+skill_text+'" hide_percent='+skill_hide_percent+' color="'+skill_color+'"]';
			}
			
			// end sh_out
			
			
			// add to editor
			if ( window.tinyMCE )
			{
				var tmce_ver=window.tinyMCE.majorVersion;
				if (tmce_ver<"4") {
				    window.tinyMCE.execInstanceCommand( 'content', 'mceInsertContent', false, sh_out );
				}else{
					parent.tinyMCE.execCommand('mceInsertContent', false,sh_out);
				}
				tb_remove();
			}
			// end add to editor
		});
		// end insert button
	});
</script>