<?php $_result='';if ($_data->is_true($_data->get('C_DISPLAY'))){$_result.='
<nav id="cssmenu-module-' . $_data->get('ID') . '" class="cssmenu cssmenu-right cssmenu-actionslinks">
	<ul class="level-0 hidden">
		';foreach($_data->get_block('element') as $_tmp_element){$_result.='
			';$_subtpl=$_data->get_from_list('ELEMENT', $_tmp_element);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
		';}$_result.='
	</ul>
</nav>
<script>
	jQuery("#cssmenu-module-' . $_functions->escape($_data->get('ID')) . '").menumaker({
		title: "' . LangLoader::get_message('content.menus.actions', 'admin-links-common') . ' ' . $_data->get('MODULE_NAME') . '",
		format: "multitoggle",
		actionslinks: true,
		breakpoint: 768
	});
	jQuery(document).ready(function() {
		jQuery("#cssmenu-module-' . $_functions->escape($_data->get('ID')) . ' ul").removeClass(\'hidden\');
	});
</script>
';}$_result.='
'; ?>