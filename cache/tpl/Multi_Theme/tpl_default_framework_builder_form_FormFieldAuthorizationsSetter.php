<?php $_result='<div id="' . $_functions->escape($_data->get('HTML_ID')) . '"';if ($_data->is_true($_data->get('C_HIDDEN'))){$_result.=' style="display: none;"';}$_result.='>
';foreach($_data->get_block('actions') as $_tmp_actions){$_result.='
    <div class="form-element form-element-auth">
    	<label>
    		' . $_data->get_from_list('LABEL', $_tmp_actions) . ' ';if ($_data->is_true($_data->get_from_list('DESCRIPTION', $_tmp_actions))){$_result.='<span class="field-description">' . $_data->get_from_list('DESCRIPTION', $_tmp_actions) . '</span>';}$_result.='
    	</label>
    	<div class="form-field">
    		' . $_data->get_from_list('AUTH_FORM', $_tmp_actions) . '
        </div>
    </div>
';}$_result.='
</div>'; ?>