<?php
if (!$this->is_ajax()){
 $this->add_custom_javascript("
	function deleteProfile(profile_id)
	{
		if (confirm('Are you sure that will do delete this profile?')){
			createScreenLoading();
			jQuery.get(baseUrl+'?wallable_task=delete_profile', {profile_id: profile_id, mod: 'rawmode'}, function(data){
				jQuery('#profile-list').html(data);
				initDatatableProfile();
				clearScreenLoading();
			});
		}
	}
	function initDatatableProfile()
	{
		jQuery('.table-profiles').DataTable({
            'searching'   : true,
            'lengthChange': false,
            \"order\"       : [[ 1, \"desc\" ]]
        });
	}
	jQuery(document).ready(function(){
	    initDatatableProfile();
	});
", 'profile-list')->burn_media();
} 
?>
<?php if (!$this->is_ajax()):?>
<div id="profile-list">
<?php endif;?>
<table class="wp-list-table widefat fixed striped pages table-profiles">
	<thead>
		<tr>
			<th width="25%"><?php echo __('Profile', 'wallable');?></th>
			<th width="65%"><?php echo __('Create at', 'wallable');?></th>
			<th width="10%"><?php echo __('Action', 'wallable');?></th>
		</tr>
	</thead>
	<tbody>
	<?php $profiles = $this->get_profiles();?>
	<?php if (count($profiles)):?>
	<?php foreach ($profiles as $i => $profile):?>
	<tr  class="row<?php echo $i % 2; ?>">
		<?php list($width, $height) = explode('x', get_option('size_of_profile_list', '50x60'));?>
		<td>
			<a title="<?php echo $this->get_user_name_display($profile->user_id);?>" href="javascript:showUser(<?php echo $user_comment?>);">
				<img class="profile-img" width="<?php echo $width;?>px;" height="<?php echo $height;?>px;" alt="<?php echo __('Avatar', 'wallable');?>" src="<?php echo $this->get_profile_img($profile->user_id);?>" />
			</a>
		</td>
		<td>
			<?php echo $profile->created_at;?>
		</td>
		<td>
			<i class="icon-delete" title="<?php echo __('Delete this pofile', 'wallable');?>" onClick="javascript:deleteProfile(<?php echo $profile->id;?>);">
				<img src="<?php echo wallable_url;?>/datas/assets/images/delete.png"/>
			</i>
		</td>
	</tr>
	<?php endforeach;?>
	<?php endif;?>
	</tbody>
</table>
<?php if (!$this->is_ajax()):?>
</div>
<?php endif;?>