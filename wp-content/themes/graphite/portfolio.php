<?php
/*
Template Name: Portfolio
*/
?>


<?php get_header(); ?>

			
			<article class="page-banner">
				<div class="wrapper">
					<h2><?php the_title(); ?></h2>
				</div><!-- end .wrapper -->
			</article>
			
			<div class="wrapper">
											
				<section id="full-width" >
					<?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => 10 ) ); ?>
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
									
						<article id="portfolio-<?php the_ID(); ?>">
							<section class="portfolio-image">
								<a href="<?php
//Get the Thumbnail URL
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 720,405 ), false, '' );
echo $src[0];
?>"  rel="wp-prettyPhoto[portfolio]" class="viewLink">
<?php the_post_thumbnail('portfolio-image', array( 'alt' => get_the_title(), 'class' =>"cover", 'title' => get_the_title() . "" . get_the_excerpt() . "")); ?></a>
							</section>
							<section class="portfolio-description">
								<h3><?php the_title(); ?></h3>
								<?php the_content(); ?>
							</section>
						<div class="clear"></div>
					</article>
					<?php endwhile; ?>				
					
					
					
					
				</section><!-- end #full-width -->

	<br class="clear" />
	
				
				</div><!-- end .wrapper -->

<?php get_footer(); ?>