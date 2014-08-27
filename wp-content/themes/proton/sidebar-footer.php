<?php
	if (   ! is_active_sidebar( 'first-footer-widget-area'  )
		&& ! is_active_sidebar( 'second-footer-widget-area' )
		&& ! is_active_sidebar( 'third-footer-widget-area'  )
		&& ! is_active_sidebar( 'fourth-footer-widget-area' )
		&& ! is_active_sidebar( 'fifth-footer-widget-area' )
	)
		return;
	// If none of the sidebars have widgets then return.
?>

<div id="footer_top">
	<div class="container">
	
	<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
		<div id="first" class="widget-area grid_4">
				<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
		</div><!-- #first .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
		<div id="second" class="widget-area grid_2">
				<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
		</div><!-- #second .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
		<div id="third" class="widget-area grid_2">
				<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
		</div><!-- #third .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'fourth-footer-widget-area' ) ) : ?>
		<div id="fourth" class="widget-area grid_2">
				<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>
		</div><!-- #fourth .widget-area -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'fifth-footer-widget-area' ) ) : ?>
		<div id="fifth" class="widget-area grid_2">
				<?php dynamic_sidebar( 'fifth-footer-widget-area' ); ?>
		</div><!-- #fifth .widget-area -->
	<?php endif; ?>
	
	<div class="clear"></div>
	</div>
</div>