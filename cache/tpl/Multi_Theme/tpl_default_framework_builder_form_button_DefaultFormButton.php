<?php $_result='<button type="' . $_data->get('TYPE') . '" name="' . $_data->get('HTML_NAME') . '" class="' . $_data->get('CSS_CLASS') . '" onclick="' . $_functions->escape($_data->get('ONCLICK_ACTION')) . '"';if ($_data->is_true($_data->get('C_DATA_CONFIRMATION'))){$_result.=' data-confirmation="' . $_functions->escape($_data->get('DATA_CONFIRMATION')) . '"';}$_result.=' value="true">' . $_data->get('LABEL') . '</button>
'; ?>