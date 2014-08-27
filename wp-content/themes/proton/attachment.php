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
				<div class="share_post"><a title="Share This Post" href="#">+ Share This Post</a>
					<div class="share">
					<ul>
					<li><a href="http://twitter.com/home?status=Reading '<?php the_title(); ?>': <?php the_permalink(); ?>" id="twitter" title="Share this post on Twitter">Share this post on Twitter</a></li>
					<li><a href="http://del.icio.us/post?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" id="delicious" title="Share this post on Delicious">Share this post on Delicious</a></li>
					<li><a href="http://digg.com/submit?phase=2&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" id="digg" title="Share this post on Digg">Share this post on Digg</a></li>
					<li><a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" id="stumbleupon" title="Share this post on Stumbleupon">Share this post on Stumbleupon</a></li>
					<li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php the_title(); ?>" id="facebook" title="Share this post on Facebook">Share this post on Facebook</a></li>
					<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" id="linkedin" title="Share this post on Linkedin">Share this post on Linkedin</a></li>
					</ul>		
					</div>
				</div>
					<?php edit_post_link(); ?> Posted <span><?php the_date(); ?></span> in <?php the_category(', ') ?>, <?php the_tags('tags: ',', ','.'); ?>
			<div class="clear"></div>
			</footer>
			<?php if ( has_post_thumbnail() && $theme_post_featured_image_disable != "1") {
				$image_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),full); // Get the full size thumbnail image URL
				if ($theme_post_featured_image_media != "1") {					
					$url = $image_src[0];
				} else { $url = $theme_post_featured_image_media_url; }
			?>
				<div class="post_thumbnail <?php if ($theme_post_featured_image_media == "1") {echo "media";} ?>">
					<a href="<?php echo $url; ?>" rel="prettyPhoto" title="<?php the_title(); ?>" >
						<?php if ($theme_post_layout == "sidebar_none") { ?>
						<img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo $image_src[0]; ?>&w=920&h=300" />
						<?php } else { the_post_thumbnail(); } ?>
					</a>
				</div>
			<?php } ?>
			<?php the_content(); ?>
		</article>
	
		<br class="clear" />
		
		<?php if($theme_post_author_disable != "1") { ?>
		<aside id="author-info">
			<a href="<?php the_author_meta('user_url'); ?>"><?php echo get_avatar( get_the_author_meta('user_email'), '60', '' ); ?></a>
			 <h4>Written by <?php the_author_link(); ?></h4>
			<p><?php the_author_meta('description'); ?></p>
			<div class="clear"></div>
		</aside>
		<?php } ?>
		
		<?php if($theme_post_related_post_disable != "1") { ?>
		<!-- Display related posts without a plugin -->
			<?php
			$tags = wp_get_post_tags($post->ID);
			if ($tags) { 
			  $first_tag = $tags[0]->term_id;
			  $args=array(
				'tag__in' => array($first_tag),
				'post__not_in' => array($post->ID),
				'showposts'=>5,
				'caller_get_posts'=>1
			   );
			  $my_query = new WP_Query($args);
			  if( $my_query->have_posts() ) :
				echo '<aside id="related_post"><h3>You may also like:</h3><ul>';
				while ($my_query->have_posts()) : $my_query->the_post(); ?>
				  <li><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<?php if ( has_post_thumbnail()) { the_post_thumbnail(array(90,90)); } else { ?>	
						<img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo catch_that_image() ?>&amp;w=90&amp;h=90&amp;zc=1" />
					<?php } ?>
					<?php the_title(); ?>
				  </a></li>
			<?php endwhile;
				echo '</ul></aside><div class="clear"></div>';
				endif;
				wp_reset_query(); //This function destroys the previous query used on a custom Loop
			}?>
		<!-- End of display related posts without a plugin -->
		<?php } ?>
	
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