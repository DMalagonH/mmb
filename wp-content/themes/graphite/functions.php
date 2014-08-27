<?php

add_theme_support( 'post-thumbnails' );

add_image_size( 'portfolio-image', 595, 255, true );

add_action( 'init', 'register_my_menus' );

function register_my_menus() {
register_nav_menus(
array(
'main-menu' => __( 'Main Menu' ),
'menu-2' => __( 'Menu 2' )
)
);
}

//Register More Settings
function g_options() {
	add_menu_page('Graphite Theme', 'Graphite Theme', 'edit_themes', 'theme_settings.php', 'g_theme_settings');
}
add_action('admin_menu', 'g_options');

if (function_exists('register_sidebar')) {
register_sidebar(array(

'before_widget' => '<li id="%1$s" class="widget %2$s">',
'after_widget' => '</li>',
'before_title' => '<h4 class="widgettitle">',
'after_title' => '</h4>',
'name' => 'Sidebar'

));

register_sidebar(array(

'before_widget' => '<li id="%1$s" class="footer-widget %2$s">',
'after_widget' => '</li>',
'before_title' => '<h4 class="widgettitle">',
'after_title' => '</h4>',
'name' => 'Footer Widgets'

));

}

function post_type_portfolio() {
	register_post_type( 'portfolio',
                array('label' => __('Portfolio'),
                             'public' => true,
                             'show_ui' => true,
                             'supports' => array(
                             			'title',
                                        'thumbnail',
                                        'editor',
                                        'revisions')
                                )
                      );
	register_taxonomy_for_object_type('post_tag', 'portfolio');
}
add_action('init', 'post_type_portfolio');

// Register Shortcodes
require_once(TEMPLATEPATH . '/theme_settings.php');


?>