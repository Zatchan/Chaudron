<?php $_result='';if ($_data->is_true($_data->get('C_IS_ENABLED'))){$_result.='
	<div id="' . $_functions->escape($_data->get('HTML_ID')) . '_field"';if ($_data->is_true($_data->get('C_HIDDEN'))){$_result.=' style="display: none;"';}$_result.=' class="form-element">
		<label for="' . $_functions->escape($_data->get('HTML_ID')) . '">* ' . $_data->get('LABEL') . ' ';if ($_data->is_true($_data->get('DESCRIPTION'))){$_result.='<span class="field-description">' . $_data->get('DESCRIPTION') . '</span> ';}$_result.='</label>
		<div class="form-field">
			' . $_data->get('CAPTCHA') . '
		</div>
	</div>
	';$_subtpl=$_data->get('ADD_FIELD_JS');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
';}$_result.=''; ?>