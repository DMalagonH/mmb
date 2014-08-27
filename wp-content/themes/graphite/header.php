<?php
/**
*
* Graphite, a Wordpress theme from MediaLoot.com
* 
*
**/

?>
<?php $g_settings = get_option('g_settings'); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>

		<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen">
		<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS 0.92 Feed" href="<?php bloginfo('rss_url'); ?>">
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>">
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0 Feed" href="<?php bloginfo('rss2_url'); ?>">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Nobile" rel="stylesheet" type="text/css">		

		<?php wp_enqueue_script('jquery'); ?>
		<?php wp_head(); ?>
		
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/javascript/coin-slider.min.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/javascript/coin-slider-styles.css" media="screen">
		<script type="text/javascript">var $jq = jQuery.noConflict(); $jq(document).ready(function() { $jq('#slider').coinslider({ width: 930, height: 348, spw: 7, sph: 5, delay: 3000, sDelay: 30, opacity: 0.7, titleSpeed: 1500, effect: '', navigation: true, links : true, hoverPause: false }); });</script>
		
		<script src="<?php bloginfo('template_directory'); ?>/javascript/h5.js"></script>
		
<?php echo $g_settings['headercode']; ?>

	</head>
	<body <?php body_class(); ?>>

		<header>
			<div class="wrapper">
				<h1><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h1>
				<nav>
					<ul>
						<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
					</ul>
				<div class="header-divider"></div>
						<?php get_search_form(); ?>
				</nav>
			</div><!-- end .wrapper -->
		</header>
		