<?php $_result='<script>
<!--
jQuery(document).ready(function() {
	var field = new FormField("' . $_functions->escape($_data->get('ID')) . '");
	var fieldset = HTMLForms.getFieldset("' . $_functions->escape($_data->get('FIELDSET_ID')) . '");
	fieldset.addField(field);
	';if ($_data->is_true($_data->get('C_HAS_CONSTRAINTS'))){$_result.='field.hasConstraints = true;';}$_result.='
	field.doValidate = function() {
		var result = "";
		';foreach($_data->get_block('constraint') as $_tmp_constraint){$_result.='
			result = ' . $_data->get_from_list('CONSTRAINT', $_tmp_constraint) . ';
			if (result != "") {
				return result;
			}
		';}$_result.='
		return result;
	}
	if (jQuery("#' . $_functions->escape($_data->get('HTML_ID')) . '").length)
	{
		jQuery("#' . $_functions->escape($_data->get('HTML_ID')) . '").blur(function() {
			HTMLForms.get("' . $_functions->escape($_data->get('FORM_ID')) . '").getField("' . $_functions->escape($_data->get('ID')) . '").enableValidationMessage();
			HTMLForms.get("' . $_functions->escape($_data->get('FORM_ID')) . '").getField("' . $_functions->escape($_data->get('ID')) . '").liveValidate();
			';foreach($_data->get_block('related_field') as $_tmp_related_field){$_result.='
			HTMLForms.get("' . $_functions->escape($_data->get('FORM_ID')) . '").getField("' . $_data->get_from_list('ID', $_tmp_related_field) . '").liveValidate();
			';}$_result.='
		});
	
		';foreach($_data->get_block('event_handler') as $_tmp_event_handler){$_result.='
		jQuery("#' . $_functions->escape($_data->get('HTML_ID')) . '").on(\'' . $_data->get_from_list('EVENT', $_tmp_event_handler) . '\', function() {
			' . $_data->get_from_list('HANDLER', $_tmp_event_handler) . '
		});
		';}$_result.='
	}

	' . $_data->get('JS_SPECIALIZATION_CODE') . '
});
-->
</script>'; ?>