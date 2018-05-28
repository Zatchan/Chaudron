<?php $_result='';foreach($_data->get_block('messages') as $_tmp_messages){$_result.='
<div id="shoutbox-message-' . $_data->get_from_list('ID', $_tmp_messages) . '" class="shoutbox-message-container">
	';if ($_data->is_true($_data->get('C_DISPLAY_DATE'))){$_result.='<span class="shoutbox-message-date small">' . $_data->get_from_list('DATE', $_tmp_messages) . ' : </span>';}$_result.='
	<span class="shoutbox-message">
		';if ($_data->is_true($_data->get_from_list('C_DELETE', $_tmp_messages))){$_result.='
		<a href="" onclick="shoutbox_delete_message(' . $_data->get_from_list('ID', $_tmp_messages) . ');return false;" title="' . LangLoader::get_message('delete', 'common') . '" id="delete_' . $_data->get_from_list('ID', $_tmp_messages) . '" class="fa fa-remove"></a>';}$_result.='
		';if ($_data->is_true($_data->get_from_list('C_AUTHOR_EXIST', $_tmp_messages))){$_result.='
		<a href="' . $_data->get_from_list('U_AUTHOR_PROFILE', $_tmp_messages) . '" class="shoutbox-message-author ' . $_data->get_from_list('USER_LEVEL_CLASS', $_tmp_messages) . '" ';if ($_data->is_true($_data->get_from_list('C_USER_GROUP_COLOR', $_tmp_messages))){$_result.=' style="color:' . $_data->get_from_list('USER_GROUP_COLOR', $_tmp_messages) . '" ';}$_result.='>' . $_data->get_from_list('PSEUDO', $_tmp_messages) . '</a>
		';}else{$_result.='
		<span class="shoutbox-message-author">' . $_data->get_from_list('PSEUDO', $_tmp_messages) . '</span>
		';}$_result.='
		 : <span class="shoutbox-message-content">' . $_data->get_from_list('CONTENTS', $_tmp_messages) . '</span>
	</span>
</div>
';}$_result.=''; ?>