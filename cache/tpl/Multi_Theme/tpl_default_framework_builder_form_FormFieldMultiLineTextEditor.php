<?php $_result='<div id="' . $_functions->escape($_data->get('HTML_ID')) . '_field" class="form-element-textarea';if ($_data->is_true($_data->get('C_REQUIRED_AND_HAS_VALUE'))){$_result.=' constraint-status-right';}$_result.='';if ($_data->is_true($_data->get('C_EDITOR_ENABLED'))){$_result.=' editor-' . $_data->get('EDITOR_NAME') . '';}$_result.='"';if ($_data->is_true($_data->get('C_HIDDEN'))){$_result.=' style="display: none;"';}$_result.='>
	<label for="' . $_functions->escape($_data->get('HTML_ID')) . '">
		' . $_data->get('LABEL') . '
		';if ($_data->is_true($_data->get('C_DESCRIPTION'))){$_result.='<span class="field-description">' . $_data->get('DESCRIPTION') . '</span>';}$_result.='
	</label>

	';if ($_data->is_true($_data->get('C_EDITOR_ENABLED'))){$_result.='
	' . $_data->get('EDITOR') . '
	';}$_result.='

	<div id="onblurContainerResponse' . $_functions->escape($_data->get('HTML_ID')) . '" class="form-field-textarea picture-status-constraint';if ($_data->is_true($_data->get('C_REQUIRED'))){$_result.=' field-required ';}$_result.='">
		<textarea id="' . $_functions->escape($_data->get('HTML_ID')) . '" name="' . $_functions->escape($_data->get('HTML_ID')) . '" rows="' . $_data->get('ROWS') . '" cols="' . $_data->get('COLS') . '" class="';if ($_data->is_true($_data->get('C_READONLY'))){$_result.='low-opacity ';}$_result.='' . $_functions->escape($_data->get('CLASS')) . ' " onblur="' . $_data->get('ONBLUR') . '"';if ($_data->is_true($_data->get('C_DISABLED'))){$_result.=' disabled="disabled"';}$_result.='';if ($_data->is_true($_data->get('C_READONLY'))){$_result.='readonly="readonly" ';}$_result.='>' . $_data->get('VALUE') . '</textarea>
		<span class="text-status-constraint" style="display: none;" id="onblurMessageResponse' . $_functions->escape($_data->get('HTML_ID')) . '"></span>
	</div>

	';if ($_data->is_true($_data->get('C_EDITOR_ENABLED'))){$_result.='
	<div class="center">
		<div class="form-element-preview">' . $_data->get('PREVIEW_BUTTON') . '</div>
		';if ($_data->is_true($_data->get('C_RESET_BUTTON_ENABLED'))){$_result.='
		<div class="form-element-reset">' . $_data->get('RESET_BUTTON') . '</div>
		';}$_result.='
	</div>
	';}$_result.='

</div>

';$_subtpl=$_data->get('ADD_FIELD_JS');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.=''; ?>