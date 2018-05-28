<?php $_result='	';$_subtpl=$_data->get('LINK');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
	<ul>
		';foreach($_data->get_block('element') as $_tmp_element){$_result.='
		<li>';$_subtpl=$_data->get_from_list('ELEMENT', $_tmp_element);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='</li>
		';}$_result.='
	</ul>'; ?>