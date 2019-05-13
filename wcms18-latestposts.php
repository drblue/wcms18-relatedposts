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


function wlp_shortcode() {
	return "WILL SHOW THE LATEST FAKE NEWS";
}

function wlp_init() {
	add_shortcode('latest-posts', 'wlp_shortcode');
}
add_action('init', 'wlp_init');
