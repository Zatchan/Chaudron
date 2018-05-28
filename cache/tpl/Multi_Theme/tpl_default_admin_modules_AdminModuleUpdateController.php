<?php $_result='';$_subtpl=$_data->get('UPLOAD_FORM');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
<form action="' . $_data->get('REWRITED_SCRIPT') . '" method="post" class="fieldset-content">
	<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
	';$_subtpl=$_data->get('MSG');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
	<fieldset>
		<legend>' . $_functions->i18n('modules.updates_available') . '</legend>
		<div class="fieldset-inset">
		';if ($_data->is_true($_data->get('C_UPDATES'))){$_result.='
			<table id="table">
				<caption>' . $_functions->i18n('modules.updates_available') . '</caption>
				<thead>
					<tr>
						<th>' . $_functions->i18n('modules.name') . '</th>
						<th>' . $_functions->i18n('modules.description') . '</th>
						<th>' . $_functions->i18n('modules.upgrade_module') . '</th>
					</tr>
				</thead>
				<tbody>
					';foreach($_data->get_block('modules_upgradable') as $_tmp_modules_upgradable){$_result.='
					<tr>
						<td>
							<img src="' . $_data->get('PATH_TO_ROOT') . '/' . $_data->get_from_list('ICON', $_tmp_modules_upgradable) . '/' . $_data->get_from_list('ICON', $_tmp_modules_upgradable) . '.png" alt="' . $_data->get_from_list('NAME', $_tmp_modules_upgradable) . '" /> <span class="text-strong">' . $_data->get_from_list('NAME', $_tmp_modules_upgradable) . '</span> <span class="text-italic">(' . $_data->get_from_list('VERSION', $_tmp_modules_upgradable) . ')</span>
						</td>
						<td class="left">
							<span class="text-strong">' . $_functions->i18n('modules.author') . ' :</span> ';if ($_data->is_true($_data->get_from_list('C_AUTHOR_EMAIL', $_tmp_modules_upgradable))){$_result.='<a href="mailto:' . $_data->get_from_list('AUTHOR_EMAIL', $_tmp_modules_upgradable) . '">' . $_data->get_from_list('AUTHOR', $_tmp_modules_upgradable) . '</a>';}else{$_result.='' . $_data->get_from_list('AUTHOR', $_tmp_modules_upgradable) . '';}$_result.=' ';if ($_data->is_true($_data->get_from_list('C_AUTHOR_WEBSITE', $_tmp_modules_upgradable))){$_result.='<a href="' . $_data->get_from_list('AUTHOR_WEBSITE', $_tmp_modules_upgradable) . '" class="basic-button smaller">Web</a>';}$_result.='<br />
							<span class="text-strong">' . $_functions->i18n('modules.description') . ' :</span> ' . $_data->get_from_list('DESCRIPTION', $_tmp_modules_upgradable) . '<br />
							<span class="text-strong">' . $_functions->i18n('modules.compatibility') . ' :</span> PHPBoost ' . $_data->get_from_list('COMPATIBILITY', $_tmp_modules_upgradable) . '<br />
							<span class="text-strong">' . $_functions->i18n('modules.php_version') . ' :</span> ' . $_data->get_from_list('PHP_VERSION', $_tmp_modules_upgradable) . '
						</td>
						<td>
							<button type="submit" class="submit" name="upgrade-' . $_data->get_from_list('ID', $_tmp_modules_upgradable) . '" value="true">' . $_functions->i18n('modules.upgrade_module') . '</button>
						</td>
					</tr>
					';}$_result.='
				</tbody>
			</table>
		';}else{$_result.='
			<div class="success message-helper-small">' . LangLoader::get_message('no_item_now', 'common') . '</div>
		';}$_result.='
		</div>
	</fieldset>
</form>
'; ?>