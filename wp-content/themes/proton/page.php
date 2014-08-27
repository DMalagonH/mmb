<?php get_header(); ?>
	<?php while ( have_posts() ) : the_post(); 	?>
	<aside class="grid_12 pre_header">
	<?php if($theme_post_headline_type == "custom_headline") { echo '<p>'.$theme_post_headline.'</p>'; }
	elseif ($theme_post_headline_type == "latest_twitter_headline") { ?>
		<ul id="twitter_update_list" class="twitter_single"></ul>	
	<?php } elseif ($theme_post_headline_type == "no_headline") {} else { echo '<p>'.$theme_admin_headline.'</p>'; } ?>
	</aside>
	
	<div class="clear"></div>	
	<div class="post_container grid_12">		
		<?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
		<article id="post-<?php the_ID(); ?>" class="post_content">
			<header><h2 class="entry_title"><?php the_title(); ?></h2></header>
			<footer>
				<?php edit_post_link(); ?><span class="post_date"><?php the_time(get_option('date_format')); ?></span> <span class="post_author"><?php the_author_link(); ?></span> <?php the_tags('<span class="post_tags">',', ','.</span>'); ?>
			<div class="clear"></div>
			</footer>
			<?php if ( has_post_thumbnail()) { 
			$image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),full); // Get the full size thumbnail image URL
			?>
				<div class="post_thumbnail">
					<a href="<?php echo $image_src[0]; ?>" rel="prettyPhoto" title="<?php the_title(); ?>" ><img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo $image_src[0]; ?>&w=920&h=300" /></a>
				</div>
			<?php } ?>			
			<?php the_content(); ?>
		</article>
	</div>
	<?php endwhile; ?>
	
	<div class="clear"></div>
<?php get_footer(); ?>