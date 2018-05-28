<?php $_result='<select name="' . $_functions->escape($_data->get('NAME')) . '" id="' . $_functions->escape($_data->get('HTML_ID')) . '" class="' . $_functions->escape($_data->get('CSS_CLASS')) . '" ';if ($_data->is_true($_data->get('C_DISABLED'))){$_result.=' disabled="disabled" ';}$_result.=' >
	';foreach($_data->get_block('options') as $_tmp_options){$_result.='
	';$_subtpl=$_data->get_from_list('OPTION', $_tmp_options);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
	';}$_result.='
</select>
'; ?>