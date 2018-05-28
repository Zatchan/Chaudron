<?php $_result='<nav id="admin-quick-menu">
	<a href="" class="js-menu-button" onclick="open_submenu(\'admin-quick-menu\');return false;" title="' . $_data->get('L_WEBSITE_UPDATES') . '">
		<i class="fa fa-bars"></i> ' . $_data->get('L_WEBSITE_UPDATES') . '
	</a>
	<ul>
		<li>
			<a href="updates.php" class="quick-link">' . $_data->get('L_WEBSITE_UPDATES') . '</a>
		</li>
		<li>
			<a href="updates.php?type=kernel" class="quick-link">' . $_data->get('L_KERNEL') . '</a>
		</li>
		<li>
			<a href="updates.php?type=module" class="quick-link">' . $_data->get('L_MODULES') . '</a>
		</li>
		<li>
			<a href="updates.php?type=template" class="quick-link">' . $_data->get('L_THEMES') . '</a>
		</li>
	</ul>
</nav>

<div id="admin-contents">
	<fieldset>
		<legend>' . $_data->get('L_WEBSITE_UPDATES') . '</legend>
		<div class="fieldset-inset">
		';if ($_data->is_true($_data->get('C_INCOMPATIBLE_PHP_VERSION'))){$_result.='
			<div class="warning message-helper-small">' . $_data->get('L_INCOMPATIBLE_PHP_VERSION') . '</div>
		';}else{$_result.='
			';if ($_data->is_true($_data->get('C_UPDATES'))){$_result.='
			<table id="table">
				<caption>' . $_data->get('L_WEBSITE_UPDATES') . '</caption>
				<div class="warning message-helper-small">' . $_data->get('L_UPDATES_ARE_AVAILABLE') . '</div>
				<thead>
					<tr>
						';if ($_data->is_true($_data->get('C_ALL'))){$_result.='
						<th class="td100">' . $_data->get('L_TYPE') . '</td>
						';}$_result.='
						<th>' . $_data->get('L_DESCRIPTION') . '</td>
						<th class="td75">' . $_data->get('L_PRIORITY') . '</td>
						<th class="td150">' . $_data->get('L_UPDATE_DOWNLOAD') . '</td>
					</tr>
				</thead>
				<tbody>
					';foreach($_data->get_block('apps') as $_tmp_apps){$_result.='
					<tr> 
						';if ($_data->is_true($_data->get('C_ALL'))){$_result.='
						<td class="center">' . $_data->get_from_list('type', $_tmp_apps) . '</td>
						';}$_result.='
						<td>
							' . $_data->get('L_NAME') . ' : <strong>' . $_data->get_from_list('name', $_tmp_apps) . '</strong> - ' . $_data->get('L_VERSION') . ' : <strong>' . $_data->get_from_list('version', $_tmp_apps) . '</strong>
							<div class="update-desc">' . $_data->get_from_list('short_description', $_tmp_apps) . '</div>
							<p><a href="' . $_data->get('PATH_TO_ROOT') . '/admin/updates/detail.php?identifier=' . $_data->get_from_list('identifier', $_tmp_apps) . '" title="' . $_data->get('L_MORE_DETAILS') . '" class="small">' . $_data->get('L_DETAILS') . '</a></p>
						</td>
						<td>' . $_data->get_from_list('L_PRIORITY', $_tmp_apps) . '</td>
						<td class="center">
							<a href="' . $_data->get_from_list('download_url', $_tmp_apps) . '" title="' . $_data->get('L_DOWNLOAD_THE_COMPLETE_PACK') . '">' . $_data->get('L_DOWNLOAD_PACK') . '</a><br />
							';if ($_data->is_true($_data->get_from_list('update_url', $_tmp_apps))){$_result.='
							/<br />
							<a href="' . $_data->get_from_list('update_url', $_tmp_apps) . '" title="' . $_data->get('L_DOWNLOAD_THE_UPDATE_PACK') . '">' . $_data->get('L_UPDATE_PACK') . '</a>
							';}$_result.='
						</td>
					</tr>
					';}$_result.='
				</tbody>
			</table>
			';}else{$_result.='
				<div class="success message-helper-small">' . $_data->get('L_NO_AVAILABLES_UPDATES') . '</div>
			';}$_result.='
			<p class="center">
				<a href="' . $_data->get('U_CHECK') . '"><i class="fa fa-download"></i></a> <a href="' . $_data->get('U_CHECK') . '">' . $_data->get('L_CHECK_FOR_UPDATES_NOW') . '</a>
			</p>
		';}$_result.='
		</div>
	</fieldset>
</div>'; ?>