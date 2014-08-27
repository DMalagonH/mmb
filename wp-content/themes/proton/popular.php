<?php
$pop_posts = 5;
$now = gmdate("Y-m-d H:i:s",time());
$lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-24,date("d"),date("Y")));
$popularposts = "SELECT $wpdb->posts.ID, $wpdb->posts.post_content, $wpdb->posts.post_title,  COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT ".$pop_posts;
$posts = $wpdb->get_results($popularposts);
$popular = '';

if($posts){
	foreach($posts as $post){
		$post_title = stripslashes($post->post_title);
		$guid = get_permalink($post->ID);
		$first_img = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),full);

		if ($first_img == "") {
			$first_img = '';
			ob_start();
			ob_end_clean();
			$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
			$first_img = $matches [1] [0];
			  if(empty($first_img)){ //Defines a default image
			  }
		}
?>
		<li>
			<a href="<?php echo $guid; ?>" title="<?php echo $post_title; ?>">
			<img src="<?php bloginfo('template_directory'); ?>/thumb.php?src=<?php echo $first_img[0]; ?>&amp;w=230&amp;h=60&amp;zc=1" width=230 height=60>
            <?php echo $post_title; ?></a>
			<div class="clear"></div>
        </li>
<?php 
	}
	wp_reset_query();
}
?>