<?php
// Define Admin Directory Constants
define('THEME_ADMIN', TEMPLATEPATH. '/admin');
define('THEME_ADMIN_CSS', get_template_directory_uri() . '/admin/css');
define('THEME_ADMIN_JS', get_template_directory_uri() . '/admin/js');
// Define Function Directory Constants
define('THEME_FUNCTION', TEMPLATEPATH. '/function');
define('THEME_JS', get_template_directory_uri() . '/javascript');

// Load Extra Options
require_once(THEME_FUNCTION . '/extra.php');
// Load Admin Options
require_once(THEME_ADMIN . '/admin-options.php');
// Load Theme Options
require_once(THEME_FUNCTION . '/theme.php'); // Get options to use in theme

if ($_GET['activated']){wp_redirect(admin_url("admin.php?page=$handle"));} // Redirect to Theme Options Page when activated
?>