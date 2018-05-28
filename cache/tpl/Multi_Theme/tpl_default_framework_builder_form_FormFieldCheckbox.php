<?php $_result='<script>
<!--
jQuery(document).ready(function() {
	jQuery("#' . $_functions->escape($_data->get('NAME')) . '").click(function() {
		HTMLForms.get("' . $_functions->escape($_data->get('FORM_ID')) . '").getField("' . $_functions->escape($_data->get('ID')) . '").enableValidationMessage();
		HTMLForms.get("' . $_functions->escape($_data->get('FORM_ID')) . '").getField("' . $_functions->escape($_data->get('ID')) . '").liveValidate();
	});
});
-->
</script>
<div id="' . $_functions->escape($_data->get('HTML_ID')) . '_field" class="form-element form-element-checkbox';if ($_data->is_true($_data->get('C_REQUIRED_AND_HAS_VALUE'))){$_result.=' constraint-status-right';}$_result.='"';if ($_data->is_true($_data->get('C_HIDDEN'))){$_result.=' style="display: none;"';}$_result.='>
	';if ($_data->is_true($_data->get('C_HAS_LABEL'))){$_result.='
		<label for="' . $_functions->escape($_data->get('HTML_ID')) . '">
			' . $_data->get('LABEL') . '
			';if ($_data->is_true($_data->get('C_DESCRIPTION'))){$_result.='
			<span class="field-description">' . $_data->get('DESCRIPTION') . '</span>
			';}$_result.='
		</label>
	';}$_result.='
	
	<div id="onblurContainerResponse' . $_functions->escape($_data->get('HTML_ID')) . '" class="form-field';if ($_data->is_true($_data->get('C_HAS_FORM_FIELD_CLASS'))){$_result.=' ' . $_data->get('FORM_FIELD_CLASS') . '';}$_result.=' picture-status-constraint';if ($_data->is_true($_data->get('C_REQUIRED'))){$_result.=' field-required ';}$_result.='">
		<input type="checkbox" name="' . $_functions->escape($_data->get('NAME')) . '" id="' . $_functions->escape($_data->get('HTML_ID')) . '" ';if ($_data->is_true($_data->get('C_DISABLED'))){$_result.=' disabled="disabled" ';}$_result.=' ';if ($_data->is_true($_data->get('C_CHECKED'))){$_result.=' checked="checked" ';}$_result.=' ';if ($_data->is_true($_data->get('C_READONLY'))){$_result.=' readonly="readonly" ';}$_result.='/>
		<label for="' . $_functions->escape($_data->get('HTML_ID')) . '"></label>
		<span class="text-status-constraint" style="display: none;" id="onblurMessageResponse' . $_functions->escape($_data->get('HTML_ID')) . '"></span>
	</div>
</div>

';$_subtpl=$_data->get('ADD_FIELD_JS');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
'; ?>