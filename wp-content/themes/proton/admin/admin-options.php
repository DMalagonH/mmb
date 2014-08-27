<?php
require_once(THEME_ADMIN . '/admin-scripts.php');
require_once(THEME_ADMIN . '/post-options-list.php');
require_once(THEME_ADMIN . '/admin-options-list.php');
// Define Some Variables of Theme
$theme_name = "The Proton";
$short_name = "theproton";
$handle = $short_name . '-theme';

/* --------------------
	Theme Admin Menu
-------------------- */ 
function create_admin_menu() // Function to create admin menu
{
	global $theme_name, $short_name, $handle;
	add_menu_page($theme_name." Configurations", $theme_name, 'edit_themes', $handle, 'admin_interface');
}
function admin_interface () // Create the Theme configurations page
{
	global $theme_name, $short_name, $handle, $theme_admin_boxes;
	include(THEME_ADMIN.'/admin-interface.php');
}
add_action('admin_menu', 'create_admin_menu'); // Lets Wordpress know to create admin menu


/* --------------------
	Theme Post Menu
-------------------- */ 
function create_post_boxes () // Function to create the Post configurations boxes
{
	global $theme_name, $short_name, $handle;
	if (function_exists('add_meta_box')) {
		add_meta_box( $short_name."post-box", $theme_name." Theme Post Settings", 'post_interface', 'post', 'normal', 'high' );
	}
}
function create_post_portfolio_boxes () // Function to create the Post Portfolio configurations boxes
{
	global $theme_name, $short_name, $handle;
	if (function_exists('add_meta_box')) {
		add_meta_box( $short_name."post-portfolio-box", $theme_name." Theme Portfolio Settings", 'post_portfolio_interface', 'portfolio', 'normal', 'high' );
	}
}
function post_interface () // Create the Post configurations boxes
{
	global $theme_name, $short_name, $handle, $post, $theme_meta_boxes, $theme_admin_boxes; // Must global $post(to use get_post_meta wordpress function) and $theme_meta_boxes(in post-options-list.php)
	
	foreach($theme_admin_boxes as $theme_admin_box) { // Get theme admin configurations
		$$theme_admin_box['name'] = get_option($theme_admin_box['name']);
		global $$theme_admin_box['name'];
	}
	
	echo '<input type="hidden" name="theme_post_nonce" id="theme_post_nonce" value="'.wp_create_nonce($short_name) . '" />';
	echo '<table class="post_box"><tbody>';
	foreach($theme_meta_boxes as $theme_meta_box) {
		switch ( $theme_meta_box['type'] ) {
			case 'text':
				echo '<tr class="alternate">';
				echo '<td class="left"><p><strong>'.$theme_meta_box['title'].'</strong></p><p class="desc">'.$theme_meta_box['desc'].'</p></td>';
				echo '<td><input type="text" name="'.$theme_meta_box['name'].'_value" value="'.get_post_meta($post->ID, $theme_meta_box['name'], true).'" size="25" /></td>';
				echo '</tr>';
			break;
			
			case 'textarea':
				echo '<tr class="alternate">';
				echo '<td class="left"><p><strong>'.$theme_meta_box['title'].'</strong></p><p class="desc">'.$theme_meta_box['desc'].'</p></td>';
				?>
				<td><textarea rows="3" cols="50" name="<?php echo $theme_meta_box['name']."_value"; ?>"><?php echo get_post_meta($post->ID, $theme_meta_box['name'], true); ?></textarea></td></tr>
				<?php
			break;
			
			case 'radio':
				echo '<tr class="alternate">';
				echo '<td class="left"><p><strong>'.$theme_meta_box['title'].'</strong></p><p class="desc">'.$theme_meta_box['desc'].'</p></td><td>';
					foreach($theme_meta_box['value'] as $theme_meta_box_value) {
						?>
						<label><input name="<?php echo $theme_meta_box['name']."_value"; ?>" type="radio" value="<?php echo $theme_meta_box_value['sub_value']; ?>" <?php if($theme_meta_box_value['sub_value'] == get_post_meta($post->ID, $theme_meta_box['name'], true)) { echo 'checked="checked"';} ?> <?php if($theme_meta_box['value'] == get_post_meta($post->ID, $theme_meta_box['name'], true)) { echo 'checked="checked"';} ?> <?php if ($theme_meta_box_value['next_id']) { ?> onClick="if(this.checked){document.getElementById('<?php echo $theme_meta_box_value['next_id'] ?>').style.display='block';}else{document.getElementById('<?php echo $theme_meta_box_value['next_id'] ?>').style.display='none';}" <?php } ?> /><?php echo $theme_meta_box_value['sub_desc']; ?></label><br />
						<?php
					}
				echo '</td></tr>';
			break;

			case 'checkbox':
				echo '<tr class="alternate">';
					echo '<td class="left"><p><strong>'.$theme_meta_box['title'].'</strong></p></td>';	?>					
						<td><label><input id="<?php echo $theme_meta_box['id']; ?>" type="checkbox" name="<?php echo $theme_meta_box['name'].'_value'; ?>" value="<?php echo $theme_meta_box['value']; ?>"  <?php if($theme_meta_box['value'] == get_post_meta($post->ID, $theme_meta_box['name'], true)) { echo 'checked="checked"';} ?> /><?php echo $theme_meta_box['desc']; ?></label></td>
					<?php 
				echo '</tr>';
			break;

			case 'open_required': ?>		
			<script type="text/javascript">
			jQuery(document).ready(function($) {
				if ($('#<?php echo $theme_meta_box['pre_id']; ?>').attr('checked'))
				{
					$('#<?php echo $theme_meta_box['id']; ?>').show();
					$('#<?php echo $theme_meta_box['pre_id']; ?>').click(function(){
					  $('#<?php echo $theme_meta_box['id']; ?>').slideToggle("slow");
					});

				}
				else {
					$('#<?php echo $theme_meta_box['id']; ?>').hide();
					$('#<?php echo $theme_meta_box['pre_id']; ?>').click(function(){
					  $('#<?php echo $theme_meta_box['id']; ?>').slideToggle("slow");
					});					
				}
			});
			</script>			
			<?php
				echo '<tr><td colspan=2><table id="'. $theme_meta_box['id'] .'" style="width:95%;margin-left:5%">';
			break;
			
			case 'close_required':
				echo '</table></td></tr>';
			break;
			
			case 'theme_admin_open_required':
			?>
			<?php if($$theme_meta_box['variable'] != $theme_meta_box['id']) { ?>
			<script type="text/javascript">
			jQuery(document).ready(function($) {		
				$.fn.clearForm = function() {
				  return this.each(function() {
				 var type = this.type, tag = this.tagName.toLowerCase(), name = this.name;
				$(this).attr("name","");
				 if (tag == 'form')
				   return $(':input',this).clearForm();
				 if (type == 'text' || type == 'password' || tag == 'textarea')
				   this.value = '';
				 else if (type == 'checkbox' || type == 'radio')
				   this.checked = false;
				 else if (tag == 'select')
				   this.selectedIndex = -1;
				  });
				};
				
				$('#<?php echo $theme_meta_box['id']; ?> input').clearForm();
				$('#<?php echo $theme_meta_box['id']; ?> textarea').clearForm();
				$('#<?php echo $theme_meta_box['id']; ?> select').clearForm();
			});
			</script>
			<?php } ?>
				<tr id="<?php echo $theme_meta_box['id']; ?>" style="<?php if($$theme_meta_box['variable'] != $theme_meta_box['id']) {echo "display:none";} ?>"><td colspan=2><table>				
			<?php
			break;

			case 'theme_admin_close_required':
				echo '</table></td></tr>';
			break;			
		}
	}
	echo '</tbody></table>';
}

function post_portfolio_interface () // Create the Post configurations boxes
{
	global $theme_name, $short_name, $handle, $post, $theme_meta_boxes, $theme_admin_boxes; // Must global $post(to use get_post_meta wordpress function) and $theme_meta_boxes(in post-options-list.php)
	
	foreach($theme_admin_boxes as $theme_admin_box) { // Get theme admin configurations
		$$theme_admin_box['name'] = get_option($theme_admin_box['name']);
		global $$theme_admin_box['name'];
	}
	
	echo '<input type="hidden" name="theme_post_nonce" id="theme_post_nonce" value="'.wp_create_nonce($short_name) . '" />';
	echo '<table class="post_box"><tbody>';
	foreach($theme_meta_boxes as $theme_meta_box) {
		switch ( $theme_meta_box['type'] ) {
			case 'portfolio_text':
				echo '<tr class="alternate">';
				echo '<td class="left"><p><strong>'.$theme_meta_box['title'].'</strong></p><p class="desc">'.$theme_meta_box['desc'].'</p></td>';
				echo '<td><input type="text" name="'.$theme_meta_box['name'].'_value" value="'.get_post_meta($post->ID, $theme_meta_box['name'], true).'" size="25" /></td>';
				echo '</tr>';
			break;
			
			case 'portfolio_textarea':
				echo '<tr class="alternate">';
				echo '<td class="left"><p><strong>'.$theme_meta_box['title'].'</strong></p><p class="desc">'.$theme_meta_box['desc'].'</p></td>';
				?>
				<td><textarea rows="3" cols="50" name="<?php echo $theme_meta_box['name']."_value"; ?>"><?php echo get_post_meta($post->ID, $theme_meta_box['name'], true); ?></textarea></td></tr>
				<?php
			break;
			
			case 'portfolio_radio':
				echo '<tr class="alternate">';
				echo '<td class="left"><p><strong>'.$theme_meta_box['title'].'</strong></p><p class="desc">'.$theme_meta_box['desc'].'</p></td><td>';
					foreach($theme_meta_box['value'] as $theme_meta_box_value) {
						?>
						<label><input name="<?php echo $theme_meta_box['name']."_value"; ?>" type="radio" value="<?php echo $theme_meta_box_value['sub_value']; ?>" <?php if($theme_meta_box_value['sub_value'] == get_post_meta($post->ID, $theme_meta_box['name'], true)) { echo 'checked="checked"';} ?> <?php if($theme_meta_box['value'] == get_post_meta($post->ID, $theme_meta_box['name'], true)) { echo 'checked="checked"';} ?> <?php if ($theme_meta_box_value['next_id']) { ?> onClick="if(this.checked){document.getElementById('<?php echo $theme_meta_box_value['next_id'] ?>').style.display='block';}else{document.getElementById('<?php echo $theme_meta_box_value['next_id'] ?>').style.display='none';}" <?php } ?> /><?php echo $theme_meta_box_value['sub_desc']; ?></label><br />
						<?php
					}
				echo '</td></tr>';
			break;

			case 'portfolio_checkbox':
				echo '<tr class="alternate">';
					echo '<td class="left"><p><strong>'.$theme_meta_box['title'].'</strong></p></td>';	?>					
						<td><label><input id="<?php echo $theme_meta_box['id']; ?>" type="checkbox" name="<?php echo $theme_meta_box['name'].'_value'; ?>" value="<?php echo $theme_meta_box['value']; ?>"  <?php if($theme_meta_box['value'] == get_post_meta($post->ID, $theme_meta_box['name'], true)) { echo 'checked="checked"';} ?> /><?php echo $theme_meta_box['desc']; ?></label></td>
					<?php 
				echo '</tr>';
			break;

			case 'portfolio_open_required': ?>		
			<script type="text/javascript">
			jQuery(document).ready(function($) {
				if ($('#<?php echo $theme_meta_box['pre_id']; ?>').attr('checked'))
				{
					$('#<?php echo $theme_meta_box['id']; ?>').show();
					$('#<?php echo $theme_meta_box['pre_id']; ?>').click(function(){
					  $('#<?php echo $theme_meta_box['id']; ?>').slideToggle("slow");
					});

				}
				else {
					$('#<?php echo $theme_meta_box['id']; ?>').hide();
					$('#<?php echo $theme_meta_box['pre_id']; ?>').click(function(){
					  $('#<?php echo $theme_meta_box['id']; ?>').slideToggle("slow");
					});					
				}
			});
			</script>			
			<?php
				echo '<tr><td colspan=2><table id="'. $theme_meta_box['id'] .'" style="width:95%;margin-left:5%">';
			break;
			
			case 'portfolio_close_required':
				echo '</table></td></tr>';
			break;
			
			case 'portfolio_theme_admin_open_required':
			?>
			<?php if($$theme_meta_box['variable'] != $theme_meta_box['id']) { ?>
			<script type="text/javascript">
			jQuery(document).ready(function($) {		
				$.fn.clearForm = function() {
				  return this.each(function() {
				 var type = this.type, tag = this.tagName.toLowerCase(), name = this.name;
				$(this).attr("name","");
				 if (tag == 'form')
				   return $(':input',this).clearForm();
				 if (type == 'text' || type == 'password' || tag == 'textarea')
				   this.value = '';
				 else if (type == 'checkbox' || type == 'radio')
				   this.checked = false;
				 else if (tag == 'select')
				   this.selectedIndex = -1;
				  });
				};
				
				$('#<?php echo $theme_meta_box['id']; ?> input').clearForm();
				$('#<?php echo $theme_meta_box['id']; ?> textarea').clearForm();
				$('#<?php echo $theme_meta_box['id']; ?> select').clearForm();
			});
			</script>
			<?php } ?>
				<tr id="<?php echo $theme_meta_box['id']; ?>" style="<?php if($$theme_meta_box['variable'] != $theme_meta_box['id']) {echo "display:none";} ?>"><td colspan=2><table>				
			<?php
			break;

			case 'portfolio_theme_admin_close_required':
				echo '</table></td></tr>';
			break;			
		}
	}
	echo '</tbody></table>';
}


function save_post_data( $post_id ) // Function to save Theme data in Post Section
{
	global $theme_name, $short_name, $handle, $theme_meta_boxes;
	// verify this came from the our screen and with proper authorization
	if ( !wp_verify_nonce( $_POST['theme_post_nonce'], $short_name )) {
    return $post_id;
	}
	// verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
    return $post_id;
	// Check permissions
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) )
		return $post_id;
	} else {
		if ( !current_user_can( 'edit_post', $post_id ) )
		return $post_id;
	}
	
	// authenticated OK
	foreach($theme_meta_boxes as $theme_meta_box) {
		$data = $_POST[$theme_meta_box['name'].'_value'];

		if($data == "")
		delete_post_meta($post_id, $theme_meta_box['name']);		
		
		elseif(get_post_meta($post_id, $theme_meta_box['name']) == "")
		add_post_meta($post_id, $theme_meta_box['name'], $data, true);

		elseif($data != get_post_meta($post_id, $theme_meta_box['name'], true))
		update_post_meta($post_id, $theme_meta_box['name'], $data);
	}
}
add_action('admin_menu', 'create_post_boxes');
add_action('admin_menu', 'create_post_portfolio_boxes');
add_action('save_post', 'save_post_data');
?>