<?php get_header(); ?>
	<aside class="grid_12 pre_header">
		<p>Looks like the page you are looking for is not here anymore. Try using the search box below.</p>
	</aside>
	
	<div class="clear"></div>	
	<div class="post_container grid_8">		
		<?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
		<article class="post_content">
			<header><h2 class="entry_title">Error 404 - Page not found</h2></header>
			<br />
			<h3>Pages</h3>
				<div class="arrowlist"><ul><?php wp_list_pages("title_li=" ); ?></ul></div>
			<h3>Feeds</h3>
				<div class="arrowlist"><ul>
					<li><a title="Full content" href="feed:<?php bloginfo('rss2_url'); ?>">Main RSS</a></li>
					<li><a title="Comment Feed" href="feed:<?php bloginfo('comments_rss2_url'); ?>">Comment Feed</a></li>
				</ul></div>
			<h3>Categories</h3>
				<div class="arrowlist"><ul><?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0&feed=RSS'); ?></ul></div>
			<h3>All Blog Posts:</h3>
				<div class="arrowlist">
					<ul><?php $archive_query = new WP_Query('showposts=1000');
						while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
							<li>
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a> 
							 (<?php comments_number('0', '1', '%'); ?>)
							</li>
						<?php endwhile; ?>
					</ul>
				</div>
			<h3>Archives</h3>
				<div class="arrowlist">
				<ul>
					<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
				</ul>
				</div>
		</article>
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