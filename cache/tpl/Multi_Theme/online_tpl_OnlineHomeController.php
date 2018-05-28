<?php $_result='<section id="module-online">
	<header>
		<h1>' . $_functions->i18n('online') . '</h1>
	</header>
	<table id="table">
		<thead>
			<tr>
				<th>
					' . LangLoader::get_message('form.name', 'common') . '
				</th>
				<th>
					' . $_functions->i18n('online.location') . '
				</th>
				<th class="column-last-update">
					' . $_functions->i18n('online.last_update') . '
				</th>
			</tr>
		</thead>
		';if ($_data->is_true($_data->get('C_PAGINATION'))){$_result.='
		<tfoot>
			<tr>
				<td colspan="3">';$_subtpl=$_data->get('PAGINATION');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='</td>
			</tr>
		</tfoot>
		';}$_result.='
		<tbody>
			';foreach($_data->get_block('users') as $_tmp_users){$_result.='
			<tr>
				<td>
					<a href="' . $_data->get_from_list('U_PROFILE', $_tmp_users) . '" class="' . $_data->get_from_list('LEVEL_CLASS', $_tmp_users) . '" ';if ($_data->is_true($_data->get_from_list('C_GROUP_COLOR', $_tmp_users))){$_result.=' style="color:' . $_data->get_from_list('GROUP_COLOR', $_tmp_users) . '" ';}$_result.='>' . $_data->get_from_list('PSEUDO', $_tmp_users) . '</a>
					<div>' . $_data->get_from_list('LEVEL', $_tmp_users) . '</div>
					';if ($_data->is_true($_data->get_from_list('C_AVATAR', $_tmp_users))){$_result.='<img src="' . $_data->get_from_list('U_AVATAR', $_tmp_users) . '" class="message-avatar" alt="' . LangLoader::get_message('avatar', 'user-common') . '" />';}$_result.='
				</td>
				<td>
					<a href="' . $_data->get_from_list('U_LOCATION', $_tmp_users) . '">' . $_data->get_from_list('TITLE_LOCATION', $_tmp_users) . '</a>
				</td>
				<td>
					' . $_data->get_from_list('LAST_UPDATE_DATE_FULL', $_tmp_users) . '
				</td>
			</tr>
			';}$_result.='
			';if (!$_data->is_true($_data->get('C_USERS'))){$_result.='
			<tr>
				<td colspan="3">
					' . LangLoader::get_message('no_item_now', 'common') . '
				</td>
			</tr>
			';}$_result.='
		</tbody>
	</table>
	<footer></footer>
</section>
'; ?>