<?php $_result='<div class="menus-block-container" data-id="' . $_data->get('IDMENU') . '" id="menu_' . $_data->get('IDMENU') . '"';if ($_data->is_true($_data->get('C_HORIZONTAL'))){$_result.=' style="width:auto;"';}$_result.='>
	';if ($_data->is_true($_data->get('C_UP'))){$_result.='<div class="menus-block-move menus-block-move-top"><a href="' . $_data->get('U_UP') . '" alt="' . $_data->get('L_MOVE_UP') . '" title="' . $_data->get('L_MOVE_UP') . '"></a></div>';}$_result.='
	<div class="menus-block-top">

		<span id="m' . $_data->get('IDMENU') . '"></span>
		<h5 class="menus-block-title">' . $_data->get('NAME') . '</h5>
		
		<a href="" class="menus-block-move-cursor" title="' . LangLoader::get_message('move', 'admin') . '" onclick="return false;"><i class="fa fa-arrows"></i></a>
		';if ($_data->is_true($_data->get('C_EDIT'))){$_result.='
			<a href="' . $_data->get('U_EDIT') . '" title="' . $_data->get('L_EDIT') . '" class="fa fa-edit"></a>
		';}$_result.='
		';if ($_data->is_true($_data->get('C_DEL'))){$_result.='
			<a href="' . $_data->get('U_DELETE') . '" title="' . $_data->get('L_DEL') . '" class="fa fa-delete" data-confirmation="delete-element"></a>
		';}$_result.='
		
		<a href="menus.php?action=' . $_data->get('ACTIV') . '&amp;id=' . $_data->get('IDMENU') . '&amp;token=' . $_data->get('TOKEN') . '#m' . $_data->get('IDMENU') . '" title="';if ($_data->is_true($_data->get('C_MENU_ACTIVATED'))){$_result.='' . $_data->get('L_UNACTIVATE') . '';}else{$_result.='' . $_data->get('L_ACTIVATE') . '';}$_result.='"><i class="fa ';if ($_data->is_true($_data->get('C_MENU_ACTIVATED'))){$_result.='fa-eye';}else{$_result.='fa-eye-slash';}$_result.='"></i></a>
	</div>
	
	' . $_data->get('CONTENTS') . '
	';if ($_data->is_true($_data->get('C_DOWN'))){$_result.='<div class="menus-block-move menus-block-move-bot"><a href="' . $_data->get('U_DOWN') . '" alt="' . $_data->get('L_MOVE_DOWN') . '" title="' . $_data->get('L_MOVE_DOWN') . '"></a></div>';}$_result.='
</div>
'; ?>