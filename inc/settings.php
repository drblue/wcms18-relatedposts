<?php

function wrp_settings_init() {
	//register_setting('reading', 'WCMS18 Related Posts');
}
add_action('admin_init', 'wrp_settings_init');

// Add our Settings page to the WP Admin Menu
function wrp_add_settings_page_to_menu() {
	add_submenu_page(
		'options-general.php', // parent page
		'WCMS18 Related Posts Settings', // page title
		'Related Posts', // menu title
		'manage_options', // minimum capability
		'relatedposts', // slug for our page
		'wrp_settings_page' // callback to render page
	);
}
add_action('admin_menu', 'wrp_add_settings_page_to_menu');

// Render Settings page
function wrp_settings_page() {
	?>
		<div class="wrap">
			<h1><?php _e('WCMS18 Related Posts Settings', 'wcms18-relatedposts'); ?></h1>

			<form method="post" action="options.php">
				<?php
					settings_fields("section");
					do_settings_sections("theme-options");
					submit_button();
				?>
			</form>
		</div>
	<?php
}
