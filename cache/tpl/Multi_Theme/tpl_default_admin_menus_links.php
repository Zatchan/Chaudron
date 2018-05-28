<?php $_result='<script>
<!--
function check_form()
{
	if(document.getElementById(\'menu_element_' . $_data->get('ID') . '_name\').value == "") {
		alert("' . $_data->get('L_REQUIRE_NAME') . '");
		return false;
	}
	return true;
}

var idMax = ' . $_data->get('ID_MAX') . ';

function initSortableMenu() {
	jQuery("ul#menu_element_' . $_data->get('ID') . '_list").sortable({
		handle: \'.sortable-selector\',
		placeholder: \'<div class="dropzone">\' + ' . $_functions->escapejs(LangLoader::get_message('position.drop_here', 'common')) . ' + \'</div>\'
	}); 
}

function get_sortable_sequence() {
	var sequence = jQuery("ul#menu_element_' . $_data->get('ID') . '_list").sortable("serialize").get();
	return sequence[0];
}

function build_menu_elements_tree() {
	jQuery(\'#menu_tree\').val(JSON.stringify(get_sortable_sequence()));
}

function toggleProperties(id) {
	if (jQuery("#menu_element_" + id + "_properties").is(\':hidden\'))
	{   //Si les propriétés sont repliées, on les affiche
		jQuery("#menu_element_" + id + "_properties").fadeIn();
		jQuery("#menu_element_" + id + "_more_image").html(\'<i class="fa fa-minus"></i>\');
	}
	else
	{   //Sinon, on les cache
		jQuery("#menu_element_" + id + "_properties").fadeOut();
		jQuery("#menu_element_" + id + "_more_image").html(\'<i class="fa fa-cog"></i>\');
	}
}

var authForm = ' . $_data->get('J_AUTH_FORM') . ';
function getAuthForm(id) {
	return authForm.replace(/##UID##/g, id);
}

function addSubElement(menu_element_id) {
	var id = idMax++;
	
	jQuery(\'<li/>\', {id : \'menu_element_\' + id, \'data-id\' : id, class : \'sortable-element\'}).appendTo(\'#\' + menu_element_id + \'_list\');
	jQuery(\'<div/>\', {class : \'sortable-selector\', title : ' . $_functions->escapejs(LangLoader::get_message('position.move', 'common')) . '}).appendTo(\'#menu_element_\' + id);
	jQuery(\'<div/>\', {id : \'menu_title_\' + id, class : \'sortable-title\'}).appendTo(\'#menu_element_\' + id);
	
	jQuery(\'<i/>\', {class : \'fa fa-globe\'}).appendTo(\'#menu_title_\' + id);
	jQuery(\'#menu_title_\' + id).append(\' \');
	
	jQuery(\'<label/>\', {for : \'menu_element_\' + id + \'_name\'}).text(' . $_data->get('JL_NAME') . ' + \' \').appendTo(\'#menu_title_\' + id);
	jQuery(\'<input/>\', {type : \'text\', id : \'menu_element_\' + id + \'_name\', name : \'menu_element_\' + id + \'_name\', placeholder : ' . $_data->get('JL_ADD_SUB_ELEMENT') . '}).appendTo(\'#menu_title_\' + id);
	jQuery(\'#menu_title_\' + id).append(\' \');
	
	jQuery(\'<label/>\', {for : \'menu_element_\' + id + \'_url\'}).text(' . $_data->get('JL_URL') . ' + \' \').appendTo(\'#menu_title_\' + id);
	jQuery(\'<input/>\', {type : \'text\', id : \'menu_element_\' + id + \'_url\', name : \'menu_element_\' + id + \'_url\'}).appendTo(\'#menu_title_\' + id);
	jQuery(\'#menu_title_\' + id).append(\' \');
	
	jQuery(\'<label/>\', {for : \'menu_element_\' + id + \'_image\'}).text(' . $_data->get('JL_IMAGE') . ' + \' \').appendTo(\'#menu_title_\' + id);
	jQuery(\'<input/>\', {type : \'text\', id : \'menu_element_\' + id + \'_image\', name : \'menu_element_\' + id + \'_image\', onblur: "image_preview(this,menu_element_" + id + "_image_preview)"}).appendTo(\'#menu_title_\' + id);
	jQuery(\'<span/>\', {id : \'menu_element_\' + id + \'_image_preview_span\', class : \'preview\'}).appendTo(\'#menu_title_\' + id);
	jQuery(\'<img/>\', {id : \'menu_element_\' + id + \'_image_preview\'}).appendTo(\'#menu_element_\' + id + \'_image_preview_span\');
	
	jQuery(\'<div/>\', {id : \'menu_element_\' + id + \'_actions\', class : \'sortable-actions\'}).appendTo(\'#menu_title_\' + id);
	jQuery(\'<a/>\', {id : \'menu_element_\' + id + \'_more_image\', title : ' . $_data->get('JL_MORE') . ', onclick: \'toggleProperties(\' + id + \');return false;\'}).html(\'<i class="fa fa-cog"></i>\').appendTo(\'#menu_element_\' + id + \'_actions\');
	jQuery(\'#menu_element_\' + id + \'_actions\').append(\' \');
	jQuery(\'<a/>\', {id : \'menu_element_\' + id + \'_delete_image\', title : ' . $_data->get('JL_DELETE') . ', onclick: \'deleteElement(\\\'menu_element_\' + id + \'\\\');return false;\'}).html(\'<i class="fa fa-delete"></i>\').appendTo(\'#menu_element_\' + id + \'_actions\');
	
	jQuery(\'<div/>\', {class : \'spacer\'}).appendTo(\'#menu_element_\' + id);
	
	jQuery(\'<fieldset/>\', {id : \'menu_element_\' + id + \'_properties\', style : \'display:none;\'}).appendTo(\'#menu_element_\' + id);
	jQuery(\'<legend/>\').text(' . $_data->get('JL_PROPERTIES') . ').appendTo(\'#menu_element_\' + id + \'_properties\');
	jQuery(\'<div/>\', {id : \'menu_element_\' + id + \'_authorizations\', class : \'form-element\'}).appendTo(\'#menu_element_\' + id + \'_properties\');
	jQuery(\'<label/>\', {for : \'menu_element_\' + id + \'_auth_div\'}).text(' . $_data->get('JL_AUTHORIZATIONS') . ' + \' \').appendTo(\'#menu_element_\' + id + \'_authorizations\');
	jQuery(\'<div/> \', {class : \'form-field\'}).html(getAuthForm(id)).appendTo(\'#menu_element_\' + id + \'_authorizations\');
	
	initSortableMenu();
}

function addSubMenu(menu_element_id) {
	var id = idMax++;
	
	jQuery(\'<li/>\', {id : \'menu_element_\' + id, \'data-id\' : id, class : \'sortable-element\'}).appendTo(\'#\' + menu_element_id + \'_list\');
	jQuery(\'<div/>\', {class : \'sortable-selector\', title : ' . $_functions->escapejs(LangLoader::get_message('position.move', 'common')) . '}).appendTo(\'#menu_element_\' + id);
	jQuery(\'<div/>\', {id : \'menu_title_\' + id, class : \'sortable-title\'}).appendTo(\'#menu_element_\' + id);
	
	jQuery(\'<i/>\', {class : \'fa fa-folder\'}).appendTo(\'#menu_title_\' + id);
	jQuery(\'#menu_title_\' + id).append(\' \');
	
	jQuery(\'<label/>\', {for : \'menu_element_\' + id + \'_name\'}).text(' . $_data->get('JL_NAME') . ' + \' \').appendTo(\'#menu_title_\' + id);
	jQuery(\'<input/>\', {type : \'text\', id : \'menu_element_\' + id + \'_name\', name : \'menu_element_\' + id + \'_name\', placeholder : ' . $_data->get('JL_ADD_SUB_MENU') . '}).appendTo(\'#menu_title_\' + id);
	jQuery(\'#menu_title_\' + id).append(\' \');
	
	jQuery(\'<label/>\', {for : \'menu_element_\' + id + \'_url\'}).text(' . $_data->get('JL_URL') . ' + \' \').appendTo(\'#menu_title_\' + id);
	jQuery(\'<input/>\', {type : \'text\', id : \'menu_element_\' + id + \'_url\', name : \'menu_element_\' + id + \'_url\'}).appendTo(\'#menu_title_\' + id);
	jQuery(\'#menu_title_\' + id).append(\' \');
	
	jQuery(\'<label/>\', {for : \'menu_element_\' + id + \'_image\'}).text(' . $_data->get('JL_IMAGE') . ' + \' \').appendTo(\'#menu_title_\' + id);
	jQuery(\'<input/>\', {type : \'text\', id : \'menu_element_\' + id + \'_image\', name : \'menu_element_\' + id + \'_image\', onblur: "image_preview(this,menu_element_" + id + "_image_preview)"}).appendTo(\'#menu_title_\' + id);
	jQuery(\'<span/>\', {id : \'menu_element_\' + id + \'_image_preview_span\', class : \'preview\'}).appendTo(\'#menu_title_\' + id);
	jQuery(\'<img/>\', {id : \'menu_element_\' + id + \'_image_preview\'}).appendTo(\'#menu_element_\' + id + \'_image_preview_span\');
	
	jQuery(\'<div/>\', {id : \'menu_element_\' + id + \'_actions\', class : \'sortable-actions\'}).appendTo(\'#menu_title_\' + id);
	jQuery(\'<a/>\', {id : \'menu_element_\' + id + \'_more_image\', title : ' . $_data->get('JL_MORE') . ', onclick: \'toggleProperties(\' + id + \');return false;\'}).html(\'<i class="fa fa-cog"></i>\').appendTo(\'#menu_element_\' + id + \'_actions\');
	jQuery(\'#menu_element_\' + id + \'_actions\').append(\' \');
	jQuery(\'<a/>\', {id : \'menu_element_\' + id + \'_delete_image\', title : ' . $_data->get('JL_DELETE') . ', onclick: \'deleteElement(\\\'menu_element_\' + id + \'\\\');return false;\'}).html(\'<i class="fa fa-delete"></i>\').appendTo(\'#menu_element_\' + id + \'_actions\');
	
	jQuery(\'<div/>\', {class : \'spacer\'}).appendTo(\'#menu_element_\' + id);
	
	jQuery(\'<fieldset/>\', {id : \'menu_element_\' + id + \'_properties\', style : \'display:none;\'}).appendTo(\'#menu_element_\' + id);
	jQuery(\'<legend/>\').text(' . $_data->get('JL_PROPERTIES') . ').appendTo(\'#menu_element_\' + id + \'_properties\');
	jQuery(\'<div/>\', {id : \'menu_element_\' + id + \'_authorizations\', class : \'form-element\'}).appendTo(\'#menu_element_\' + id + \'_properties\');
	jQuery(\'<label/>\', {for : \'menu_element_\' + id + \'_auth_div\'}).text(' . $_data->get('JL_AUTHORIZATIONS') . ' + \' \').appendTo(\'#menu_element_\' + id + \'_authorizations\');
	jQuery(\'<div/> \', {class : \'form-field\'}).html(getAuthForm(id)).appendTo(\'#menu_element_\' + id + \'_authorizations\');
	
	jQuery(\'<hr/>\').appendTo(\'#menu_element_\' + id);
	jQuery(\'<ul/>\', {id : \'menu_element_\' + id + \'_list\', class : \'sortable-block\'}).appendTo(\'#menu_element_\' + id);
	
	jQuery(\'<fieldset/>\', {id : \'menu_element_\' + id + \'_buttons\', class : \'fieldset-submit\'}).appendTo(\'#menu_element_\' + id);
	jQuery(\'<button/>\', {type : \'button\', id : \'menu_element_\' + id + \'_add_sub_element\', name : \'menu_element_\' + id + \'_add_sub_element\', value : ' . $_data->get('JL_ADD_SUB_ELEMENT') . ', onclick : \'addSubElement(\\\'menu_element_\' + id + \'\\\');\'}).text(' . $_data->get('JL_ADD_SUB_ELEMENT') . ').appendTo(\'#menu_element_\' + id + \'_buttons\');
	jQuery(\'#menu_element_\' + id + \'_buttons\').append(\' \');
	
	jQuery(\'<button/>\', {type : \'button\', id : \'menu_element_\' + id + \'_add_sub_menu\', name : \'menu_element_\' + id + \'_add_sub_menu\', value : ' . $_data->get('JL_ADD_SUB_MENU') . ', onclick : \'addSubMenu(\\\'menu_element_\' + id + \'\\\');\'}).text(' . $_data->get('JL_ADD_SUB_MENU') . ').appendTo(\'#menu_element_\' + id + \'_buttons\');
	
	addSubElement(\'menu_element_\' + id);
}

function deleteElement(element_id)
{
	if (confirm(' . $_data->get('JL_DELETE_ELEMENT') . '))
	{
		jQuery(\'#\' + element_id).remove();
		initSortableMenu();
	}
}

function image_preview(input,image)
{
	var url = input.value;
	
	jQuery.ajax({
		url: PATH_TO_ROOT + "/kernel/framework/ajax/dispatcher.php?url=/url_validation/",
		type: "post",
		dataType: "json",
		async: false,
		data: {url_to_check : url, token : TOKEN},
		success: function(returnData){
			if (returnData.is_valid == 1)
			{
				if (url.charAt(0) == \'/\')
					image.src = PATH_TO_ROOT + url;
				else
					image.src = url;
				
				jQuery(\'#\' + image.id).show();
			}
			else
			{
				image.src = \'\';
				jQuery(\'#\' + image.id).hide();
			}
		},
		error: function(returnData){
			image.src = \'\';
			jQuery(\'#\' + image.id).hide();
		}
	});
}

jQuery(document).ready(function() {
	initSortableMenu();
});
-->
</script>
<div id="admin-contents">
	<form action="links.php?action=save" method="post" class="fieldset-content" onsubmit="build_menu_elements_tree();return check_form();">
		<p class="center">' . LangLoader::get_message('form.explain_required_fields', 'status-messages-common') . '</p>
		<fieldset> 
			<legend>' . $_data->get('L_ACTION_MENUS') . '</legend>
			<div class="form-element">
				<label for="menu_element_' . $_data->get('ID') . '_name">* ' . $_data->get('L_NAME') . '</label>
				<div class="form-field"><input type="text" name="menu_element_' . $_data->get('ID') . '_name" id="menu_element_' . $_data->get('ID') . '_name" value="' . $_data->get('MENU_NAME') . '"></div>
			</div>
			<div class="form-element">
				<label for="menu_element_' . $_data->get('ID') . '_url">' . $_data->get('L_URL') . '</label>
				<div class="form-field"><input type="text" name="menu_element_' . $_data->get('ID') . '_url" id="menu_element_' . $_data->get('ID') . '_url" value="' . $_data->get('MENU_URL') . '"></div>
			</div>
			<div class="form-element">
				<label for="menu_element_' . $_data->get('ID') . '_image">' . $_data->get('L_IMAGE') . '</label>
				<div class="form-field"><input type="text" name="menu_element_' . $_data->get('ID') . '_image" id="menu_element_' . $_data->get('ID') . '_image" value="' . $_data->get('MENU_IMG') . '"></div>
			</div>
			<div class="form-element">
				<label for="menu_element_' . $_data->get('ID') . '_type">' . $_data->get('L_TYPE') . '</label>
				<div class="form-field">
					<label>
						<select name="menu_element_' . $_data->get('ID') . '_type" id="menu_element_' . $_data->get('ID') . '_type">
							';foreach($_data->get_block('type') as $_tmp_type){$_result.='
								<option value="' . $_data->get_from_list('NAME', $_tmp_type) . '"' . $_data->get_from_list('SELECTED', $_tmp_type) . '>' . $_data->get_from_list('L_NAME', $_tmp_type) . '</option>
							';}$_result.='
						</select>
					</label>
				</div>
			</div>
			<div class="form-element">
				<label for="menu_element_' . $_data->get('ID') . '_location">' . $_data->get('L_LOCATION') . '</label>
				<div class="form-field"><label>
					<select name="menu_element_' . $_data->get('ID') . '_location" id="menu_element_' . $_data->get('ID') . '_location">
						';foreach($_data->get_block('location') as $_tmp_location){$_result.='
							<option value="' . $_data->get_from_list('VALUE', $_tmp_location) . '" ';if ($_data->is_true($_data->get_from_list('C_SELECTED', $_tmp_location))){$_result.=' selected="selected"';}$_result.='>
								' . $_data->get_from_list('NAME', $_tmp_location) . '
							</option>
						';}$_result.='
					</select>
				</label></div>
			</div>
			<div class="form-element">
				<label for="menu_element_' . $_data->get('ID') . '_enabled">' . $_data->get('L_STATUS') . '</label>
				<div class="form-field"><label>
					<select name="menu_element_' . $_data->get('ID') . '_enabled" id="menu_element_' . $_data->get('ID') . '_enabled">
						<option value="1"';if ($_data->is_true($_data->get('C_ENABLED'))){$_result.=' selected="selected"';}$_result.='>' . $_data->get('L_ENABLED') . '</option>
						<option value="0"';if (!$_data->is_true($_data->get('C_ENABLED'))){$_result.=' selected="selected"';}$_result.='>' . $_data->get('L_DISABLED') . '</option>
					</select>
				</label></div>
			</div>
			<div class="form-element">
				<label for="menu_element_' . $_data->get('ID') . '_hidden_with_small_screens">' . $_data->get('L_HIDDEN_WITH_SMALL_SCREENS') . '</label>
				<div class="form-field">
					<div class="form-field-checkbox">
						<input type="checkbox" name="menu_element_' . $_data->get('ID') . '_hidden_with_small_screens" id="menu_element_' . $_data->get('ID') . '_hidden_with_small_screens"';if ($_data->is_true($_data->get('C_MENU_HIDDEN_WITH_SMALL_SCREENS'))){$_result.=' checked="checked"';}$_result.='>
						<label for="menu_element_' . $_data->get('ID') . '_hidden_with_small_screens"></label>
					</div>
				</div>
			</div>
			<div class="form-element">
				<label>' . $_data->get('L_AUTHS') . '</label>
				<div class="form-field">' . $_data->get('AUTH_MENUS') . '</div>
			</div>
		</fieldset>
		
		';$_subtpl=$_data->get('filters');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
		
		<fieldset>
			<legend>* ' . $_data->get('L_CONTENT') . '</legend>
			' . $_data->get('MENU_TREE') . '
		</fieldset>
	
		<fieldset class="fieldset-submit">
			<legend>' . $_data->get('L_ACTION') . '</legend>
			<input type="hidden" name="id" value="' . $_data->get('MENU_ID') . '">
			<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
			<input type="hidden" name="menu_tree" id="menu_tree" value="">
			<button type="submit" class="submit" name="valid" value="true">' . $_data->get('L_ACTION') . '</button>
		</fieldset>
	</form>
</div>
'; ?>