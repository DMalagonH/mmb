<?php
$g_settings = get_option('g_settings');
?>

		<footer>
			<section>
				<div class="wrapper">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Widgets') ) : ?><?php endif; ?>
				</div><!-- end .wrapper -->
			</section>
			<br />
			<section class="copyright">
					<div class="wrapper">
					<p>&copy; Copyright <?= date('Y'); ?> <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>.</p>
			<?php wp_footer(); ?>
		</footer>
		
		<?php echo $g_settings['footercode']; ?>

	</body>
</html>