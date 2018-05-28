<?php $_result='<span class="smaller">' . $_data->get('TOTAL_VISITOR_CONNECTED') . ' ' . $_data->get('L_VISITOR') . ', ' . $_data->get('TOTAL_MEMBER_CONNECTED') . ' ' . $_data->get('L_MEMBER') . ', ' . $_data->get('TOTAL_MODERATOR_CONNECTED') . ' ' . $_data->get('L_MODO') . ', ' . $_data->get('TOTAL_ADMINISTRATOR_CONNECTED') . ' ' . $_data->get('L_ADMIN') . ' ' . TextHelper::lcfirst(LangLoader::get_message('online', 'common', 'online')) . '.</span>

<div class="online-users-container">
	';foreach($_data->get_block('users') as $_tmp_users){$_result.='
		<a href="' . $_data->get_from_list('U_PROFILE', $_tmp_users) . '" class="' . $_data->get_from_list('LEVEL_CLASS', $_tmp_users) . ' online-user" ';if ($_data->is_true($_data->get_from_list('C_GROUP_COLOR', $_tmp_users))){$_result.=' style="color:' . $_data->get_from_list('GROUP_COLOR', $_tmp_users) . '" ';}$_result.='>' . $_data->get_from_list('PSEUDO', $_tmp_users) . '</a>
	';}$_result.='
</div>

';if ($_data->is_true($_data->get('C_MORE_USERS'))){$_result.='
<div class="spacer"></div>
<a href="' . $_functions->relative_url(OnlineUrlBuilder::home()) . '">' . $_data->get('TOTAL_USERS_CONNECTED') . ' ' . $_data->get('L_USERS_ONLINE') . '</a>
';}$_result.='

<div class="smaller nbr-connected-user-container">
	' . $_data->get('L_TOTAL') . ' : ' . $_data->get('TOTAL_USERS_CONNECTED') . '
</div>
'; ?>