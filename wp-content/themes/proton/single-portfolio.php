<?php get_header(); ?>
	<?php while ( have_posts() ) : the_post(); 
			foreach($theme_meta_boxes as $theme_meta_box) { // retrive all the post custom field
				$$theme_meta_box['name'] = get_post_meta($post->ID, $theme_meta_box['name'], true);
			}	
	?>
	<aside class="grid_12 pre_header">
	<?php if($theme_post_headline_type == "custom_headline") { echo '<p>'.$theme_post_headline.'</p>'; }
	elseif ($theme_post_headline_type == "latest_twitter_headline") { ?>
		<ul id="twitter_update_list" class="twitter_single"></ul>	
	<?php } elseif ($theme_post_headline_type == "no_headline") {} else { echo '<p>'.$theme_admin_headline.'</p>'; } ?>
	</aside>
	
	<div class="clear"></div>	
	<div class="post_container <?php if($theme_post_layout == "sidebar_left") {echo "grid_8 push_4 left_crumbs"; } elseif ($theme_post_layout == "sidebar_none") {echo "grid_12 sidebar_none";} else {echo "grid_8";} ?>">		

		<article id="post-<?php the_ID(); ?>" class="post_content">
			<header><h2 class="entry_title"><?php the_title(); ?></h2></header>
			<footer>
				<?php edit_post_link(); ?><span class="post_date"><?php the_time(get_option('date_format')); ?></span> <span class="post_author"><?php the_author_link(); ?></span> <?php the_tags('<span class="post_tags">',', ','.</span>'); ?>
			<div class="clear"></div>
			</footer>
			<?php if ( has_post_thumbnail() && $theme_post_featured_image_disable != "1") {
				$image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),full); // Get the full size thumbnail image URL
				if ($theme_post_featured_image_media != "1") {					
					$url = $image_src[0];
				} else { $url = $theme_post_featured_image_media_url; }
			?>
				<div class="post_thumbnail <?php if ($theme_post_featured_image_media == "1") {echo "media";} ?>">
					<a href="<?php echo $url.'?width='.(int)$theme_post_featured_image_media_width.'&height='.(int)$theme_post_featured_image_media_height; ?>" rel="prettyPhoto" title="<?php the_title(); ?>" >
						<?php if ($theme_post_layout == "sidebar_none") { ?>
						<img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo $image_src[0]; ?>&w=920&h=300" />
						<?php } else { the_post_thumbnail(); } ?>
					</a>
				</div>
			<?php } ?>
			<?php the_content(); ?>
		</article>

		<?php comments_template(); ?>
	</div>
	<?php endwhile; ?>
	
	<?php if($theme_post_layout != "sidebar_none") { ?>
	<div class="sidebar grid_4 <?php if($theme_post_layout == "sidebar_left") {echo "pull_8"; } ?>">
		<aside id="<?php if($theme_post_layout == "sidebar_left") {echo "sidebar_left";} else {echo "sidebar_right";} ?>">
			<span class="sidebar_start"></span>
			<?php get_sidebar(); ?>
			<span class="sidebar_end"></span>
		</aside>
	</div>
	<?php } ?>
	
	<div class="clear"></div>
	
	<?php if ($theme_post_headline_type == "latest_twitter_headline") { ?>
		<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js">
		</script>
		<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $theme_admin_twitter; ?>.json?callback=twitterCallback2&count=1">
		</script>	
	<?php } ?>	
<?php get_footer(); ?>