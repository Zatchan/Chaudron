<?php $_result='';if ($_data->is_true($_data->get('C_DISPLAY'))){$_result.='
<li ';if ($_data->is_true($_data->get('C_HAS_SUB_LINK'))){$_result.=' class="has-sub"';}$_result.='>
	<a href="' . $_data->get('U_LINK') . '" class="cssmenu-title" title="' . $_data->get('FULLNAME') . '"><img src="' . $_data->get('IMG') . '" alt="' . $_data->get('NAME') . '"/> ' . $_data->get('NAME') . '</a>
	';if ($_data->is_true($_data->get('C_HAS_SUB_LINK'))){$_result.='
	<ul class="level-2">
		';foreach($_data->get_block('element') as $_tmp_element){$_result.='
			';$_subtpl=$_data->get_from_list('ELEMENT', $_tmp_element);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
		';}$_result.='
	</ul>
	';}$_result.='
</li>
';}$_result.=''; ?>