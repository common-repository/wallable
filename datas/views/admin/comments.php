<?php
if (!$this->is_ajax()){
 $this->add_custom_javascript("
 	var user_dialog, comment_dialog;
	function showUser(user_id)
	{
		createScreenLoading();
		jQuery.get(baseUrl+'?wallable_task=showUser', {user_id: user_id, mod: 'rawmode'}, function(data){
			jQuery('#data-user-details').html(data);
			user_dialog.dialog(\"open\");			
			clearScreenLoading();
		});
	}
	function showComment(comment_id)
	{
		createScreenLoading();
		jQuery.get(baseUrl+'?wallable_task=showComment', {comment_id: comment_id, mod: 'rawmode'}, function(data){
			jQuery('#data-comment-details').html(data);
			comment_dialog.dialog(\"open\");
			clearScreenLoading();
		});
	}
	function deleteComment(comment_id)
	{
		if (confirm('Are you sure that will delete all subcomment and current comment?')){
			createScreenLoading();
			jQuery.get(baseUrl+'?wallable_task=delete_comment', {comment_id: comment_id, mod: 'rawmode'}, function(data){
				jQuery('#comment-list').html(data);
				initDatatableComment();
				clearScreenLoading();
			});
		}
	}
	function initDatatableComment()
	{
		jQuery('.table-comments').DataTable({
            'searching'   : true,
            'lengthChange': false,
            \"order\"       : [[ 1, \"desc\" ]]
        });
	}
	jQuery(document).ready(function(){
		var user_form = jQuery('<div />');
		user_form.attr('id', 'user-details');
		user_form.attr('title', '".__('User Infomations', 'wallable')."');
		var user_form_data = jQuery('<div />');
		user_form_data.attr('id', 'data-user-details');
		user_form.append(user_form_data);
		jQuery('body').append(user_form);
		user_dialog = jQuery('#user-details').dialog({
	      	autoOpen: false,
	      	height: 550,
	      	width: 500,
	      	modal: true,
	      	draggable: true,
	      	buttons: {
	        	Cancel: function() {
	          		user_dialog.dialog(\"close\");
	        	}
	      	},
	      	open: function(event, ui) {
			},
	      	close: function() {
	      		
	      	}
	    });
	    var comment_dialog_form = jQuery('<div />');
		comment_dialog_form.attr('id', 'comment-details');
		comment_dialog_form.attr('title', '".__('Comment', 'wallable')."');
		var comment_dialog_form_data = jQuery('<div />');
		comment_dialog_form_data.attr('id', 'data-comment-details');
		comment_dialog_form.append(comment_dialog_form_data);
		jQuery('body').append(comment_dialog_form);
		comment_dialog = jQuery('#comment-details').dialog({
	      	autoOpen: false,
	      	height: 400,
	      	width: 500,
	      	modal: true,
	      	draggable: true,
	      	buttons: {
	        	Cancel: function() {
	          		comment_dialog.dialog(\"close\");
	        	}
	      	},
	      	open: function(event, ui) {
			},
	      	close: function() {
	      	}
	    });
	    initDatatableComment();
	});
", 'comment-list')->burn_media();
} 
?>
<?php if (!$this->is_ajax()):?>
<div id="comment-list">
<?php endif;?>
<table class="wp-list-table widefat fixed striped pages table-comments">
	<thead>
		<tr>
			<th width="25%"><?php echo __('User', 'wallable');?></th>
			<th width="65%"><?php echo __('Comment', 'wallable');?></th>
			<th width="10%"><?php echo __('Action', 'wallable');?></th>
		</tr>
	</thead>
	<tbody>
	<?php $comments = $this->get_comments();?>
	<?php if (count($comments)):?>
	<?php foreach ($comments as $i => $comment):?>
	<tr  class="row<?php echo $i % 2; ?>">
		<?php list($width, $height) = explode('x', get_option('size_of_comment_list', '50x60'));?>
		<td>
			<?php if ($comment->user_comment == 0){
				$user_comment = $comment->user_id;
			}else{
				$user_comment = $comment->user_comment;
			}?>
			<a title="<?php echo $this->get_user_name_display($user_comment);?>" href="javascript:showUser(<?php echo $user_comment?>);">
				<img class="profile-img" width="<?php echo $width;?>px;" height="<?php echo $height;?>px;" alt="<?php echo __('Avatar', 'wallable');?>" src="<?php echo $this->get_profile_img($user_comment);?>" />
			</a>
		</td>
		<td>
			<?php 
			$limit_charactor = (int) get_option('less_of_comment_charactor', '100');
			if (strlen($comment->comment) > $limit_charactor && $limit_charactor > 0){
				echo substr($comment->comment, 0, $limit_charactor).'...';
			}else{
				echo $comment->comment;
			}?>
			<i style="float: right;" onClick="javascript:showComment(<?php echo $comment->id;?>);" title="<?php echo __('Delete this comment', 'wallable');?>" class="icon-show">
				<img src="<?php echo wallable_url;?>/datas/assets/images/show.png"/>
			</i>
		</td>
		<td>
			<i class="icon-delete" title="<?php echo __('Delete this comment', 'wallable');?>" onClick="javascript:deleteComment(<?php echo $comment->id;?>);">
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