<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="box <?php if (++$counter % 2 == 0) { echo "lastbox"; }?>" id="post-<?php the_ID(); ?>">

<div class="boxtitle">
	<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php echo short_title('...', 4); ?></a></h2>
</div>

<div class="boxentry">

<?php
if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>"><img class="postimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=120&amp;w=290&amp;zc=1" alt=""/></a>
<?php } else { ?>
	<a href="<?php the_permalink() ?>"><img class="postimg" src="<?php bloginfo('template_directory'); ?>/images/dummy.png" alt="<?php the_title(); ?>" /></a>
<?php } ?>

<?php wpe_excerpt('wpe_excerptlength_featured', 'wpe_excerptmore'); ?>
<div class="clear"></div>
</div>

</div>

<?php endwhile; ?>
<div class="clear"></div>
<?php getpagenavi(); ?>
<?php else : ?>
		<h1 class="title">Not Found</h1>
		<p>Sorry, but you are looking for something that isn't here.</p>
<?php endif; ?>
<div class="clear"></div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>