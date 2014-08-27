<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<?php require(THEME_FUNCTION . '/theme.php'); // Get options to use in theme ?>	
<link rel="stylesheet" href="<?php echo bloginfo('template_url').'/style/'.$theme_admin_color_style.'.css'; ?>" type="text/css" media="screen"/>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	if ( is_singular() && get_option( 'thread_comments' ) )
	wp_enqueue_script( 'comment-reply' );
	wp_enqueue_script('jquery');
	wp_head();	
?>
</head>
<?php flush(); ?>
<body <?php body_class(); ?>>
<div class="container">
		<header id="logo">
			<h1>
				<a href="<?php echo home_url( '/' ); ?>">
					<img src="<?php echo $theme_admin_logo; ?>" />
					<span><?php echo get_bloginfo('description'); ?></span>
				</a>			
			</h1>
		</header>
	
		<!-- Top Menu start -->
		
			<?php wp_nav_menu( array('container' => 'nav', 'container_class' => 'jqueryslidemenu', 'container_id' => 'menu', 'walker' => new description_walker() )); ?>
		
		<!-- Top Menu end -->
		
