<?php
?>
<form id="form-edit-item" action="<?php echo get_site_url().'/wp-admin/index.php?wallable_task=save_item&mod=rawmode';?>" method="post" enctype="multipart/form-data">
<table class="wp-list-table widefat fixed striped pages">
	<tbody>
	<?php $item = $this->get_item_data($_REQUEST['item_id']);?>
	<?php if (is_object($item)):?>
	<tr>
		<td width="70"><?php echo __('Name', 'wallable');?></td>
		<td><input type="text" name="name" id="name" value="<?php echo $item->name;?>"/></td>
	</tr>
	<tr>
		<td width="70"><?php echo __('Image', 'wallable');?></td>
		<td><input type="file" name="image" id=""image"" value=""/></td>
	</tr>
	<tr>
		<td width="70"><?php echo __('URL', 'wallable');?></td>
		<td><input type="text" name="url" id=""url"" value="<?php echo $item->url;?>"/></td>
	</tr>
	<tr>
		<td width="70"><?php echo __('Target', 'wallable');?></td>
		<td><input type="text" name="target" id="target" value="<?php echo $item->target;?>"/></td>
	</tr>
	<input type="hidden" name="item_id" id="item_id" value="<?php echo $item->id;?>"/></td>
	<?php endif;?>
	</tbody>
</table>
</form>