<?php require(THEME_FUNCTION . '/theme.php'); // Get options to use in theme ?>		
</div> <!-- close for container div class -->

	<footer id="footer">
		<?php get_sidebar( 'footer' ); ?>
		<div id="footer_bottom">
			<div class="container">
				<div id="footer_menu" class="grid_7">
					 <?php wp_nav_menu(array('depth' => '1')); ?> 
				</div>
				<div id="site-generator" class="grid_5">
						<p><?php echo $theme_admin_copyright; ?></p>
						<a href="http://wordpress.org/"	title="Semantic Personal Publishing Platform" rel="generator">Proudly powered by WordPress</a> - <a href="http://www.intenseblog.com" title="Blogger resources" rel="follow">Design by Intenseblog.com</a> - <a class="scrollTop" href="#logo"> Top</a>
				</div><!-- #site-generator -->
				
				<div class="clear"></div>
			</div>
		</div>
	</footer>
	

	<!-- Javascripts start -->
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>  
	
	<?php if ($theme_admin_slideshow_style == "nivo") { // Could not use Nivo with LAB.js?>
	<script src="<?php echo THEME_JS ?>/jquery.nivo.slider.pack.js" type="text/javascript"></script>
	<?php } ?>
	
	<?php if ($theme_admin_cufon != "0") { ?>
	<script src="<?php echo THEME_JS ?>/cufon-yui.js" type="text/javascript"></script>
	<script src="<?php echo THEME_JS ?>/font.js" type="text/javascript"></script>
	<script type="text/javascript">
		Cufon.replace('.cycle_title', { fontFamily: 'Dekar' });
		Cufon.replace('#call_action p', { fontFamily: 'ColaborateLight' });
		Cufon.replace('#latest_content h3', { fontFamily: 'Dekar' });
		Cufon.replace('h2.entry_title', { fontFamily: 'Dekar' });
		Cufon.replace('h3#reply-title', { fontFamily: 'Aller' });
		Cufon.replace('h3#comments-title', { fontFamily: 'Aller' });		
		Cufon.replace('#related_post h3', { fontFamily: 'Aller' });
		Cufon.replace('h5.sidebar-widget-title', { fontFamily: 'Aller' });
		Cufon.replace('h5.widget-title', { fontFamily: 'Aller' });
		Cufon.replace('.pre_header p', { fontFamily: 'ColaborateLight' });
		
		Cufon.replace('.post_content h3', { fontFamily: 'Quicksand Book' });
		Cufon.replace('.post_content h4', { fontFamily: 'Dekar' });
		Cufon.replace('.post_content h5', { fontFamily: 'ColaborateLight' });
		Cufon.replace('.post_content h6', { fontFamily: 'ColaborateLight' });
		Cufon.replace('a.buttonshortcode', { fontFamily: 'Aller' });
		Cufon.replace('a.toggle', { fontFamily: 'Aller' });
	</script>
	<?php } ?>	

	<script src="<?php echo THEME_JS ?>/LAB.min.js" type="text/javascript"></script>
	<?php if (is_home()) { ?>
		<script>
		$LAB
		.setOptions({AlwaysPreserveOrder:true})
			<?php if ($theme_admin_slideshow_style == "cycle") { ?>
			.script("<?php echo THEME_JS ?>/jquery.cycle.all.latest.js")
			<?php } elseif ($theme_admin_slideshow_style == "coin") { ?>
			.script("<?php echo THEME_JS ?>/coin-slider.min.js")
			<?php } ?>
		.script("<?php echo THEME_JS ?>/custom.js")
		.script("http://twitter.com/javascripts/blogger.js")
		.script("http://twitter.com/statuses/user_timeline/<?php echo $theme_admin_twitter; ?>.json?callback=twitterCallback2&count=3")
		</script>
	<?php } else { ?>
		<script>
		$LAB
		.setOptions({AlwaysPreserveOrder:true})
		.script("<?php echo THEME_JS ?>/jquery.prettyPhoto.js")
		.script("<?php echo THEME_JS ?>/coin-slider.min.js")
		.script("<?php echo THEME_JS ?>/custom_single.js")
		</script>
	<?php } ?>
<?php wp_footer(); ?>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>