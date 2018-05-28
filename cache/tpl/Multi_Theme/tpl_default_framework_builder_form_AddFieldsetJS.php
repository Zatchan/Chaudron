<?php $_result='<script>
<!--
jQuery(document).ready(function() {
	var form = HTMLForms.get("' . $_functions->escape($_data->get('FORM_ID')) . '");
	var fieldset = new FormFieldset("' . $_functions->escape($_data->get('ID')) . '");

	';if ($_data->is_true($_data->get('C_DISABLED'))){$_result.='
	fieldset.disabled = true;
	';}$_result.='
	
	form.addFieldset(fieldset);
});
-->	
</script>'; ?>