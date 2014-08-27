<?php if ( is_active_sidebar( 'primary-sidebar-widget-area' ) ) : ?>
		<?php dynamic_sidebar( 'primary-sidebar-widget-area' ); ?>
<?php endif; ?>

<!-- Get popular posts starts -->
	<div class="sidebar-widget popular_post">
		<h5 class="sidebar-widget-title">Most Discussed Topic</h5>
		<ul>
			<?php include(TEMPLATEPATH . '/popular.php' ); ?>
		</ul>
	</div>
<!-- Get popular posts ends -->
	
<?php if ( is_active_sidebar( 'secondary-sidebar-widget-area' ) ) : ?>
		<?php dynamic_sidebar( 'secondary-sidebar-widget-area' ); ?>
<?php endif; ?>