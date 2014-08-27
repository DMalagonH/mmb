<?php get_header(); ?>
			
			<article class="page-banner">
				<div class="wrapper">
					<h2>Graphite Blog</h2>
				</div><!-- end .wrapper -->
			</article>
			
			<div class="wrapper">
							
				<section id="main-column">
					<h4 class="page-title">Latest News</h4>
					<a class="posts-rss" href="<?php bloginfo('rss2_url'); ?>" title="Subscribe to Posts Feed">RSS</a>
					<div class="clear"></div>
					
					<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
								
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
							<?php the_excerpt(); ?>
							<footer>
								<p class="post-tags"><?php the_tags('<strong>Tags:</strong> ', ',', '<br />'); ?></p>
							</footer>
						</section>
						<br class="clear" />
					</article>
					
					<?php endwhile; ?>

			<nav>
				<p><?php if(function_exists('wp_paginate')) {
   					 wp_paginate();
					} ?></p>
			</nav>

			<?php else : ?>

				<article id="post-404">
					<section class="page-content">
						<p>Sorry, but the requested resource was not found on this site.</p>
					</section>
				</article>

			<?php endif; ?>				
					
					
					
					
				</section><!-- end #main-column -->

	<?php get_sidebar(); ?>
	<br class="clear" />
	
				<article class="promo-blurb">
					<h3>You can download the full theme now, completely free from <a href="http://medialoot.com/item/graphite-wordpress-template/">MediaLoot.com</a></h3>
					<a href="http://medialoot.com/item/graphite-wordpress-template/" class="btn-promo">Download it now</a>
					<div class="clear"></div>
				</article>
				</div><!-- end .wrapper -->

<?php get_footer(); ?>