<?php $_result='';if ($_data->is_true($_data->get('C_VALIDATION_ERROR'))){$_result.='
<div class="error">
	<span class="text-strong">' . $_data->get('TITLE_VALIDATION_ERROR_MESSAGE') . ' : </span> <br /><br />
	';foreach($_data->get_block('validation_error_messages') as $_tmp_validation_error_messages){$_result.='
		- ' . $_data->get_from_list('ERROR_MESSAGE', $_tmp_validation_error_messages) . '<br />
	';}$_result.='
</div>

';}$_result.='

';if ($_data->is_true($_data->get('C_JS_NOT_ALREADY_INCLUDED'))){$_result.=' 
<script src="' . $_data->get('PATH_TO_ROOT') . '/kernel/lib/js/phpboost/form/validator.js"></script>
<script src="' . $_data->get('PATH_TO_ROOT') . '/kernel/lib/js/phpboost/form/form.js"></script>  
';}$_result.='

<script>
<!--
jQuery(document).ready(function() {
	var form = new HTMLForm("' . $_functions->escape($_data->get('HTML_ID')) . '");
	HTMLForms.add(form);
});
-->
</script>


<form id="' . $_data->get('HTML_ID') . '" ';if ($_data->is_true($_data->get('C_TARGET'))){$_result.='action="' . $_data->get('TARGET') . '"';}$_result.=' method="' . $_data->get('METHOD') . '" onsubmit="return HTMLForms.get(\'' . $_data->get('HTML_ID') . '\').validate();" class="' . $_data->get('FORMCLASS') . '">
	';if ($_data->is_true($_data->get('C_HAS_REQUIRED_FIELDS'))){$_result.='
	<p class="center">' . $_data->get('L_REQUIRED_FIELDS') . '</p>
	';}$_result.='
	
	';foreach($_data->get_block('fieldsets') as $_tmp_fieldsets){$_result.='
		';$_subtpl=$_data->get_from_list('FIELDSET', $_tmp_fieldsets);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
	';}$_result.='
	
	<input type="hidden" id="' . $_data->get('HTML_ID') . '_token" name="token" value="' . $_data->get('TOKEN') . '">
	<input type="hidden" id="' . $_data->get('HTML_ID') . '_disabled_fields" name="' . $_data->get('HTML_ID') . '_disabled_fields" value="">
	<input type="hidden" id="' . $_data->get('HTML_ID') . '_disabled_fieldsets" name="' . $_data->get('HTML_ID') . '_disabled_fieldsets" value="">
</form>'; ?>