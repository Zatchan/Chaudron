<?php $_result='<form action="' . $_data->get('REWRITED_SCRIPT') . '" method="post">
    ' . LangLoader::get_message('themes.warning_before_install', 'admin-themes-common') . '
	<table id="table">
		<caption>' . $_functions->i18n('themes.installed_theme') . '</caption>
		<thead>
			<tr> 
				<th>' . $_functions->i18n('themes.name') . '</th>
				<th>' . $_functions->i18n('themes.description') . '</th>
				<th>' . $_functions->i18n('themes.authorization') . '</th>
				<th>' . LangLoader::get_message('enabled', 'common') . '</th>
				<th>' . LangLoader::get_message('delete', 'common') . '</th>
			</tr>
		</thead>
		<tbody>
			<tr> 
				<td colspan="5">
					';$_subtpl=$_data->get('MSG');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
					<span class="text-strong">' . $_functions->i18n('themes.default_theme_explain') . '</span>
				</td>
			</tr>
			';foreach($_data->get_block('themes_installed') as $_tmp_themes_installed){$_result.='
				<tr>
					<td>
						<span id="theme-' . $_data->get_from_list('ID', $_tmp_themes_installed) . '"></span>
						<span class="text-strong">' . $_data->get_from_list('NAME', $_tmp_themes_installed) . '</span> <em>(' . $_data->get_from_list('VERSION', $_tmp_themes_installed) . ')</em>
						<br /><br />
						';if ($_data->is_true($_data->get_from_list('C_PICTURES', $_tmp_themes_installed))){$_result.='
							<a href="' . $_data->get_from_list('MAIN_PICTURE', $_tmp_themes_installed) . '" data-lightbox="' . $_data->get_from_list('ID', $_tmp_themes_installed) . '" data-rel="lightcase:collection" title="' . $_data->get_from_list('NAME', $_tmp_themes_installed) . '">
								<img src="' . $_data->get_from_list('MAIN_PICTURE', $_tmp_themes_installed) . '" alt="' . $_data->get_from_list('NAME', $_tmp_themes_installed) . '" class="picture-table" />
								<br/>
								' . $_functions->i18n('themes.view_real_preview') . '
							</a>
							';foreach($_data->get_block_from_list('pictures', $_tmp_themes_installed) as $_tmp_themes_installed_pictures){$_result.='
								<a href="' . $_data->get_from_list('URL', $_tmp_themes_installed_pictures) . '" data-lightbox="' . $_data->get_from_list('ID', $_tmp_themes_installed) . '" data-rel="lightcase:collection" title="' . $_data->get_from_list('NAME', $_tmp_themes_installed) . '"></a>
							';}$_result.='
						';}$_result.='
						
					</td>
					<td class="left">
						<div id="desc_explain' . $_data->get_from_list('ID', $_tmp_themes_installed) . '">
							<span class="text-strong">' . $_functions->i18n('themes.author') . ' :</span> ';if ($_data->is_true($_data->get_from_list('C_AUTHOR_EMAIL', $_tmp_themes_installed))){$_result.='<a href="mailto:' . $_data->get_from_list('AUTHOR_EMAIL', $_tmp_themes_installed) . '">' . $_data->get_from_list('AUTHOR', $_tmp_themes_installed) . '</a>';}else{$_result.='' . $_data->get_from_list('AUTHOR', $_tmp_themes_installed) . '';}$_result.=' ';if ($_data->is_true($_data->get_from_list('C_AUTHOR_WEBSITE', $_tmp_themes_installed))){$_result.='<a href="' . $_data->get_from_list('AUTHOR_WEBSITE', $_tmp_themes_installed) . '" class="basic-button smaller">Web</a>';}$_result.='<br />
							<span class="text-strong">' . $_functions->i18n('themes.description') . ' :</span> ' . $_data->get_from_list('DESCRIPTION', $_tmp_themes_installed) . '<br />
							<span class="text-strong">' . $_functions->i18n('themes.compatibility') . ' :</span> PHPBoost ' . $_data->get_from_list('COMPATIBILITY', $_tmp_themes_installed) . '<br />
							<span class="text-strong">' . $_functions->i18n('themes.html_version') . ' :</span> ' . $_data->get_from_list('HTML_VERSION', $_tmp_themes_installed) . '<br />
							<span class="text-strong">' . $_functions->i18n('themes.css_version') . ' :</span> ' . $_data->get_from_list('CSS_VERSION', $_tmp_themes_installed) . '<br />
							<span class="text-strong">' . $_functions->i18n('themes.main_color') . ' :</span> ' . $_data->get_from_list('MAIN_COLOR', $_tmp_themes_installed) . '<br />
							<span class="text-strong">' . $_functions->i18n('themes.width') . ' :</span> ' . $_data->get_from_list('WIDTH', $_tmp_themes_installed) . '<br />
						</div>
					</td>
					<td>
						';if (!$_data->is_true($_data->get_from_list('C_IS_DEFAULT_THEME', $_tmp_themes_installed))){$_result.='
							<div id="authorizations_explain-' . $_data->get_from_list('ID', $_tmp_themes_installed) . '">' . $_data->get_from_list('AUTHORIZATIONS', $_tmp_themes_installed) . '</div>
						';}else{$_result.='
							' . LangLoader::get_message('visitor', 'user-common') . '
						';}$_result.='
					</td>
					
					';if (!$_data->is_true($_data->get_from_list('C_IS_DEFAULT_THEME', $_tmp_themes_installed))){$_result.='
					<td class="input-radio">
						<div class="form-field-radio">
							<input id="activated-' . $_data->get_from_list('ID', $_tmp_themes_installed) . '" type="radio" name="activated-' . $_data->get_from_list('ID', $_tmp_themes_installed) . '" value="1" ';if ($_data->is_true($_data->get_from_list('C_IS_ACTIVATED', $_tmp_themes_installed))){$_result.=' checked="checked" ';}$_result.='>
							<label for="activated-' . $_data->get_from_list('ID', $_tmp_themes_installed) . '"></label>
						</div>
						<span class="form-field-radio-span">' . LangLoader::get_message('yes', 'common') . '</span>
						<br />
						<div class="form-field-radio">
							<input id="activated-' . $_data->get_from_list('ID', $_tmp_themes_installed) . '2" type="radio" name="activated-' . $_data->get_from_list('ID', $_tmp_themes_installed) . '" value="0" ';if (!$_data->is_true($_data->get_from_list('C_IS_ACTIVATED', $_tmp_themes_installed))){$_result.=' checked="checked" ';}$_result.='>
							<label for="activated-' . $_data->get_from_list('ID', $_tmp_themes_installed) . '2"></label>
						</div>
						<span class="form-field-radio-span">' . LangLoader::get_message('no', 'common') . '</span>
						<label> </label>
						<label> </label>
					</td>
					<td>
						<button type="submit" class="submit" name="delete-' . $_data->get_from_list('ID', $_tmp_themes_installed) . '" value="true">' . LangLoader::get_message('delete', 'common') . '</button>
					</td>
					';}else{$_result.='
					<td>
						' . LangLoader::get_message('yes', 'common') . '
					</td>
					<td>
					</td>
					';}$_result.='

				</tr>
			';}$_result.='
		</tbody>
	</table>
	
	<fieldset class="fieldset-submit">
		<legend>' . $_data->get('L_SUBMIT') . '</legend>
		<button type="submit" class="submit" name="update_themes_configuration" value="true">' . $_data->get('L_UPDATE') . '</button>
		<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
		<input type="hidden" name="update" value="true">
		<button type="reset" value="true">' . $_data->get('L_RESET') . '</button>
	</fieldset>
</form>'; ?>