<?php $_result='';if ($_data->is_true($_data->get('C_QUESTION'))){$_result.='
<a href="' . $_data->get('U_LINK') . '" title="' . $_data->get('QUESTION') . '" class="mini-faq-question">
	<img src="' . $_data->get('PATH_TO_ROOT') . '/faq/faq.png" alt="' . $_functions->i18n('module_title') . '" height="32" width="32" itemprop="image" />
	<span class="small">' . $_data->get('QUESTION') . '</span>
</a>
';}else{$_result.='
' . LangLoader::get_message('no_item_now', 'common') . '
';}$_result.=''; ?>