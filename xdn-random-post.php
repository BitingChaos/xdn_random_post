<?php
/*
Plugin Name: XdN Random Post
Plugin URI: http://xenomorph.net/
Description: This will display the contents of a random post.
Author: Nicholas Caito
Author URI: http://xenomorph.net/
Version: 0.1.0
*/

// ----------

/*

Example usage:

[random_post]

[random_post category="News"]

*/

// ----------

// enable shortcodes in text widgets
add_filter('widget_text', 'do_shortcode');


// shortcode function
function random_post_shortcode( $atts ) {
	
	$args = array(
	'numberposts'	=> 1,
	'category_name'	=> $atts['category'],	
	'orderby'	=> 'rand',
	'post_type'	=> 'post',
	'post_status'	=> 'publish');
	$post = get_posts($args);
	foreach ($post as $p) {
		$content =  apply_filters('the_content', $p->post_content);
	}
	return $content;
}


// add shortcode
add_shortcode('random_post', 'random_post_shortcode');
