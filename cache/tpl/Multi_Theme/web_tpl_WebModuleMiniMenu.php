<?php $_result='<div id="web" class="mini-content-friends">
';if ($_data->is_true($_data->get('C_PARTNERS'))){$_result.='
	';foreach($_data->get_block('partners') as $_tmp_partners){$_result.='
	<a href="' . $_data->get_from_list('U_VISIT', $_tmp_partners) . '" title="' . $_data->get_from_list('NAME', $_tmp_partners) . '" rel="nofollow" class="mini-content-friends-link">';if ($_data->is_true($_data->get_from_list('C_HAS_PARTNER_PICTURE', $_tmp_partners))){$_result.='<img src="' . $_data->get_from_list('U_PARTNER_PICTURE', $_tmp_partners) . '" alt="' . $_data->get_from_list('NAME', $_tmp_partners) . '" itemprop="image" class="content-friends-picture" />';}else{$_result.='' . $_data->get_from_list('NAME', $_tmp_partners) . '';}$_result.='</a>
	';}$_result.='
';}else{$_result.='
	' . LangLoader::get_message('no_item_now', 'common') . '
';}$_result.='
</div>
'; ?>