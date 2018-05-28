<?php $_result='<script>
<!--
var ContactFields = function(id){
	this.id = id;
};

ContactFields.prototype = {
	init_sortable : function() {
		jQuery("ul#fields_list").sortable({
			handle: \'.sortable-selector\',
			placeholder: \'<div class="dropzone">\' + ' . $_functions->escapejs(LangLoader::get_message('position.drop_here', 'common')) . ' + \'</div>\'
		});
	},
	serialize_sortable : function() {
		jQuery(\'#tree\').val(JSON.stringify(this.get_sortable_sequence()));
	},
	get_sortable_sequence : function() {
		var sequence = jQuery("ul#fields_list").sortable("serialize").get();
		return sequence[0];
	},
	change_reposition_pictures : function() {
		sequence = this.get_sortable_sequence();
		var length = sequence.length;
		for(var i = 0; i < length; i++)
		{
			if (jQuery(\'#list-\' + sequence[i].id).is(\':first-child\'))
				jQuery("#move-up-" + sequence[i].id).hide();
			else
				jQuery("#move-up-" + sequence[i].id).show();
			
			if (jQuery(\'#list-\' + sequence[i].id).is(\':last-child\'))
				jQuery("#move-down-" + sequence[i].id).hide();
			else
				jQuery("#move-down-" + sequence[i].id).show();
		}
	}
};

var ContactField = function(id, contact_fields){
	this.id = id;
	this.ContactFields = contact_fields;
	
	';if ($_data->is_true($_data->get('C_MORE_THAN_ONE_FIELD'))){$_result.='
	this.ContactFields.change_reposition_pictures();
	';}$_result.='
};

ContactField.prototype = {
	delete : function() {
		if (confirm(' . $_functions->escapejs(LangLoader::get_message('confirm.delete', 'status-messages-common')) . '))
		{
			jQuery.ajax({
				url: \'' . $_functions->relative_url(ContactUrlBuilder::delete_field()) . '\',
				type: "post",
				dataType: "json",
				data: {\'id\' : this.id, \'token\' : \'' . $_data->get('TOKEN') . '\'},
				success: function(returnData){
					if (returnData.code > 0) {
						jQuery("#list-" + returnData.code).remove();
						ContactFields.init_sortable();
					}
				}
			});
		}
	},
	change_display : function() {
		jQuery("#change-display-" + this.id).html(\'<i class="fa fa-spin fa-spinner"></i>\');
		jQuery.ajax({
			url: \'' . $_functions->relative_url(ContactUrlBuilder::change_display()) . '\',
			type: "post",
			dataType: "json",
			data: {\'id\' : this.id, \'token\' : \'' . $_data->get('TOKEN') . '\'},
			success: function(returnData){
				if (returnData.id > 0) {
					if (returnData.display) {
						jQuery("#change-display-" + returnData.id).html(\'<i class="fa fa-eye" title="' . $_functions->i18n('field.display') . '"></i>\');
					} else {
						jQuery("#change-display-" + returnData.id).html(\'<i class="fa fa-eye-slash" title="' . $_functions->i18n('field.not_display') . '"></i>\');
					}
				}
			}
		});
	}
};

var ContactFields = new ContactFields(\'fields_list\');
jQuery(document).ready(function() {
	ContactFields.init_sortable();
	jQuery(\'li.sortable-element\').on(\'mouseout\',function(){
		ContactFields.change_reposition_pictures();
	});
});
-->
</script>
';$_subtpl=$_data->get('MSG');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
<form action="' . $_data->get('REWRITED_SCRIPT') . '" method="post" onsubmit="ContactFields.serialize_sortable();">
	<fieldset id="contact_fields_management">
	<legend>' . LangLoader::get_message('admin.fields.manage', 'common', 'contact') . '</legend>
		<ul id="fields_list" class="sortable-block">
			';foreach($_data->get_block('fields_list') as $_tmp_fields_list){$_result.='
				<li class="sortable-element" id="list-' . $_data->get_from_list('ID', $_tmp_fields_list) . '" data-id="' . $_data->get_from_list('ID', $_tmp_fields_list) . '">
					<div class="sortable-selector" title="' . LangLoader::get_message('position.move', 'common') . '"></div>
					<div class="sortable-title">
						' . $_data->get_from_list('NAME', $_tmp_fields_list) . '
						<div class="sortable-actions">
							' . $_functions->i18n('field.required') . ' : ';if ($_data->is_true($_data->get_from_list('C_REQUIRED', $_tmp_fields_list))){$_result.='' . LangLoader::get_message('yes', 'common') . '';}else{$_result.='' . LangLoader::get_message('no', 'common') . '';}$_result.='
							';if ($_data->is_true($_data->get('C_MORE_THAN_ONE_FIELD'))){$_result.='
							<a href="" title="' . LangLoader::get_message('position.move_up', 'common') . '" id="move-up-' . $_data->get_from_list('ID', $_tmp_fields_list) . '" onclick="return false;"><i class="fa fa-arrow-up"></i></a>
							<a href="" title="' . LangLoader::get_message('position.move_down', 'common') . '" id="move-down-' . $_data->get_from_list('ID', $_tmp_fields_list) . '" onclick="return false;"><i class="fa fa-arrow-down"></i></a>
							';}$_result.='
							<a href="' . $_data->get_from_list('U_EDIT', $_tmp_fields_list) . '" title="' . LangLoader::get_message('edit', 'common') . '"><i class="fa fa-edit"></i></a>
							';if ($_data->is_true($_data->get_from_list('C_DELETE', $_tmp_fields_list))){$_result.='<a href="" onclick="return false;" title="' . LangLoader::get_message('delete', 'common') . '" id="delete-' . $_data->get_from_list('ID', $_tmp_fields_list) . '"><i class="fa fa-delete"></i></a>';}else{$_result.='&nbsp;';}$_result.='
							';if (!$_data->is_true($_data->get_from_list('C_READONLY', $_tmp_fields_list))){$_result.='<a href="" onclick="return false;" id="change-display-' . $_data->get_from_list('ID', $_tmp_fields_list) . '"><i ';if ($_data->is_true($_data->get_from_list('C_DISPLAY', $_tmp_fields_list))){$_result.='class="fa fa-eye" title="' . $_functions->i18n('field.display') . '"';}else{$_result.='class="fa fa-eye-slash" title="' . $_functions->i18n('field.not_display') . '"';}$_result.='></i></a>';}else{$_result.='&nbsp;';}$_result.='
						</div>
					</div>
					<div class="spacer"></div>
					<script>
					<!--
					jQuery(document).ready(function() {
						var contact_field = new ContactField(' . $_data->get_from_list('ID', $_tmp_fields_list) . ', ContactFields);
						
						';if ($_data->is_true($_data->get_from_list('C_DELETE', $_tmp_fields_list))){$_result.='
						jQuery("#delete-' . $_data->get_from_list('ID', $_tmp_fields_list) . '").on(\'click\',function(){
							contact_field.delete();
						});
						';}$_result.='
						
						';if (!$_data->is_true($_data->get_from_list('C_READONLY', $_tmp_fields_list))){$_result.='
						jQuery("#change-display-' . $_data->get_from_list('ID', $_tmp_fields_list) . '").on(\'click\',function(){
							contact_field.change_display();
						});
						';}$_result.='
						
						';if ($_data->is_true($_data->get('C_MORE_THAN_ONE_FIELD'))){$_result.='
						jQuery("#move-up-' . $_data->get_from_list('ID', $_tmp_fields_list) . '").on(\'click\',function(){
							var li = jQuery(this).closest(\'li\');
							li.insertBefore( li.prev() );
							ContactFields.change_reposition_pictures();
						});
						
						jQuery("#move-down-' . $_data->get_from_list('ID', $_tmp_fields_list) . '").on(\'click\',function(){
							var li = jQuery(this).closest(\'li\');
							li.insertAfter( li.next() );
							ContactFields.change_reposition_pictures();
						});
						';}$_result.='
					});
					-->
					</script>
				</li>
			';}$_result.='
		</ul>
	</fieldset>
	';if ($_data->is_true($_data->get('C_MORE_THAN_ONE_FIELD'))){$_result.='
	<fieldset class="fieldset-submit">
		<button type="submit" name="submit" value="true" class="submit">' . LangLoader::get_message('position.update', 'common') . '</button>
		<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
		<input type="hidden" name="tree" id="tree" value="">
	</fieldset>
	';}$_result.='
</form>
'; ?>