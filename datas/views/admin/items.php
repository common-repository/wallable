<?php
if (!$this->is_ajax()){
 $this->add_custom_javascript("
 	function addItem(item_id)
	{
		if (item_id != undefined){
			var url = baseUrl+'?wallable_task=add_item&item_id='+item_id;
		}else{
			var url = baseUrl+'?wallable_task=add_item';
		}
	    createScreenLoading();
	    var editItem = jQuery('<div></div>')
               .html('<iframe id=\"iframe-add-item\" style=\"border: 0px; \" src=\"' + url + '\" width=\"100%\" height=\"100%\"></iframe>')
               .dialog({
                    autoOpen: false,
                    modal: true,
                    height: 300,
                    width: 350,
                    title: \"".__('Edit/Add Item', 'wallable')."\",
                    modal: true,
			      	draggable: true,
			      	buttons: {
			      		'Save': function(){
			      			jQuery('iframe#iframe-add-item').contents().find('form#form-edit-item').submit();
			      			setTimeout(function(){
			      			jQuery.get(baseUrl+'?wallable_task=load-item-list', function(data){
								jQuery('#item-list').html(data);
								initDatatableItem();
								editItem.dialog(\"close\");
								clearScreenLoading();
							})}, 500);
			      		},
			        	Cancel: function() {
			          		editItem.dialog(\"close\");
			        	}
			      	},
			      	open: function(event, ui) {
			      		jQuery('iframe#iframe-add-item').load(function(){
			      			clearScreenLoading();
			      		});
					},
			      	close: function() {
			      	}
               });
	   editItem.dialog('open');
	}
	function deleteItem(item_id)
	{
		if (confirm('Are you sure that will do delete this item?')){
			createScreenLoading();
			jQuery.get(baseUrl+'?wallable_task=delete_item', {item_id: item_id, mod: 'rawmode'}, function(data){
				jQuery('#item-list').html(data);
				initDatatableItem();
				clearScreenLoading();
			});
		}
	}
	function initDatatableItem()
	{
		jQuery('.table-items').DataTable({
            'searching'   : true,
            'lengthChange': false,
            \"order\"       : [[ 1, \"desc\" ]]
        });
	}
	jQuery(document).ready(function(){
	    initDatatableItem();
	});
", 'item-list')->burn_media();
} 
?>
<?php if (!$this->is_ajax()):?>
<div id="item-list">
<?php endif;?>
<div class="item-add"><i title="<?php echo __('Add item', 'wallable');?>" class="add-icon" onClick="javascript:addItem();">&nbsp;</i><?php echo __('Add link item to show on dashboard of each User', 'wallable');?></div>
<table class="wp-list-table widefat fixed striped pages table-items">
	<thead>
		<tr>
			<th width="25%"><?php echo __('Item', 'wallable');?></th>
			<th width="65%"><?php echo __('Name', 'wallable');?></th>
			<th width="10%"><?php echo __('Action', 'wallable');?></th>
		</tr>
	</thead>
	<tbody>
	<?php $items = $this->get_items();?>
	<?php if (count($items)):?>
	<?php foreach ($items as $i => $item):?>
	<tr  class="row<?php echo $i % 2; ?>">
		<?php list($width, $height) = explode('x', get_option('dashboard_img_size', '120x150'));?>
		<td>
			<a title="<?php echo $item->name;?>" href="javascript:addItem(<?php echo $item->id?>);">
				<img class="item-image" width="<?php echo $width;?>px;" height="<?php echo $height;?>px;" alt="<?php echo __('Dashboard', 'wallable');?>" src="<?php echo $this->get_dashboard_img($item->id);?>" />
			</a>
		</td>
		<td>
			<?php echo $item->name;?>
		</td>
		<td>
			<i class="icon-delete" title="<?php echo __('Delete this item', 'wallable');?>" onClick="javascript:deleteItem(<?php echo $item->id;?>);">
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