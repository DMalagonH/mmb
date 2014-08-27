<?php get_header(); ?>
	<aside class="grid_12 pre_header">
		<p>Search results for &#39;<?php echo get_search_query(); ?>&#39;</p>
	</aside>
	<div class="clear"></div>
	
	<div class="post_container grid_8">
	<?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
	<?php while ( have_posts() ) : the_post(); 
			foreach($theme_meta_boxes as $theme_meta_box) { // retrive all the post custom field
				$$theme_meta_box['name'] = get_post_meta($post->ID, $theme_meta_box['name'], true);
			}	
	?>	
		<article id="post-<?php the_ID(); ?>" class="post_content">
			<header><h2 class="entry_title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2></header>
			<footer>
				<?php edit_post_link(); ?><span class="post_date"><?php the_time(get_option('date_format')); ?></span> <span class="post_author"><?php the_author_link(); ?></span> <?php the_tags('<span class="post_tags">',', ','.</span>'); ?>
			<div class="clear"></div>
			</footer>
			<?php if ( has_post_thumbnail()) {
				$image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),full); // Get the full size thumbnail image URL
				if ($theme_post_featured_image_media != "1") {					
					$url = $image_src[0];
				} else { $url = $theme_post_featured_image_media_url; }
			?>
				<div class="post_thumbnail <?php if ($theme_post_featured_image_media == "1") {echo "media";} ?>">
					<a href="<?php echo $url.'?width='.(int)$theme_post_featured_image_media_width.'&height='.(int)$theme_post_featured_image_media_height; ?>" rel="prettyPhoto" title="<?php the_title(); ?>" ><?php the_post_thumbnail(); ?></a>
				</div>
			<?php } ?>		
			<?php the_content('',FALSE,''); ?>
		</article>
	<?php endwhile; ?>
	
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<?php if (function_exists('wp_pagenavi')) {	wp_pagenavi(); } else { ?>
			<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link('<span class="meta-nav">&larr;</span> Older posts'); ?></div>
					<div class="nav-next"><?php previous_posts_link('Newer posts <span class="meta-nav">&rarr;</span>'); ?></div>
			</div>
		<?php } ?>
	<?php endif; ?>	
	</div>
	
	
	<div class="sidebar grid_4">
		<aside id="sidebar_right">
			<span class="sidebar_start"></span>
			<?php get_sidebar(); ?>
			<span class="sidebar_end"></span>
		</aside>
	</div>
	
	<div class="clear"></div>
<?php get_footer(); ?>