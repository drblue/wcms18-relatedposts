<?php

function wrp_the_content($content) {
	if (is_single()) {
		if (!has_shortcode($content, 'related-posts')) {
			$related_posts = wrp_get_related_posts();
			$content = $content . $related_posts;
			// $content .= $related_posts; // more efficient
			// $content .= wrp_get_related_posts(); // such efficient
		}
	}

	return $content;
}
add_filter('the_content', 'wrp_the_content');
