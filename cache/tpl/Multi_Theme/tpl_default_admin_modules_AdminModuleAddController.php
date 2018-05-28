<?php $_result='';$_subtpl=$_data->get('UPLOAD_FORM');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
<form action="' . $_data->get('REWRITED_SCRIPT') . '" method="post" class="fieldset-content">
	<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
	';$_subtpl=$_data->get('MSG');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
	<fieldset>
		<legend>' . $_functions->i18n('modules.modules_available') . '</legend>
		<div class="fieldset-inset">
		';if ($_data->is_true($_data->get('C_MODULES_AVAILABLE'))){$_result.='
			<table id="table">
				<caption>' . $_functions->i18n('modules.modules_available') . '</caption>
				<thead>
					<tr> 
						<th>' . $_functions->i18n('modules.name') . '</th>
						<th>' . $_functions->i18n('modules.description') . '</th>
						<th>' . LangLoader::get_message('enable', 'common') . '</th>
						<th>' . $_functions->i18n('modules.install_module') . '</th>
					</tr>
				</thead>
				<tbody>
					';foreach($_data->get_block('available') as $_tmp_available){$_result.='
					<tr>
						<td>
							<img src="' . $_data->get('PATH_TO_ROOT') . '/' . $_data->get_from_list('ICON', $_tmp_available) . '/' . $_data->get_from_list('ICON', $_tmp_available) . '.png" alt="' . $_data->get_from_list('NAME', $_tmp_available) . '" />
							<span class="text-strong">' . $_data->get_from_list('NAME', $_tmp_available) . '</span>
							<em>(' . $_data->get_from_list('VERSION', $_tmp_available) . ')</em>
						</td>
						<td class="left">
							<span class="text-strong">' . $_functions->i18n('modules.author') . ' :</span> ';if ($_data->is_true($_data->get_from_list('C_AUTHOR_EMAIL', $_tmp_available))){$_result.='<a href="mailto:' . $_data->get_from_list('AUTHOR_EMAIL', $_tmp_available) . '">' . $_data->get_from_list('AUTHOR', $_tmp_available) . '</a>';}else{$_result.='' . $_data->get_from_list('AUTHOR', $_tmp_available) . '';}$_result.=' ';if ($_data->is_true($_data->get_from_list('C_AUTHOR_WEBSITE', $_tmp_available))){$_result.='<a href="' . $_data->get_from_list('AUTHOR_WEBSITE', $_tmp_available) . '" class="basic-button smaller">Web</a>';}$_result.='<br />
							<span class="text-strong">' . $_functions->i18n('modules.description') . ' :</span> ' . $_data->get_from_list('DESCRIPTION', $_tmp_available) . '<br />
							<span class="text-strong">' . $_functions->i18n('modules.compatibility') . ' :</span> PHPBoost ' . $_data->get_from_list('COMPATIBILITY', $_tmp_available) . '<br />
						</td>
						<td class="input-radio">
							<div class="form-field-radio">
								<input id="activated-' . $_data->get_from_list('ID', $_tmp_available) . '" type="radio" name="activated-' . $_data->get_from_list('ID', $_tmp_available) . '" value="1" checked="checked" />
								<label for="activated-' . $_data->get_from_list('ID', $_tmp_available) . '"></label>
							</div>
							<span class="form-field-radio-span">' . LangLoader::get_message('yes', 'common') . '</span>
							<br />
							<div class="form-field-radio">
								<input id="activated-' . $_data->get_from_list('ID', $_tmp_available) . '2" type="radio" name="activated-' . $_data->get_from_list('ID', $_tmp_available) . '" value="0" />
								<label for="activated-' . $_data->get_from_list('ID', $_tmp_available) . '2"></label>
							</div>
							<span class="form-field-radio-span">' . LangLoader::get_message('no', 'common') . '</span>
						</td>
						<td>
							<button type="submit" class="submit" name="add-' . $_data->get_from_list('ID', $_tmp_available) . '" value="true">' . $_functions->i18n('modules.install_module') . '</button>
						</td>
					</tr>
					';}$_result.='
				</tbody>
			</table>
		';}else{$_result.='
		<div class="notice message-helper-small">' . LangLoader::get_message('no_item_now', 'common') . '</div>
		';}$_result.='
		</div>
	</fieldset>
</form>'; ?>