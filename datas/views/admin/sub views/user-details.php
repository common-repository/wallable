<?php
$basic_infomation = $this->get_profile_data(); 
?>
<div id="edit-full-info">
	<table class="wp-list-table widefat fixed striped pages">
	<tbody>
		<tr>
			<td>
				<?php echo __('Full Name', 'wallable');?>
			</td>
			<td>
				<?php echo $basic_infomation->fullname;?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo __('Country', 'wallable');?>
			</td>
			<td>
				<?php echo $basic_infomation->country;?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo __('Address', 'wallable');?>
			</td>
			<td>
				<?php echo $basic_infomation->address;?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo __('Birthday', 'wallable');?>
			</td>
			<td>
				<?php echo $basic_infomation->birthday;?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo __('Work At', 'wallable');?>
			</td>
			<td>
				<?php echo $basic_infomation->work_at;?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo __('Hooligan', 'wallable');?>
			</td>
			<td>
				<?php echo $basic_infomation->hooligan;?>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo __('Facebook URL', 'wallable');?>
			</td>
			<td>
				<a target="_blank" href="<?php echo $basic_infomation->facebook;?>"><?php echo $basic_infomation->facebook;?></a>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo __('Twitter URL', 'wallable');?>
			</td>
			<td>
				<a target="_blank" href="<?php echo $basic_infomation->twitter;?>"><?php echo $basic_infomation->twitter;?></a>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo __('Google+ URL', 'wallable');?>
			</td>
			<td>
				<a target="_blank" href="<?php echo $basic_infomation->google;?>"><?php echo $basic_infomation->google;?></a>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo __('Instagram URL', 'wallable');?>
			</td>
			<td>
				<a target="_blank" href="<?php echo $basic_infomation->instagram;?>"><?php echo $basic_infomation->instagram;?></a>
			</td>
		</tr>
		<tr>
			<td>
				<?php echo __('Linkedin URL', 'wallable');?>
			</td>
			<td>
				<a target="_blank" href="<?php echo $basic_infomation->linkedin;?>"><?php echo $basic_infomation->linkedin;?></a>
			</td>
		</tr>
	</tbody>
	</table>
</div>