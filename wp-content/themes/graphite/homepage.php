<?php
/*
Template Name: Homepage (Slider)
*/
?>
<?php $g_settings = get_option('g_settings'); ?>
<?php get_header(); ?>
			
			<article class="main-banner-1">
				<div class="wrapper">
					<h2 class="tagline"><?php bloginfo('description'); ?></h2>
					<div class="image-holder-1"> 
								<div id="slider">   
									<?php if($g_settings['feature1'] != '') : ?><a href=""><img src="<?php echo $g_settings['feature1']; ?>" style="width:778px;height:348px;" alt="" /></a><?php endif; ?>
									<?php if($g_settings['feature2'] != '') : ?><a href=""><img src="<?php echo $g_settings['feature2']; ?>" style="width:778px;height:348px;" alt="" /></a><?php endif; ?>
									<?php if($g_settings['feature3'] != '') : ?><a href=""><img src="<?php echo $g_settings['feature3']; ?>" style="width:778px;height:348px;" alt="" /></a><?php endif; ?>
									<?php if($g_settings['feature4'] != '') : ?><a href=""><img src="<?php echo $g_settings['feature4']; ?>" style="width:778px;height:348px;" alt="" /></a><?php endif; ?>
									<?php if($g_settings['feature5'] != '') : ?><a href=""><img src="<?php echo $g_settings['feature5']; ?>" style="width:778px;height:348px;" alt="" /></a><?php endif; ?>
						   			
								</div> 
					</div>
				</div><!-- end .wrapper -->
			</article>
			
			<div class="wrapper">
				
			<article class="promo-blurb">
				<h3><?php echo $g_settings['actiondesc']; ?></h3>
				<a href="<?php echo $g_settings['actionurl']; ?>" class="btn-promo"><?php echo $g_settings['actiontext']; ?></a>
				<div class="clear"></div>
			</article>
			
				<section id="main-column">
					<h4 class="page-title">Latest News</h4>
					<a class="posts-rss" href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to Posts Feed">RSS</a>
					<div class="clear"></div>
					
					<?php
					$args = array( 'numberposts' => 2, 'order'=> 'ASC', 'orderby' => 'title' );
					$postslist = get_posts( $args );
					foreach ($postslist as $post) :  setup_postdata($post); ?> 
					
					<article id="post-<?php the_ID(); ?>" class="blog-post">
						<section class="post-meta">
							<div class="date_cal"> 
								<div class="date"><?php the_time ('j'); ?></div> 
								<div class="month"><?php the_time ('M'); ?></div> 
								<div class="year"><?php the_time ('Y'); ?></div> 
							</div> 
							<p class="comment-count"><?php comments_popup_link('0', '1', '%'); ?></p>
						</section>
						<section class="post-content">
							<header>
								<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							</header>
							<?php the_content(); ?>
							<footer>
								<p class="post-tags"><?php the_tags('<strong>Tags:</strong> ', ',', '<br />'); ?></p>
							</footer>
						</section>
						<div class="clear"></div>
					</article>
					<?php endforeach; ?>				
					
					
					
					
				</section><!-- end #main-column -->

	<?php get_sidebar(); ?>
				</div><!-- end .wrapper -->

<?php get_footer(); ?>