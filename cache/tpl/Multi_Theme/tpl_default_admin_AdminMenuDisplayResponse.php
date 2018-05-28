<?php $_result='<nav id="admin-quick-menu">
	<a href="" class="js-menu-button" onclick="open_submenu(\'admin-quick-menu\');return false;" title="' . $_data->get('TITLE') . '">
		<i class="fa fa-bars"></i> ' . $_data->get('TITLE') . '
	</a>
	<ul>
		';foreach($_data->get_block('links') as $_tmp_links){$_result.='
		<li>
			<a href="' . $_data->get_from_list('U_LINK', $_tmp_links) . '" class="quick-link">' . $_functions->escape($_data->get_from_list('LINK', $_tmp_links)) . '</a>
		</li>
		';}$_result.='
	</ul>
</nav>
<div id="admin-contents">
	';$_subtpl=$_data->get('KERNEL_MESSAGE');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
	';$_subtpl=$_data->get('content');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
</div>'; ?>