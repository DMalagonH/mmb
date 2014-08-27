<?php
// Title filter introduced in Wordpress 3.0
function filter_wp_title( $title, $separator ) {
	// Don't affect wp_title() calls in feeds.
	if ( is_feed() )
		return $title;

	// The $paged global variable contains the page number of a listing of posts.
	// The $page global variable contains the page number of a single post that is paged.
	// We'll display whichever one applies, if we're not looking at the first page.
	global $paged, $page;

	if ( is_search() ) {
		// If we're a search, let's start over:
		$title = sprintf( __( 'Search results for %s', 'theproton' ), '"' . get_search_query() . '"' );
		// Add a page number if we're on page 2 or more:
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'theproton' ), $paged );
		// Add the site name to the end:
		$title .= " $separator " . get_bloginfo( 'name', 'display' );
		// We're done. Let's send the new title back to wp_title():
		return $title;
	}

	// Otherwise, let's start by adding the site name to the end:
	$title .= get_bloginfo( 'name', 'display' );

	// If we have a site description and we're on the home/front page, add the description:
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'theproton' ), max( $paged, $page ) );

	// Return the new title to wp_title():
	return $title;
}
add_filter( 'wp_title', 'filter_wp_title', 10, 2 );

// Add Post thumnail in Wordpress
if (function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(600, 200, true);
}


// Extend wp_nav_menu
class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="' . esc_attr( $class_names ) . '"';

           $output .= $indent . '<li' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}

// Register menu for wp_nav_menu()
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'primary' => 'Primary Navigation'
		)
	);
}

// Modify the default post excerpt
function my_excerpt_length($length) {return 20; }
function trim_excerpt($text) {
	global $post;
	return str_replace('[...]','...',$text);
}
add_filter('excerpt_length', 'my_excerpt_length');
add_filter('get_the_excerpt', 'trim_excerpt');

// Get the first image of the post
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "/images/learnmore.png";
  }
  return $first_img;
}

function catch_that_image2() { // used for Other Latest Content
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){
	return;
  }
  else {
	return '<div class="other_news_img"><img src="'. get_template_directory_uri() .'/thumb.php?src='. $first_img .'&amp;w=86&amp;h=46" /></div>';
  }

}

// Wordpress Breadcrumbs
function breadcrumbs() {
 
  $delimiter = '<span class="delimiter">&raquo;</span>';
  $name = 'Home'; //text for the 'Home' link
  $currentBefore = '<span class="current">';
  $currentAfter = '</span>';
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<div id="crumbs">';
 
    global $post;
    $home = get_bloginfo('url');
    echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
      echo $currentBefore . 'Archive by category &#39;';
      single_cat_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('d') . $currentAfter;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
      echo $currentBefore . get_the_time('F') . $currentAfter;
 
    } elseif ( is_year() ) {
      echo $currentBefore . get_the_time('Y') . $currentAfter;
 
    } elseif ( is_single() ) {
      $cat = get_the_category(); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
      echo $currentBefore;
      the_title();
      echo $currentAfter;
 
    } elseif ( is_search() ) {
      echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;
 
    } elseif ( is_tag() ) {
      echo $currentBefore . 'Posts tagged &#39;';
      single_tag_title();
      echo '&#39;' . $currentAfter;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;
 
    } elseif ( is_404() ) {
      echo $currentBefore . 'Error 404' . $currentAfter;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</div>';
 
  }
}

// Styling the comment list
if ( ! function_exists( 'theproton_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own theproton_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function theproton_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 50 ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'theproton' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-body">
			<div class="comment_author"><?php printf( __( '%s:', 'theproton' ), sprintf( '%s', get_comment_author_link() ) ); ?></div>
			<?php comment_text(); ?>
		</div>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'theproton' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'theproton' ), ' ' );
			?>
			&nbsp;|&nbsp;<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .comment-meta .commentmetadata -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'theproton' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'theproton'), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

// Register sidebar
register_sidebar( array(
	'name' => 'Primary Sidebar Widget Area',
	'id' => 'primary-sidebar-widget-area',
	'before_widget' => '<div class="sidebar-widget">',
	'after_widget' => '</div>',
	'before_title' => '<h5 class="sidebar-widget-title">',
	'after_title' => '</h5>',
) );
register_sidebar( array(
	'name' => 'Secondary Sidebar Widget Area',
	'id' => 'secondary-sidebar-widget-area',
	'before_widget' => '<div class="sidebar-widget">',
	'after_widget' => '</div>',
	'before_title' => '<h5 class="sidebar-widget-title">',
	'after_title' => '</h5>',
) );
register_sidebar( array(
	'name' => 'First Footer Widget Area',
	'id' => 'first-footer-widget-area',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5 class="widget-title">',
	'after_title' => '</h5>',
) );
register_sidebar( array(
	'name' => 'Second Footer Widget Area',
	'id' => 'second-footer-widget-area',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5 class="widget-title">',
	'after_title' => '</h5>',
) );
register_sidebar( array(
	'name' => 'Third Footer Widget Area',
	'id' => 'third-footer-widget-area',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5 class="widget-title">',
	'after_title' => '</h5>',
) );
register_sidebar( array(
	'name' => 'Fourth Footer Widget Area',
	'id' => 'fourth-footer-widget-area',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5 class="widget-title">',
	'after_title' => '</h5>',
) );
register_sidebar( array(
	'name' => 'Fifth Footer Widget Area',
	'id' => 'fifth-footer-widget-area',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5 class="widget-title">',
	'after_title' => '</h5>',
) );

// Shortcodes
// Check list Shortcode
function checklist($atts, $content = null) {
	extract(shortcode_atts(array(
        "color" => '',
	), $atts));
	return '<div class="checklist checklist'. $color .'">'.do_shortcode($content).'</div>';
}
add_shortcode('check_list', 'checklist');
// Arrow list Shortcode
function arrowlist($atts, $content = null) {
	extract(shortcode_atts(array(
        "color" => '',
	), $atts));
	return '<div class="arrowlist arrowlist'. $color .'">'.do_shortcode($content).'</div>';
}
add_shortcode('arrow_list', 'arrowlist');
// Star list Shortcode
function starlist($atts, $content = null) {
	extract(shortcode_atts(array(
        "color" => '',
	), $atts));
	return '<div class="starlist starlist'. $color .'">'.do_shortcode($content).'</div>';
}
add_shortcode('star_list', 'starlist');
// Button Shortcode
function button($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
        "color" => '',
        "rel" => '',
	), $atts));
	return '<a href="'.$url.'" class="buttonshortcode button_'.$color.'" rel="'.$rel.'"><span>'.do_shortcode($content).'</span></a>';
}
add_shortcode('button', 'button');
// Dropcap Shortcode
function dropcap1($atts, $content = null) {
	return '<span class="dropcap1">'.$content.'</span>';
}
add_shortcode('dropcap1', 'dropcap1');
function dropcap2($atts, $content = null) {
	return '<span class="dropcap2">'.$content.'</span>';
}
add_shortcode('dropcap2', 'dropcap2');
function dropcap3($atts, $content = null) {
	return '<span class="dropcap3">'.$content.'</span>';
}
add_shortcode('dropcap3', 'dropcap3');
// Highlight Shortcode
function highlight($atts, $content = null) {
	return '<span class="highlight">'.do_shortcode($content).'</span>';
}
add_shortcode('highlight', 'highlight');
// HR Shortcode
function hr($atts, $content = null) {
	return '<span class="hr_shortcode"><a class="scrollTop" href="#logo">Top</a><div class="clear"></div></span>';
}
add_shortcode('hr', 'hr');
function hr_none($atts, $content = null) {
	return '<div class="clear"></div>';
}
add_shortcode('hr_none', 'hr_none');
// Box Style Shortcode
function box_info($atts, $content = null) {
	return '<div class="box_info">'.do_shortcode($content).'</div>';
}
add_shortcode('box_info', 'box_info');
function box_warning($atts, $content = null) {
	return '<div class="box_warning">'.do_shortcode($content).'</div>';
}
add_shortcode('box_warning', 'box_warning');
function box_block($atts, $content = null) {
	return '<div class="box_block">'.do_shortcode($content).'</div>';
}
add_shortcode('box_block', 'box_block');
function box_document($atts, $content = null) {
	return '<div class="box_document">'.do_shortcode($content).'</div>';
}
add_shortcode('box_document', 'box_document');
// Box Color Shortcode
function box_blue($atts, $content = null) {
	return '<div class="box_blue">'.do_shortcode($content).'</div>';
}
add_shortcode('box_blue', 'box_blue');
function box_yellow($atts, $content = null) {
	return '<div class="box_yellow">'.do_shortcode($content).'</div>';
}
add_shortcode('box_yellow', 'box_yellow');
function box_red($atts, $content = null) {
	return '<div class="box_red">'.do_shortcode($content).'</div>';
}
add_shortcode('box_red', 'box_red');
function box_gray($atts, $content = null) {
	return '<div class="box_gray">'.do_shortcode($content).'</div>';
}
add_shortcode('box_gray', 'box_gray');
// Pullquote shortcode
function pullquote_right($atts, $content = null) {
	return '<blockquote class="pullquote_right">'.do_shortcode($content).'</blockquote>';
}
add_shortcode('pullquote_right', 'pullquote_right');
function pullquote_left($atts, $content = null) {
	return '<blockquote class="pullquote_left">'.do_shortcode($content).'</blockquote>';
}
add_shortcode('pullquote_left', 'pullquote_left');
// Colums
function layout_1_2($atts, $content = null) {
	return '<div class="layout_1_2">'.do_shortcode($content).'</div>';
}
add_shortcode('layout_1_2', 'layout_1_2');
function layout_1_3($atts, $content = null) {
	return '<div class="layout_1_3">'.do_shortcode($content).'</div>';
}
add_shortcode('layout_1_3', 'layout_1_3');
function layout_2_3($atts, $content = null) {
	return '<div class="layout_2_3">'.do_shortcode($content).'</div>';
}
add_shortcode('layout_2_3', 'layout_2_3');
function layout_1_4($atts, $content = null) {
	return '<div class="layout_1_4">'.do_shortcode($content).'</div>';
}
add_shortcode('layout_1_4', 'layout_1_4');
function layout_2_4($atts, $content = null) {
	return '<div class="layout_2_4">'.do_shortcode($content).'</div>';
}
add_shortcode('layout_2_4', 'layout_2_4');
function layout_3_4($atts, $content = null) {
	return '<div class="layout_2_4">'.do_shortcode($content).'</div>';
}
add_shortcode('layout_3_4', 'layout_3_4');
// Slider
function slider($atts, $content = null) {
	return '<div id="post_slider">'.do_shortcode($content).'</div>';
}
add_shortcode('slider', 'slider');
function slider_full($atts, $content = null) {
	return '<div id="post_slider_full">'.do_shortcode($content).'</div>';
}
add_shortcode('slider_full', 'slider_full');
// Toggle
function toggle($atts, $content = null) {
	extract(shortcode_atts(array(
		"title" => '',
	), $atts));
	return '<div><a class="toggle">'.$title.'</a><div class="toggle_content">'.do_shortcode($content).'</div></div>';
}
add_shortcode('toggle', 'toggle');
// Multimedia
function media($atts, $content = null) {
	extract(shortcode_atts(array(
		"url" => '',
	), $atts));
	return '<a href="'.$url.'" rel="prettyPhoto">'.do_shortcode($content).'</a>';
}
add_shortcode('media', 'media');

// Custom Post type
function post_type_portfolio() {
	register_post_type('portfolio',
        array('labels' => array('name' => __( 'Portfolio' ),'singular_name' => __( 'Portfolio' )),
            'public' => true,
			'publicly_queryable' => true,
            'show_ui' => true,
			'exclude_from_search' => true,
            'supports' => array(
			'title',
			'editor',
			'author',
            'thumbnail',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions')
        ) 
    );
	flush_rewrite_rules();
}
add_action('init', 'post_type_portfolio');
?>