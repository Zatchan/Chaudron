<?php $_result='<h1>
	';if ($_data->is_true($_data->get('C_MODULE_ID'))){$_result.='
	<a href="' . $_data->get('MODULE_URL') . '"><img src="' . $_data->get('PATH_TO_ROOT') . '/' . $_data->get('MODULE_ID') . '/' . $_data->get('MODULE_ID') . '.png" alt="' . $_data->get('MODULE_ID') . '" class="valign-middle" /></a>
	';}$_result.='
	<a href="' . $_data->get('MODULE_URL') . '">
	' . $_data->get('MODULE_NAME') . '
	</a>
</h1>
<p>' . $_data->get('MODULE_DESCRIPTION') . '</p>
<ul>
	';foreach($_data->get_block('element') as $_tmp_element){$_result.='
	<li>';$_subtpl=$_data->get_from_list('ELEMENT', $_tmp_element);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='</li>
	';}$_result.='
</ul>'; ?>