<?php
/* Load Stylesheets and JavaScripts for Theme admin */
function admin_enqueue($hook) {
	global $theme_name, $handle;
	if ($_GET['page'] == $handle || $hook == 'post.php' || $hook == 'post-new.php') { // Only load Css and Js in the specific sections
		wp_enqueue_style($theme_name, THEME_ADMIN_CSS .'/admin.css', false, '1.0.0', 'screen' );
	}
}

add_action('admin_enqueue_scripts', 'admin_enqueue');
?>