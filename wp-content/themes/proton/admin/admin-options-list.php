<?php
$theme_admin_boxes = array(
	array(
		"name" => "theme_admin_color_style",
		"title" => "Your Color Scheme:",
		"type" => "radio",
		"desc" => "",
		"value" => array(
			array (sub_value => "black", sub_desc => "Black"),
			array (sub_value => "blue", sub_desc => "Blue"),
			array (sub_value => "brown", sub_desc => "Brown"),
			array (sub_value => "green", sub_desc => "Green"),
			array (sub_value => "pink", sub_desc => "Pink"),
			array (sub_value => "red", sub_desc => "Red"),
			array (sub_value => "orange", sub_desc => "Orange"),
		)
	),
	array(
		"name" => "theme_admin_slideshow_style",
		"title" => "Slideshow Style:",
		"type" => "radio",
		"desc" => "Choose Theme slideshow style.",
		"value" => array(
			array (sub_value => "cycle", sub_desc => "Jquery Cycle Slideshow"),
			array (sub_value => "coin", sub_desc => "Coin Slider"),
			array (sub_value => "nivo", sub_desc => "Nivo Slider"),
		)
	),	
	array(
		"name" => "theme_admin_logo",
		"title" => "Your Logo URL:",
		"type" => "text",
		"desc" => "<em>E.g: http://www.yoursite.com/logo.png</em>"
	),	
	array(
		"name" => "theme_admin_twitter",
		"title" => "Your Twitter Username:",
		"type" => "text",
		"desc" => "Provide your Twitter username to get latest news."
	),
	array(
		"name" => "theme_admin_copyright",
		"title" => "Your Footer Copyright Text:",
		"type" => "text",
		"desc" => "<em>E.g: Copyright &copy; 2010 the Proton. All rights reserved</em>"
	),
	array(
		"name" => "theme_admin_calltoaction",
		"title" => "Your Call To Action Text:",
		"type" => "textarea",
		"desc" => "<em>E.g: A slick and clean design coming up with tons of features will make your Wordpress site looks delicious.</em>"
	),
	array(
		"name" => "theme_admin_calltoaction_url",
		"title" => "Your Call To Action URL:",
		"type" => "text",
		"desc" => "<em>E.g: http://www.yoursite.com/action.html</em>"
	),		
	array(
		"name" => "theme_admin_headline",
		"title" => "Your Default Headline Text:",
		"type" => "textarea",
		"desc" => "<em>This text will be showed on top of the article by default.</em>"
	),
	array(
		"name" => "theme_admin_portfolio_headline",
		"title" => "Your Portfolio Headline Text:",
		"type" => "textarea",
		"desc" => "<em>This text will be showed on top of the Portfolio listing.</em>"
	),	
	array(
		"name" => "theme_admin_cufon",
		"id" => "theme_admin_cufon",
		"title" => "Disable Cufon?",
		"type" => "checkbox",
		"desc" => "Disable <a href=\"http://cufon.shoqolate.com/\">Cufon</a> on this website.",
		"value" => "0",
	),
	array(
		"name" => "theme_admin_slide_num",
		"title" => "The number of slide in a slideshow section:",
		"type" => "text",
		"desc" => ""
	),
	array(
		"name" => "theme_admin_latest_num",
		"title" => "The number of post in a latest news section:",
		"type" => "text",
		"desc" => ""
	),	
	);
?>