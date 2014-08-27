<?php$theme_meta_boxes = array(	// Cycle Slideshow	array(		"type" => "theme_admin_open_required",		"id" => "cycle", // must math the variable value of the variable name below in theme admin options		"variable" => "theme_admin_slideshow_style", // must math the variable name in theme admin options	),		array(		"name" => "theme_post_slideshow",		"id" => "theme_post_slideshow",		"title" => "Include this post into the featured slideshow?",		"type" => "checkbox",		"desc" => "Yes",		"value" => "1",	),	array(		"id" => "theme_post_slideshow_required",		"pre_id" => "theme_post_slideshow",		"type" => "open_required",	),	array(		"name" => "theme_post_slide_width_type",		"title" => "Type of this slide: (*)",		"type" => "radio",		"desc" => "",		"value" => array(			array (sub_value => "full_left", sub_desc => "Full width image + text on the left"),			array (sub_value => "full_right", sub_desc => "Full width image + text on the right"),			array (sub_value => "full_bottom", sub_desc => "Full width image + text at the bottom"),			array (sub_value => "half_left", sub_desc => "Half width image + text on the left"),			array (sub_value => "half_right", sub_desc => "Half width image + text on the right"),		)	),	array(		"name" => "theme_post_slide_title",		"title" => "Slide title:",		"type" => "text",		"desc" => "",	),		array(		"name" => "theme_post_slide_desc",		"title" => "Slide description:",		"type" => "textarea",		"desc" => "",	),	array(		"name" => "theme_post_slide_image",		"title" => "Slide image URL: (*)",		"type" => "text",		"desc" => "<em>The image dimensions should be 960*300px for Full width slide, or 600*300px for Half width slide</em>",	),		array(		"type" => "close_required",	),	array(		"type" => "theme_admin_close_required",	),	// Coin Slider	array(		"type" => "theme_admin_open_required",		"id" => "coin", // must math the variable value of the variable name below in theme admin options		"variable" => "theme_admin_slideshow_style", // must math the variable name in theme admin options	),		array(		"name" => "theme_post_slideshow",		"id" => "theme_post_slideshow_coin",		"title" => "Include this post into the featured slideshow?",		"type" => "checkbox",		"desc" => "Yes",		"value" => "1",	),	array(		"id" => "theme_post_slideshow_required_coin",		"pre_id" => "theme_post_slideshow_coin",		"type" => "open_required",	),	array(		"name" => "theme_post_slide_title",		"title" => "Slide title:",		"type" => "text",		"desc" => "",	),		array(		"name" => "theme_post_slide_desc",		"title" => "Slide description:",		"type" => "textarea",		"desc" => "",	),	array(		"name" => "theme_post_slide_image",		"title" => "Slide image URL: (*)",		"type" => "text",		"desc" => "<em>The image dimensions should be 960*300px for optimal appearance.</em>",	),		array(		"type" => "close_required",	),	array(		"type" => "theme_admin_close_required",	),	// Nivo Slider	array(		"type" => "theme_admin_open_required",		"id" => "nivo", // must math the variable value of the variable name below in theme admin options		"variable" => "theme_admin_slideshow_style", // must math the variable name in theme admin options	),		array(		"name" => "theme_post_slideshow",		"id" => "theme_post_slideshow_nivo",		"title" => "Include this post into the featured slideshow?",		"type" => "checkbox",		"desc" => "Yes",		"value" => "1",	),	array(		"id" => "theme_post_slideshow_required_nivo",		"pre_id" => "theme_post_slideshow_nivo",		"type" => "open_required",	),	array(		"name" => "theme_post_slide_desc",		"title" => "Slide description:",		"type" => "textarea",		"desc" => "",	),	array(		"name" => "theme_post_slide_image",		"title" => "Slide image URL: (*)",		"type" => "text",		"desc" => "<em>The image dimensions should be 960*300px for optimal appearance.</em>",	),		array(		"type" => "close_required",	),	array(		"type" => "theme_admin_close_required",	),			// Featured Post Section	array(		"name" => "theme_post_featured",		"id" => "theme_post_featured",		"title" => "Include this post into the featured post group?",		"type" => "checkbox",		"desc" => "Yes",		"value" => "1",	),	array(		"id" => "theme_post_featured_required",		"pre_id" => "theme_post_featured",		"type" => "open_required",	),	array(		"name" => "theme_post_featured_image",		"title" => "Featured post image URL:",		"type" => "text",		"desc" => "<em>The image dimensions should be 440*90px for optimal appearance.<br />If you leave this field blank, the theme will automatically use Wordpress featured image or get the first image of your post to process as a thumbnail (that image must be in an internal host).</em>",	),	array(		"name" => "theme_post_featured_title",		"title" => "Featured Post Title:",		"type" => "text",		"desc" => "The post title will be used if this field is blank.",	),		array(		"name" => "theme_post_featured_desc",		"title" => "Post description:",		"type" => "textarea",		"desc" => "The post excerpt will be used if this field is blank.",	),	array(		"type" => "close_required",	),	// Post Layout Section	array(		"name" => "theme_post_layout",		"title" => "Please choose the layout of this post:",		"type" => "radio",		"desc" => "<em>The right sidebar will be used as default.</em>",		"value" => array(			array (sub_value => "sidebar_left", sub_desc => "Sidebar on the left"),			array (sub_value => "sidebar_right", sub_desc => "Sidebar on the right"),			array (sub_value => "sidebar_none", sub_desc => "Full width post, no sidebar"),		)	),	// Post headline	array(		"name" => "theme_post_headline_type",		"title" => "Please choose the type of this post headline",		"type" => "radio",		"desc" => "<em>Default value: Default headline</em>",		"value" => array(			array (sub_value => "default_headline", sub_desc => "Default Headline"),			array (sub_value => "custom_headline", sub_desc => "Custom Headline"),			array (sub_value => "latest_twitter_headline", sub_desc => "Show Latest Twitter News"),			array (sub_value => "no_headline", sub_desc => "Show nothing"),		)	),		array(		"name" => "theme_post_headline",		"title" => "Custom Headline text:",		"type" => "textarea",		"desc" => "This text will be showed on top of the article.<br /> It's only show if you choose \"Custom Headline\" above.",	),	// Show featured image or not?	array(		"name" => "theme_post_featured_image_disable",		"id" => "theme_post_featured_image_disable",		"title" => "Disable featured image in the post page?",		"type" => "checkbox",		"desc" => "Yes",		"value" => "1",	),	array(		"name" => "theme_post_author_disable",		"id" => "theme_post_author_disable",		"title" => "Disable author section in the post page?",		"type" => "checkbox",		"desc" => "Yes",		"value" => "1",	),	array(		"name" => "theme_post_related_post_disable",		"id" => "theme_post_related_post_disable",		"title" => "Disable related post section in the post page?",		"type" => "checkbox",		"desc" => "Yes",		"value" => "1",	),		// Link featured image to media file	array(		"name" => "theme_post_featured_image_media",		"id" => "theme_post_featured_image_media",		"title" => "Link featured image to a multimedia file?",		"type" => "checkbox",		"desc" => "Yes",		"value" => "1",	),	array(		"id" => "theme_post_featured_image_media_required",		"pre_id" => "theme_post_featured_image_media",		"type" => "open_required",	),	array(		"name" => "theme_post_featured_image_media_url",		"title" => "Multimedia file URL: (*)",		"type" => "text",		"desc" => "The Theme support flash, quicktime, youtube file...",	),	array(		"name" => "theme_post_featured_image_media_width",		"title" => "Multimedia file width (px):",		"type" => "text",		"desc" => "",	),	array(		"name" => "theme_post_featured_image_media_height",		"title" => "Multimedia file height (px):",		"type" => "text",		"desc" => "",	),		array(		"type" => "close_required",	),	/////////////////////////// Portfolio section ///////////////////////////	// Post Layout Section	array(		"name" => "theme_post_layout",		"title" => "Please choose the layout of this Portfolio:",		"type" => "portfolio_radio",		"desc" => "<em>The right sidebar will be used as default.</em>",		"value" => array(			array (sub_value => "sidebar_left", sub_desc => "Sidebar on the left"),			array (sub_value => "sidebar_right", sub_desc => "Sidebar on the right"),			array (sub_value => "sidebar_none", sub_desc => "Full width post, no sidebar"),		)	),	// Post headline	array(		"name" => "theme_post_headline_type",		"title" => "Please choose the type of this Portfolio headline",		"type" => "portfolio_radio",		"desc" => "<em>Default value: Default headline</em>",		"value" => array(			array (sub_value => "default_headline", sub_desc => "Default Headline"),			array (sub_value => "custom_headline", sub_desc => "Custom Headline"),			array (sub_value => "latest_twitter_headline", sub_desc => "Show Latest Twitter News"),			array (sub_value => "no_headline", sub_desc => "Show nothing"),		)	),		array(		"name" => "theme_post_headline",		"title" => "Custom Headline text:",		"type" => "portfolio_textarea",		"desc" => "This text will be showed on top of the article.<br /> It's only show if you choose \"Custom Headline\" above.",	),	// Show featured image or not?	array(		"name" => "theme_post_featured_image_disable",		"id" => "theme_post_featured_image_disable",		"title" => "Disable featured image in the Portfolio page?",		"type" => "portfolio_checkbox",		"desc" => "Yes",		"value" => "1",	),		array(		"name" => "theme_post_portfolio_date",		"title" => "Portfolio Date:",		"type" => "portfolio_text",		"desc" => "The date of this project.",	),	array(		"name" => "theme_post_portfolio_teaser",		"title" => "Portfolio Teaser Text:",		"type" => "portfolio_textarea",		"desc" => "The post excerpt will be used if this field is blank.",	),	array(		"name" => "theme_post_featured_image_media",		"id" => "theme_post_featured_image_media",		"title" => "Link featured image to a multimedia file?",		"type" => "portfolio_checkbox",		"desc" => "Yes",		"value" => "1",	),		array(		"id" => "theme_post_featured_image_media_required",		"pre_id" => "theme_post_featured_image_media",		"type" => "portfolio_open_required",	),	array(		"name" => "theme_post_featured_image_media_url",		"title" => "Multimedia file URL: (*)",		"type" => "portfolio_text",		"desc" => "The Theme support flash, quicktime, youtube file...",	),	array(		"name" => "theme_post_featured_image_media_width",		"title" => "Multimedia file width (px):",		"type" => "portfolio_text",		"desc" => "",	),	array(		"name" => "theme_post_featured_image_media_height",		"title" => "Multimedia file height (px):",		"type" => "portfolio_text",		"desc" => "",	),	array(		"type" => "portfolio_close_required",	),	);?>