<?php
/**
 * Plugin Name: WCMS18 Latest Posts
 * Plugin URI:  https://thehiveresistance.com/wcms18-latestposts
 * Description: This plugin adds a shortcode to display the latest posts.
 * Version:     0.1
 * Author:      Johan Nordström
 * Author URI:  https://thehiveresistance.com
 * License:     WTFPL
 * License URI: http://www.wtfpl.net/
 * Text Domain: wcms18-latestposts
 * Domain Path: /languages
 */


function wlp_shortcode($user_atts = [], $content = null, $tag = '') {
	$default_atts = [
		'posts' => 3,
		'title' => __('Latest Posts', 'wcms18-latestposts'),
	];

	$atts = shortcode_atts($default_atts, $user_atts, $tag);

	$posts = new WP_Query([
		'posts_per_page' => $atts['posts'],
	]);

	$output = "<h2>" . esc_html($atts['title']) . "</h2>";
	if ($posts->have_posts()) {
		$output .= "<ul>";
		while ($posts->have_posts()) {
			$posts->the_post();
			$output .= "<li>";
			$output .= "<a href='" . get_the_permalink() . "'>";
			$output .= get_the_title();
			$output .= "</a>";
			$output .= "</li>";
		}
		wp_reset_postdata();
		$output .= "</ul>";
	} else {
		$output .= "No latest posts available.";
	}

	return $output;
}

function wlp_init() {
	add_shortcode('latest-posts', 'wlp_shortcode');
}
add_action('init', 'wlp_init');
