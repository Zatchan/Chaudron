<?php $_result='<script>
<!--
function display_description(id){
	var SHOW = ' . $_functions->escapejs(LangLoader::get_message('display', 'common')) . ';
	var HIDE = ' . $_functions->escapejs(LangLoader::get_message('hide', 'common')) . ';

	jQuery(\'#desc-explain-\' + id).toggle(300, function(){
		if (jQuery(this).css(\'display\') == \'block\'){
			jQuery(\'#picture-desc-\' + id).attr(\'title\', HIDE);
		}
		else{
			jQuery(\'#picture-desc-\' + id).attr(\'title\', SHOW);
		}
		jQuery(\'#picture-desc-\' + id).children().toggleClass(\'fa-minus\');
		jQuery(\'#picture-desc-\' + id).children().toggleClass(\'fa-plus\');
	});
}
-->
</script>

';foreach($_data->get_block('errors') as $_tmp_errors){$_result.='
	';$_subtpl=$_data->get_from_list('MSG', $_tmp_errors);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
';}$_result.='

<form action="' . $_data->get('REWRITED_SCRIPT') . '" method="post">
        ' . LangLoader::get_message('modules.warning_before_install', 'admin-modules-common') . '
	<table id="table">
		<caption>' . $_functions->i18n('modules.installed_not_activated_modules') . '</caption>
		';if ($_data->is_true($_data->get('C_MODULES_NOT_ACTIVATED'))){$_result.='
		<thead>
			<tr>
				<th>' . $_functions->i18n('modules.name') . '</th>
				<th>' . $_functions->i18n('modules.description') . '</th>
				<th>' . LangLoader::get_message('enabled', 'common') . '</th>
				<th>' . LangLoader::get_message('delete', 'common') . '</th>
			</tr>
		</thead>
		<tbody>
			';foreach($_data->get_block('modules_not_activated') as $_tmp_modules_not_activated){$_result.='
			<tr>
				<td>
					<span id="m' . $_data->get_from_list('ID', $_tmp_modules_not_activated) . '"></span>
					<img src="' . $_data->get('PATH_TO_ROOT') . '/' . $_data->get_from_list('ICON', $_tmp_modules_not_activated) . '/' . $_data->get_from_list('ICON', $_tmp_modules_not_activated) . '.png" alt="' . $_data->get_from_list('NAME', $_tmp_modules_not_activated) . '" /><br />
					<span class="text-strong">' . $_data->get_from_list('NAME', $_tmp_modules_not_activated) . '</span> <em>(' . $_data->get_from_list('VERSION', $_tmp_modules_not_activated) . ')</em>
				</td>
				<td>
					<div id="desc-explain-' . $_data->get_from_list('ID', $_tmp_modules_not_activated) . '" class="left" style="display: none;">
						<span class="text-strong">' . $_functions->i18n('modules.author') . ' :</span> ';if ($_data->is_true($_data->get_from_list('C_AUTHOR_EMAIL', $_tmp_modules_not_activated))){$_result.='<a href="mailto:' . $_data->get_from_list('AUTHOR_EMAIL', $_tmp_modules_not_activated) . '">' . $_data->get_from_list('AUTHOR', $_tmp_modules_not_activated) . '</a>';}else{$_result.='' . $_data->get_from_list('AUTHOR', $_tmp_modules_not_activated) . '';}$_result.=' ';if ($_data->is_true($_data->get_from_list('C_AUTHOR_WEBSITE', $_tmp_modules_not_activated))){$_result.='<a href="' . $_data->get_from_list('AUTHOR_WEBSITE', $_tmp_modules_not_activated) . '" class="basic-button smaller">Web</a>';}$_result.='<br />
						<span class="text-strong">' . $_functions->i18n('modules.description') . ' :</span> ' . $_data->get_from_list('DESCRIPTION', $_tmp_modules_not_activated) . '<br />
						<span class="text-strong">' . $_functions->i18n('modules.compatibility') . ' :</span> PHPBoost ' . $_data->get_from_list('COMPATIBILITY', $_tmp_modules_not_activated) . '<br />
						<span class="text-strong">' . $_functions->i18n('modules.php_version') . ' :</span> ' . $_data->get_from_list('PHP_VERSION', $_tmp_modules_not_activated) . '<br />
						';if ($_data->is_true($_data->get_from_list('C_DOCUMENTATION', $_tmp_modules_not_activated))){$_result.='<a class="basic-button smaller" href="' . $_data->get_from_list('L_DOCUMENTATION', $_tmp_modules_not_activated) . '">' . $_functions->i18n('module.documentation') . '</a>';}$_result.='		
					</div>
					<div class="center">
						<a href="" onclick="javascript:display_description(\'' . $_data->get_from_list('ID', $_tmp_modules_not_activated) . '\'); return false;" id="picture-desc-' . $_data->get_from_list('ID', $_tmp_modules_not_activated) . '" class="description-displayed" title="' . LangLoader::get_message('display', 'common') . '"><i class="fa fa-plus"></i></a>
					</div>
				</td>
				<td class="input-radio">
					<div class="form-field-radio">
						<input id="activated-' . $_data->get_from_list('ID', $_tmp_modules_not_activated) . '" type="radio" name="activated-' . $_data->get_from_list('ID', $_tmp_modules_not_activated) . '" value="1" ';if ($_data->is_true($_data->get_from_list('C_MODULE_ACTIVE', $_tmp_modules_not_activated))){$_result.=' checked="checked" ';}$_result.='>
						<label for="activated-' . $_data->get_from_list('ID', $_tmp_modules_not_activated) . '"></label>
					</div>
					<span class="form-field-radio-span">' . LangLoader::get_message('yes', 'common') . '</span>
					<br />
					<div class="form-field-radio">
						<input id="activated-' . $_data->get_from_list('ID', $_tmp_modules_not_activated) . '2" type="radio" name="activated-' . $_data->get_from_list('ID', $_tmp_modules_not_activated) . '" value="0" ';if (!$_data->is_true($_data->get_from_list('C_MODULE_ACTIVE', $_tmp_modules_not_activated))){$_result.=' checked="checked" ';}$_result.=' />
						<label for="activated-' . $_data->get_from_list('ID', $_tmp_modules_not_activated) . '2"></label>
					</div>
					<span class="form-field-radio-span">' . LangLoader::get_message('no', 'common') . '</span>
				</td>
				<td>
					<button type="submit" class="submit" name="delete-' . $_data->get_from_list('ID', $_tmp_modules_not_activated) . '" value="true" />' . LangLoader::get_message('delete', 'common') . '</button>
				</td>
			</tr>
			';}$_result.='
		</tbody>

		';}else{$_result.='
	</table>
	<div class="notice message-helper-small">' . LangLoader::get_message('no_item_now', 'common') . '</div>
		';}$_result.='
		
	<table id="table2">
		<caption>' . $_functions->i18n('modules.installed_activated_modules') . '</caption>
		';if ($_data->is_true($_data->get('C_MODULES_ACTIVATED'))){$_result.='
		<thead>
			<tr> 
				<th>' . $_functions->i18n('modules.name') . '</th>
				<th>' . $_functions->i18n('modules.description') . '</th>
				<th>' . LangLoader::get_message('enabled', 'common') . '</th>
				<th>' . LangLoader::get_message('delete', 'common') . '</th>
			</tr>
		</thead>
		<tbody>
			';foreach($_data->get_block('modules_activated') as $_tmp_modules_activated){$_result.='
			<tr>
				<td>
					<span id="m' . $_data->get_from_list('ID', $_tmp_modules_activated) . '"></span>
					<img class="valign-middle" src="' . $_data->get('PATH_TO_ROOT') . '/' . $_data->get_from_list('ICON', $_tmp_modules_activated) . '/' . $_data->get_from_list('ICON', $_tmp_modules_activated) . '.png" alt="' . $_data->get_from_list('NAME', $_tmp_modules_activated) . '" /><br />
					<span class="text-strong">' . $_data->get_from_list('NAME', $_tmp_modules_activated) . '</span> <em>(' . $_data->get_from_list('VERSION', $_tmp_modules_activated) . ')</em>
				</td>
				<td>
					<div id="desc-explain-' . $_data->get_from_list('ID', $_tmp_modules_activated) . '" class="left" style="display: none;">
						<span class="text-strong">' . $_functions->i18n('modules.name') . ' :</span> ';if ($_data->is_true($_data->get_from_list('C_AUTHOR_EMAIL', $_tmp_modules_activated))){$_result.='<a href="mailto:' . $_data->get_from_list('AUTHOR_EMAIL', $_tmp_modules_activated) . '">' . $_data->get_from_list('AUTHOR', $_tmp_modules_activated) . '</a>';}else{$_result.='' . $_data->get_from_list('AUTHOR', $_tmp_modules_activated) . '';}$_result.=' ';if ($_data->is_true($_data->get_from_list('C_AUTHOR_WEBSITE', $_tmp_modules_activated))){$_result.='<a href="' . $_data->get_from_list('AUTHOR_WEBSITE', $_tmp_modules_activated) . '" class="basic-button smaller">Web</a>';}$_result.='<br />
						<span class="text-strong">' . $_functions->i18n('modules.description') . ' :</span> ' . $_data->get_from_list('DESCRIPTION', $_tmp_modules_activated) . '<br />
						<span class="text-strong">' . $_functions->i18n('modules.compatibility') . ' :</span> PHPBoost ' . $_data->get_from_list('COMPATIBILITY', $_tmp_modules_activated) . '<br />
						<span class="text-strong">' . $_functions->i18n('modules.php_version') . ' :</span> ' . $_data->get_from_list('PHP_VERSION', $_tmp_modules_activated) . '<br />
						';if ($_data->is_true($_data->get_from_list('C_DOCUMENTATION', $_tmp_modules_activated))){$_result.='<a class="basic-button smaller" href="' . $_data->get_from_list('L_DOCUMENTATION', $_tmp_modules_activated) . '">' . $_functions->i18n('module.documentation') . '</a>';}$_result.='
					</div>
					<div class="center"><a href="" onclick="javascript:display_description(\'' . $_data->get_from_list('ID', $_tmp_modules_activated) . '\'); return false;" id="picture-desc-' . $_data->get_from_list('ID', $_tmp_modules_activated) . '" class="description-displayed" title="' . LangLoader::get_message('display', 'common') . '"><i class="fa fa-plus"></i></a></div>
				</td>
				<td class="input-radio">
					<div class="form-field-radio">
						<input id="activated-' . $_data->get_from_list('ID', $_tmp_modules_activated) . '" type="radio" name="activated-' . $_data->get_from_list('ID', $_tmp_modules_activated) . '" value="1" ';if ($_data->is_true($_data->get_from_list('C_MODULE_ACTIVE', $_tmp_modules_activated))){$_result.=' checked="checked" ';}$_result.='>
						<label for="activated-' . $_data->get_from_list('ID', $_tmp_modules_activated) . '"></label>
					</div>
					<span class="form-field-radio-span">' . LangLoader::get_message('yes', 'common') . '</span>
					<br />
					<div class="form-field-radio">
						<input id="activated-' . $_data->get_from_list('ID', $_tmp_modules_activated) . '2" type="radio" name="activated-' . $_data->get_from_list('ID', $_tmp_modules_activated) . '" value="0" ';if (!$_data->is_true($_data->get_from_list('C_MODULE_ACTIVE', $_tmp_modules_activated))){$_result.=' checked="checked" ';}$_result.='>
						<label for="activated-' . $_data->get_from_list('ID', $_tmp_modules_activated) . '2"></label>
					</div>
					<span class="form-field-radio-span">' . LangLoader::get_message('no', 'common') . '</span>
				</td>
				<td>
					<button type="submit" class="submit" name="delete-' . $_data->get_from_list('ID', $_tmp_modules_activated) . '" value="true">' . LangLoader::get_message('delete', 'common') . '</button>
				</td>
			</tr>
			';}$_result.='
		</tbody>
	</table>
		';}else{$_result.='
	</table>
	<div class="notice">' . LangLoader::get_message('no_item_now', 'common') . '</div>
		';}$_result.='
		
	<fieldset class="fieldset-submit">
		<legend>' . $_data->get('L_SUBMIT') . '</legend>
		<button type="submit" class="submit" name="update_modules_configuration" value="true">' . LangLoader::get_message('update', 'main') . '</button>
		<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
		<input type="hidden" name="update" value="true">
	</fieldset>
</form>'; ?>