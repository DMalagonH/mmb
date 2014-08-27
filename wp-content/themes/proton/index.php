<?php get_header(); ?>
</div> <!-- close for container div class -->
	<?php if ($theme_admin_slideshow_style == "cycle") { ?>
	<!-- Cycle Slideshow start -->
		<div class="slide">
				<?php $slideshow = new WP_Query('meta_key=theme_post_slideshow&meta_value=1&showposts='.(int)$theme_admin_slide_num);
				while ($slideshow->have_posts()) : $slideshow->the_post();				
					$do_not_duplicate[] = $post->ID; // Get all slide post IDs into an array					
					foreach($theme_meta_boxes as $theme_meta_box) { // retrive all the post custom field
						$$theme_meta_box['name'] = get_post_meta($post->ID, $theme_meta_box['name'], true);
					}
				?>
							
						<div class="<?php if($theme_post_slide_width_type) {echo $theme_post_slide_width_type;} else {echo "full_bottom";} ?>">			
								<img src="<?php echo $theme_post_slide_image; ?>" />
								
								<?php if ($theme_post_slide_title || $theme_post_slide_desc) { // Check whether this slide has slide title or slide desc or not ?>				
									<span class="<?php echo $theme_post_slide_width_type.'_span'; ?>">
										<?php if ($theme_post_slide_title) { ?>										
										<em class="cycle_title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark"><?php echo $theme_post_slide_title; ?></a></em>
										<?php } ?>
										<?php if ($theme_post_slide_desc) { echo $theme_post_slide_desc; } ?>									
									</span>									
								<?php } ?>
								
						</div>
				<?php endwhile; ?>
				
		</div>
	<!-- Cycle Slideshow end -->
	<?php } elseif ($theme_admin_slideshow_style == "coin") { ?>
	<!-- Coin Slideshow start -->
		<div id="coin-slider">
				<?php $slideshow = new WP_Query('meta_key=theme_post_slideshow&meta_value=1&showposts='.(int)$theme_admin_slide_num);
				while ($slideshow->have_posts()) : $slideshow->the_post();				
					$do_not_duplicate[] = $post->ID; // Get all slide post IDs into an array					
					foreach($theme_meta_boxes as $theme_meta_box) { // retrive all the post custom field
						$$theme_meta_box['name'] = get_post_meta($post->ID, $theme_meta_box['name'], true);
					}
				?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<img src="<?php echo $theme_post_slide_image; ?>" width=960 height=300 />
				
					<?php if ($theme_post_slide_title || $theme_post_slide_desc) { // Check whether this slide has slide title or slide desc or not ?>
						<span>
							<?php if ($theme_post_slide_title) { ?>
							<em class="coin_title"><?php echo $theme_post_slide_title; ?></em> <!-- Do not put a Link because it's not works in Google Chrome --> 
							<?php } ?>
							<?php if ($theme_post_slide_desc) { echo $theme_post_slide_desc; } ?>	
						</span>
					<?php } ?>
				</a>
				<?php endwhile; ?>
		</div>	
	<!-- Coin Slideshow end -->
	<?php } elseif ($theme_admin_slideshow_style == "nivo") { ?>
	<!-- Nivo Slideshow start -->
		<div id="nivo">
				<div id="nivo-slider">
				<?php $slideshow = new WP_Query('meta_key=theme_post_slideshow&meta_value=1&showposts='.(int)$theme_admin_slide_num);
				while ($slideshow->have_posts()) : $slideshow->the_post();				
					$do_not_duplicate[] = $post->ID; // Get all slide post IDs into an array					
					foreach($theme_meta_boxes as $theme_meta_box) { // retrive all the post custom field
						$$theme_meta_box['name'] = get_post_meta($post->ID, $theme_meta_box['name'], true);
					}
				?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<img src="<?php echo $theme_post_slide_image; ?>" <?php if ($theme_post_slide_desc) { echo 'title="'.$theme_post_slide_desc.'"'; } ?> width=960 height=300 />
				</a>
				<?php endwhile; ?>
				</div>
		</div>
	<!-- Nivo Slideshow start -->
	<?php } ?>
	<div class="clear"></div>
	
<div class="container">
	<!-- Call to action start -->
	<div id="call_action">
		<a href="<?php echo $theme_admin_calltoaction_url; ?>" class="learn_more">learn more</a>
		<p><?php if($theme_admin_calltoaction) { echo $theme_admin_calltoaction; } ?><p>
	</div>
	<!-- Call to action end -->
	
	<!-- Latest Content start -->
	<?php $latest = new WP_Query(array('post__not_in' => $do_not_duplicate, 'showposts' => (int)$theme_admin_latest_num));
	if ($latest->have_posts()) : ?>
		<section id="latest_content">
				<?php $i = 0;
					while ($latest->have_posts()) : $latest->the_post(); $i++;
					foreach($theme_meta_boxes as $theme_meta_box) { // retrive all the post custom field
						$$theme_meta_box['name'] = get_post_meta($post->ID, $theme_meta_box['name'], true);
					}
				?>				
					<article class="<?php if($theme_post_featured) { $i = $i+1; echo "grid_6 featured";} else {echo "grid_3";} ?>" id="post-<?php the_ID(); ?>">
						<div class="latest_content_img">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
								<?php if($theme_post_featured) { ?>
									<?php if ($theme_post_featured_image) { ?>
										<img src="<?php echo $theme_post_featured_image; ?>" />															
									<?php } elseif ( has_post_thumbnail()) {
										$image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),full); // Get the full size thumbnail image URL
									?>
										<img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo $image_src[0]; ?>&amp;w=440&amp;h=90" />
									<?php } else { ?>
										<img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo catch_that_image() ?>&amp;w=440&amp;h=90" />
									<?php } ?>
								<?php } else { ?>								
									<?php if ( has_post_thumbnail()) {
										$image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),full); // Get the full size thumbnail image URL
									?>
										<img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo $image_src[0]; ?>&amp;w=200&amp;h=90" />
									<?php } else { ?>
										<img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo catch_that_image() ?>&amp;w=200&amp;h=90" />
									<?php } ?>							
								
								<?php } ?>
							</a>
						</div>
						<header><h3><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
							<?php if($theme_post_featured_title) {echo $theme_post_featured_title;} else {the_title();} ?>
							</a></h3></header>
						<div class="featured_desc">
						<?php if ($theme_post_featured_desc) { echo '<p>'.$theme_post_featured_desc.'</p>'; } else { the_excerpt(); }?>
						</div>
					</article>
				<?php if (($i%4)==0) { ?> <div class="clear"></div><br /> <?php } ?>
				<?php endwhile; ?>
				<div class="clear"></div>
				<hr class="hr_seperator" />
		</section>
	<?php endif; ?>
	
	<!-- Latest Content end -->

	<div class="clear"></div>
<?php get_footer(); ?>