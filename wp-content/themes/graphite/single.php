<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article class="page-banner">
				<div class="wrapper">
					<h2>Graphite Blog</h2>
				</div><!-- end .wrapper -->
			</article>
			
			<div class="wrapper">
			<section id="main-column">
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

			<?php comments_template(); ?>

	<?php endwhile; else: ?>

			<article>
				<p>Sorry, no posts matched your criteria.</p>
			</article>
		
	<?php endif; ?></section>

<?php get_sidebar(); ?>
</div><!-- end .wrapper -->

<?php get_footer(); ?>