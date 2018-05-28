<?php $_result='';$_subtpl=$_data->get('ADD_FIELDSET_JS');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
<fieldset id="' . $_functions->escape($_data->get('HTML_ID')) . '"';if ($_data->is_true($_data->get('CSS_CLASS'))){$_result.=' class="' . $_data->get('CSS_CLASS') . '"';}$_result.='';if ($_data->is_true($_data->get('C_DISABLED'))){$_result.=' style="display: none;"';}$_result.='>
	';if ($_data->is_true($_data->get('C_TITLE'))){$_result.='<legend>' . $_data->get('L_TITLE') . '</legend>';}$_result.='
	<div class="fieldset-inset">
		';if ($_data->is_true($_data->get('C_DESCRIPTION'))){$_result.='<p class="fieldset-description">' . $_data->get('DESCRIPTION') . '</p>';}$_result.='
		';foreach($_data->get_block('elements') as $_tmp_elements){$_result.='
			';$_subtpl=$_data->get_from_list('ELEMENT', $_tmp_elements);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
		';}$_result.='
	</div>
</fieldset>'; ?>