<?php $_result='<option value="' . $_functions->escape($_data->get('VALUE')) . '" ';if ($_data->is_true($_data->get('C_SELECTED'))){$_result.=' selected="selected" ';}$_result.=' ';if ($_data->is_true($_data->get('C_DISABLE'))){$_result.=' disabled="disabled" ';}$_result.=' label="' . $_data->get('LABEL') . '">' . $_data->get('LABEL') . '</option>'; ?>