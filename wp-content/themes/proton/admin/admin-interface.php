<?php
require_once(THEME_ADMIN . '/admin-options-list.php');

	if($_POST['update_theme'] == 'yes') {
		foreach($theme_admin_boxes as $theme_admin_box) {
			$data = $_POST[$theme_admin_box['name'].'_value'];
			update_option($theme_admin_box['name'], $data); 
		}
	}
?>
<div class="wrap">
	<div id="icon-themes" class="icon32"><br /></div>
	<h2><?php echo $theme_name; ?> Theme Configuration</h2>
	<form method="POST" action="">
		<?php if($_POST['update_theme'] == 'yes') { ?>
			<div class="save"><strong><?php echo $theme_name; ?> settings saved.</strong></div>
		<?php }	?>
		
		<table class="form-table">
			<tbody>
			<?php
			foreach($theme_admin_boxes as $theme_admin_box) {
					switch ( $theme_admin_box['type'] ) {
						case 'text':
							echo '<tr>';
							echo '<td class="left"><p><strong>'.$theme_admin_box['title'].'</strong></p><p class="desc">'.$theme_admin_box['desc'].'</p></td>';
							echo '<td><input type="text" name="'.$theme_admin_box['name'].'_value" value="'.get_option($theme_admin_box['name']).'" size="25" /></td>';
							echo '</tr>';
						break;
						
						case 'textarea':
							echo '<tr>';
							echo '<td class="left"><p><strong>'.$theme_admin_box['title'].'</strong></p><p class="desc">'.$theme_admin_box['desc'].'</p></td>';
							?>
								<td><textarea rows="3" cols="50" name="<?php echo $theme_admin_box['name']."_value"; ?>"><?php echo get_option($theme_admin_box['name']); ?></textarea></td></tr>
							<?php
						break;
						
						case 'radio':
							echo '<tr>';
							echo '<td class="left"><p><strong>'.$theme_admin_box['title'].'</strong></p><p class="desc">'.$theme_admin_box['desc'].'</p></td><td>';
								foreach($theme_admin_box['value'] as $theme_admin_box_value) {
									?>
									<label><input name="<?php echo $theme_admin_box['name']."_value"; ?>" type="radio" value="<?php echo $theme_admin_box_value['sub_value']; ?>" <?php if($theme_admin_box_value['sub_value'] == get_option($theme_admin_box['name'])) { echo 'checked="checked"';} ?>/><?php echo $theme_admin_box_value['sub_desc']; ?></label><br />
									<?php
								}
							echo '</td></tr>';
						break;
						
						case 'checkbox':
							echo '<tr>';
							echo '<td class="left"><p><strong>'.$theme_admin_box['title'].'</strong></p></td>';	?>					
								<td><label><input id="<?php echo $theme_admin_box['id']; ?>" type="checkbox" name="<?php echo $theme_admin_box['name'].'_value'; ?>" value="<?php echo $theme_admin_box['value']; ?>"  <?php if($theme_admin_box['value'] == get_option($theme_admin_box['name'])) { echo 'checked="checked"';} ?>/><?php echo $theme_admin_box['desc']; ?></label></td>
							<?php 
							echo '</tr>';
						break;
						
						case 'open_required': ?>		
						<script type="text/javascript">
						$(document).ready(function() {
							if ($('#<?php echo $theme_admin_box['pre_id']; ?>').attr('checked'))
							{
								$('#<?php echo $theme_admin_box['id']; ?>').show();
								$('#<?php echo $theme_admin_box['pre_id']; ?>').click(function(){
								  $('#<?php echo $theme_admin_box['id']; ?>').slideToggle("slow");
								});

							}
							else {
								$('#<?php echo $theme_admin_box['id']; ?>').hide();
								$('#<?php echo $theme_admin_box['pre_id']; ?>').click(function(){
								  $('#<?php echo $theme_admin_box['id']; ?>').slideToggle("slow");
								});					
							}
						});
						</script>			
						<?php
							echo '<tr><td colspan=2 ><table id="'. $theme_admin_box['id'] .'" style="width:95%;margin-left:5%">';
						break;
						
						case 'close_required':
							echo '</table></td></tr>';
						break;						
					}
				}
			?>
			</tbody>			
		</table>
		<br class="clear" />
		<input type="hidden" name="update_theme" value="yes" />
		<input type="submit" name="submit" value="Update Options" class="button" />
	</form>
</div>