<?php $_result='';if ($_data->is_true($_data->get('C_FIRST_MENU'))){$_result.='
	<div id="menu_element_' . $_data->get('ID') . '">
		<input type="hidden" id="menu_uid" name="menu_uid" value="' . $_data->get('ID') . '">
		<ul id="menu_element_' . $_data->get('ID') . '_list" class="sortable-block">
			';foreach($_data->get_block('elements') as $_tmp_elements){$_result.='
				' . $_data->get_from_list('DISPLAY', $_tmp_elements) . '
			';}$_result.='
		</ul>
		<fieldset class="fieldset-submit">
			<button type="button" id="menu_element_' . $_data->get('ID') . '_add_sub_element" name="menu_element_' . $_data->get('ID') . '_add_sub_element" onclick="addSubElement(\'menu_element_' . $_data->get('ID') . '\');">' . $_data->get('L_ADD_SUB_ELEMENT') . '</button>
			<button type="button" id="menu_element_' . $_data->get('ID') . '_add_sub_menu" name="menu_element_' . $_data->get('ID') . '_add_sub_menu" onclick="addSubMenu(\'menu_element_' . $_data->get('ID') . '\');">' . $_data->get('L_ADD_SUB_MENU') . '</button>
		</fieldset>
	</div>
';}$_result.='

';if ($_data->is_true($_data->get('C_NEXT_MENU'))){$_result.='
	<li class="sortable-element" id="menu_element_' . $_data->get('ID') . '" data-id="' . $_data->get('ID') . '">
		<div class="sortable-selector" title="' . LangLoader::get_message('position.move', 'common') . '"></div>
		<div class="sortable-title">
			<i class="fa fa-folder" style="cursor:move"></i>
			<label for="menu_element_' . $_data->get('ID') . '_name">' . $_data->get('L_NAME') . '</label> <input type="text" value="' . $_data->get('TITLE') . '" id="menu_element_' . $_data->get('ID') . '_name" name="menu_element_' . $_data->get('ID') . '_name">
			<label for="menu_element_' . $_data->get('ID') . '_url">' . $_data->get('L_URL') . '</label> <input type="text" value="' . $_data->get('RELATIVE_URL') . '" id="menu_element_' . $_data->get('ID') . '_url" name="menu_element_' . $_data->get('ID') . '_url">
			<label for="menu_element_' . $_data->get('ID') . '_image">' . $_data->get('L_IMAGE') . '</label> <input type="text" value="' . $_data->get('RELATIVE_IMG') . '" id="menu_element_' . $_data->get('ID') . '_image" name="menu_element_' . $_data->get('ID') . '_image" onblur="image_preview(this,menu_element_' . $_data->get('ID') . '_image_preview)">
			<script>
			<!--
				jQuery(document).ready(function() {
					image_preview(this,menu_element_' . $_data->get('ID') . '_image_preview);
				});
			-->
			</script>
			<span class="preview"><img src="';if ($_data->is_true($_data->get('C_IMG'))){$_result.='' . $_data->get('REL_IMG') . '';}$_result.='" id="menu_element_' . $_data->get('ID') . '_image_preview" /></span>
			<div class="sortable-actions">
				<a href="" title="' . $_data->get('L_MORE') . '" id="menu_element_' . $_data->get('ID') . '_more_image" onclick="toggleProperties(' . $_data->get('ID') . ');return false;"><i class="fa fa-cog"></i></a>
				<a href="" title="' . $_data->get('L_DELETE') . '" id="menu_element_' . $_data->get('ID') . '_delete_image" style="cursor:pointer;" onclick="deleteElement(\'menu_element_' . $_data->get('ID') . '\');return false;"><i class="fa fa-delete"></i></a>
			</div>
		</div>
		<div class="spacer"></div>
		<fieldset id="menu_element_' . $_data->get('ID') . '_properties"';if ($_data->is_true($_data->get('C_AUTH_MENU_HIDDEN'))){$_result.=' style="display: none;"';}$_result.='>
			<legend>' . $_data->get('L_PROPERTIES') . '</legend>
			<div class="form-element">
				<label>' . $_data->get('L_AUTHORIZATIONS') . '</label>
				<div class="form-field">' . $_data->get('AUTH_FORM') . '</div>
			</div>
		</fieldset>
        <hr/>
		<ul class="sortable-block" id="menu_element_' . $_data->get('ID') . '_list">
    		';foreach($_data->get_block('elements') as $_tmp_elements){$_result.='
    			' . $_data->get_from_list('DISPLAY', $_tmp_elements) . '
    		';}$_result.='
		</ul>
		<fieldset class="fieldset-submit">
			<button type="button" id="menu_element_' . $_data->get('ID') . '_add_sub_element" name="menu_element_' . $_data->get('ID') . '_add_sub_element" onclick="addSubElement(\'menu_element_' . $_data->get('ID') . '\');">' . $_data->get('L_ADD_SUB_ELEMENT') . '</button>
            <button type="button" id="menu_element_' . $_data->get('ID') . '_add_sub_menu" name="menu_element_' . $_data->get('ID') . '_add_sub_menu" onclick="addSubMenu(\'menu_element_' . $_data->get('ID') . '\');">' . $_data->get('L_ADD_SUB_MENU') . '</button>
		</fieldset>
	</li>
';}$_result.='

';if ($_data->is_true($_data->get('C_LINK'))){$_result.='
    <li class="sortable-element" id="menu_element_' . $_data->get('ID') . '" data-id="' . $_data->get('ID') . '">
		<div class="sortable-selector" title="' . LangLoader::get_message('position.move', 'common') . '"></div>
   		<div class="sortable-title">
			<i class="fa fa-globe"></i>
			<label for="menu_element_' . $_data->get('ID') . '_name">' . $_data->get('L_NAME') . '</label> <input type="text" value="' . $_data->get('TITLE') . '" id="menu_element_' . $_data->get('ID') . '_name" name="menu_element_' . $_data->get('ID') . '_name">
			<label for="menu_element_' . $_data->get('ID') . '_url">' . $_data->get('L_URL') . '</label> <input type="text" value="' . $_data->get('RELATIVE_URL') . '" id="menu_element_' . $_data->get('ID') . '_url" name="menu_element_' . $_data->get('ID') . '_url">
			<label for="menu_element_' . $_data->get('ID') . '_image">' . $_data->get('L_IMAGE') . '</label> <input type="text" value="' . $_data->get('RELATIVE_IMG') . '" id="menu_element_' . $_data->get('ID') . '_image" name="menu_element_' . $_data->get('ID') . '_image" onblur="image_preview(this,menu_element_' . $_data->get('ID') . '_image_preview)">
			<script>
			<!--
				jQuery(document).ready(function() {
					image_preview(this,menu_element_' . $_data->get('ID') . '_image_preview);
				});
			-->
			</script>
			<span class="preview"><img src="';if ($_data->is_true($_data->get('C_IMG'))){$_result.='' . $_data->get('REL_IMG') . '';}$_result.='" id="menu_element_' . $_data->get('ID') . '_image_preview" /></span>
			<div class="sortable-actions">
				<a href="" title="' . $_data->get('L_MORE') . '" id="menu_element_' . $_data->get('ID') . '_more_image" onclick="toggleProperties(' . $_data->get('ID') . ');return false;"><i class="fa fa-cog"></i></a>
				<a href="" title="' . $_data->get('L_DELETE') . '" id="menu_element_' . $_data->get('ID') . '_delete_image" style="cursor:pointer;" onclick="deleteElement(\'menu_element_' . $_data->get('ID') . '\');return false;"><i class="fa fa-delete"></i></a>
			</div>
		</div>
		<div class="spacer"></div>
		<fieldset id="menu_element_' . $_data->get('ID') . '_properties"';if ($_data->is_true($_data->get('C_AUTH_MENU_HIDDEN'))){$_result.=' style="display: none;"';}$_result.='>
			<legend>' . $_data->get('L_PROPERTIES') . '</legend>
			<div class="form-element">
				<label>' . $_data->get('L_AUTHORIZATIONS') . '</label>
				<div class="form-field">' . $_data->get('AUTH_FORM') . '</div>
			</div>
		</fieldset>
    </li>
';}$_result.='
'; ?>