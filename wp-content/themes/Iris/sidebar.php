<div class="right">
<!-- Tabbed content-->
<?php include (TEMPLATEPATH . '/tabs.php'); ?>	
<!-- Tabbed content-->

<!-- Ad Banners-->
<?php include (TEMPLATEPATH . '/sponsors.php'); ?>	
<!-- Ad Banners end-->

<!-- Wordpress widgets-->
<div class="sidebar">
<ul>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar') ) : else : ?>
	<?php endif; ?>
</ul>
</div>
<!-- Wordpress widgets ends-->
</div>