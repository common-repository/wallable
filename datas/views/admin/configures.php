<?php
$this->add_custom_javascript("
	function saveConfigs()
	{
		createScreenLoading();
		var config_fields = new Array(), i=0;
		jQuery('table.table-config-field-list').find('input').each(function(){
			config_fields[i++] = {'name': jQuery(this).attr('name'), 'value': jQuery(this).val()};			
		});
		jQuery('table.table-config-field-list').find('select').each(function(){
			config_fields[i++] = {'name': jQuery(this).attr('name'), 'value': jQuery(this).val()};			
		});
		jQuery.get(baseUrl+'?wallable_task=save_configs', {config_fields: config_fields}, function(){
			clearScreenLoading();
		});
	}
")->burn_media();
$this->add_custom_style("
	table.table-config-field-list input{
		width: 400px;
	}
	button.btn-save{
		margin-left: 270px!important; 
		height: 45px!important; 
		line-height: 45px!important; 
	}
")->burn_media();
?>
<table class="wp-list-table widefat fixed striped pages table-config-field-list">
	<thead>
		<tr>
			<th width="250px"><?php echo __('Field Name', 'wallable');?></th>
			<th width="80%"><?php echo __('Value', 'wallable');?></th>
		</tr>
	</thead>
	<tbody>
	<tr>
		<td><?php echo __('Total activities log display', 'wallable');?></td>
		<td>
			<input type="text" name="total_activities_log_display" value="<?php echo get_option('total_activities_log_display', '50');?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Width & Height dashboard IMG', 'wallable');?></td>
		<td>
			<input type="text" name="dashboard_img_size" value="<?php echo get_option('dashboard_img_size', '80x85');?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Width & Height profile IMG', 'wallable');?></td>
		<td>
			<input type="text" name="profile_img_size" value="<?php echo get_option('profile_img_size', '120x150');?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Width & Height cover IMG', 'wallable');?></td>
		<td>
			<input type="text" name="cover_img_size" value="<?php echo get_option('cover_img_size', '800x500');?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Width & Height Avatar Comment', 'wallable');?></td>
		<td>
			<input type="text" name="avatar_img_size" value="<?php echo get_option('avatar_img_size', '50x60');?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Width & Height Avatar Follow', 'wallable');?></td>
		<td>
			<input type="text" name="follow_img_size" value="<?php echo get_option('follow_img_size', '50x60');?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Font Style of Comment', 'wallable');?></td>
		<td>
			<select name="font_style_of_comment">
				<?php $active_style = get_option('font_style_of_comment', 'normal');?>
				<option value="inherit" <?php if ($active_style=='inherit'){echo ' selected="selected"';}?>><?php echo __('inherit', 'wallable');?></option>
				<option value="italic" <?php if ($active_style=='italic'){echo ' selected="selected"';}?>><?php echo __('italic', 'wallable');?></option>
				<option value="normal" <?php if ($active_style=='normal'){echo ' selected="selected"';}?>><?php echo __('normal', 'wallable');?></option>
				<option value="oblique" <?php if ($active_style=='oblique'){echo ' selected="selected"';}?>><?php echo __('oblique', 'wallable');?></option>
			</select>
		</td>
	</tr>
	<tr>
		<td><?php echo __('Font Size of Comment', 'wallable');?></td>
		<td>
			<input type="text" name="font_size_of_comment" value="<?php echo get_option('font_size_of_comment', '12px');?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Color of Comment', 'wallable');?></td>
		<td>
			<input type="text" name="color_of_comment" value="<?php echo get_option('color_of_comment', '#333333');?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Size Image Of Comment List', 'wallable');?></td>
		<td>
			<input type="text" name="size_of_comment_list" value="<?php echo get_option('size_of_comment_list', '50x60');?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Size Image Of Activity List', 'wallable');?></td>
		<td>
			<input type="text" name="size_of_activitylog_list" value="<?php echo get_option('size_of_activitylog_list', '50x60');?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Size Image Of Connection & Followers & Followings List', 'wallable');?></td>
		<td>
			<input type="text" name="size_of_show_list" value="<?php echo get_option('size_of_show_list', '50x60');?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Size Image Of Profile List', 'wallable');?></td>
		<td>
			<input type="text" name="size_of_profile_list" value="<?php echo get_option('size_of_profile_list', '50x60');?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Allow friend write main comment', 'wallable');?></td>
		<td>
			<select name="allow_friend_write_main_comment">
				<?php $active_style = get_option('allow_friend_write_main_comment', 'yes');?>
				<option value="yes" <?php if ($active_style=='yes'){echo ' selected="selected"';}?>><?php echo __('Yes', 'wallable');?></option>
				<option value="no" <?php if ($active_style=='no'){echo ' selected="selected"';}?>><?php echo __('No', 'wallable');?></option>				
			</select>
		</td>
	</tr>
	<tr>
		<td><?php echo __('Less of comment charactor back-end', 'wallable');?></td>
		<td>
			<input type="text" name="less_of_comment_charactor" value="<?php echo get_option('less_of_comment_charactor', '100');?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Number comment show each history', 'wallable');?></td>
		<td>
			<input type="text" name="number_comment_show_each_history" value="<?php echo get_option('number_comment_show_each_history', 10);?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Number comment show each activites follow log', 'wallable');?></td>
		<td>
			<input type="text" name="number_comment_show_each_activities_follow_log" value="<?php echo get_option('number_comment_show_each_activities_follow_log', 20);?>" />
		</td>
	</tr>
	<tr>
		<td><?php echo __('Show activities logs in Dashboard', 'wallable');?></td>
		<td>
			<select name="show_activities_log_in_dashboard">
				<?php $show = get_option('show_activities_log_in_dashboard', 'no');?>
				<option <?php if ($show == 'yes'){echo 'selected="selected"';}?> value="yes"><?php echo __('Yes', 'wallable');?></option>
				<option <?php if ($show == 'no'){echo 'selected="selected"';}?> value="no"><?php echo __('No', 'wallable');?></option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<button class="button btn-save" type="button" onClick="javascript:saveConfigs();">
				<i class="icon-save" style="float: left;" title="<?php echo __('Save', 'wallable');?>">
					<img src="<?php echo wallable_url;?>/datas/assets/images/save.png"/>
				</i>
				<?php echo __('Save configures', 'searchfriend');?>
			</button>
		</td>
	</tr>
	</tbody>
</table>
