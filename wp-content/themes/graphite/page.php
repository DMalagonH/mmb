<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
		<article class="page-banner">
			<div class="wrapper">
				<header>
					<h2><?php the_title(); ?></h2>
				</header>
			</div><!-- end .wrapper -->
		</article>
		
		<div class="wrapper">
			<section id="main-column">
				<article id="post-<?php the_ID(); ?>" class="standard-page">
					<section class="page-content">
						<?php the_content(''); ?>
					</section>
					<footer>
						<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
					</footer>
				</article>

	<?php endwhile; else: ?>

				<article>
					<p>Sorry, no posts matched your criteria.</p>
				</article>
	<?php endif; ?>
			</section>

<?php get_sidebar(); ?>

				<br class="clear" />
				
				</div><!-- end .wrapper -->

<?php get_footer(); ?>