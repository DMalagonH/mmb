<?php
/*
Template Name: Portfolio 4 columns
*/
?>

<?php get_header(); ?>
	<aside class="grid_12 pre_header">
		<p><?php echo $theme_admin_portfolio_headline; ?></p>
	</aside>
	<div class="clear"></div>
	
	<div class="portfolio portfolio_4_container">
	<?php $loop = null;
		$loop = new WP_Query('post_type=portfolio&posts_per_page=8&paged='.$paged );
		$i = 0;
		while ( $loop->have_posts() ) : $loop->the_post(); $i++;
			foreach($theme_meta_boxes as $theme_meta_box) { // retrive all the post custom field
				$$theme_meta_box['name'] = get_post_meta($post->ID, $theme_meta_box['name'], true);
			}	
	?>	
		<article id="post-<?php the_ID(); ?>" class="post_content grid_3">
			<header><h2 class="entry_title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php the_title(); ?></a></h2></header>
			<?php if ( has_post_thumbnail()) { 
			$image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),full); // Get the full size thumbnail image URL
				if ($theme_post_featured_image_media != "1") {					
					$url = $image_src[0];
				} else { $url = $theme_post_featured_image_media_url; }		
			?>
				<div class="post_thumbnail <?php if ($theme_post_featured_image_media == "1") {echo "media";} ?>">
					<a href="<?php echo $url.'?width='.(int)$theme_post_featured_image_media_width.'&height='.(int)$theme_post_featured_image_media_height; ?>" rel="prettyPhoto" title="<?php the_title(); ?>" ><img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo $image_src[0]; ?>&w=200&h=90" /></a>
				</div>
			<?php } ?>		
			<?php if ($theme_post_portfolio_teaser) { echo '<p>'.$theme_post_portfolio_teaser.'</p>'; } else { the_excerpt(); }?>
		</article>
		<?php if (($i%4)==0) { ?> <div class="clear"></div><br /> <?php } ?>
	<?php endwhile; ?>
	
	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<?php if (function_exists('wp_pagenavi')) {	wp_pagenavi(); } else { ?>
			<div id="nav-below" class="navigation">
					<div class="nav-previous"><?php next_posts_link('<span class="meta-nav">&larr;</span> Older posts'); ?></div>
					<div class="nav-next"><?php previous_posts_link('Newer posts <span class="meta-nav">&rarr;</span>'); ?></div>
			</div>
		<?php } ?>
	<?php endif; ?>	
	
	<div class="clear"></div>
	</div>
	<div class="clear"></div>
<?php get_footer(); ?>