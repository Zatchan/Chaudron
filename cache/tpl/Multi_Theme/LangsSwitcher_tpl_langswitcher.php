<?php $_result='<div class="langs-switcher';if ($_data->is_true($_data->get('C_VERTICAL'))){$_result.=' langs-switcher-vertical';}$_result.='">
	<form action="' . $_data->get('REWRITED_SCRIPT') . '" method="get">
		<label for="switchlang">
			<select id="switchlang" title="' . $_functions->i18n('switch_lang') . '" name="switchlang" onchange="document.location = \'?switchlang=\' + this.options[this.selectedIndex].value;">
			';foreach($_data->get_block('langs') as $_tmp_langs){$_result.='
				<option value="' . $_data->get_from_list('IDNAME', $_tmp_langs) . '"';if ($_data->is_true($_data->get_from_list('C_SELECTED', $_tmp_langs))){$_result.=' selected="selected"';}$_result.='>' . $_data->get_from_list('NAME', $_tmp_langs) . '</option>
			';}$_result.='
			</select>
		</label>
		<img src="' . $_data->get('PATH_TO_ROOT') . '/images/stats/countries/' . $_data->get('LANG_IDENTIFIER') . '.png" alt="' . $_data->get('LANG_NAME') . '" />
		<a href="?switchlang=' . $_data->get('DEFAULT_LANG') . '">' . $_functions->i18n('default_lang') . '</a>
	</form>
</div>
'; ?>