<?php $_result='';if ($_data->is_true($_data->get('C_MENU'))){$_result.=' <!-- Menu -->

	';if ($_data->is_true($_data->get('C_FIRST_MENU'))){$_result.=' <!-- Menu container NAV -->

		';if ($_data->is_true($_data->get('C_MENU_CONTAINER'))){$_result.=' <!-- Open mini-module-container -->
		<div class="module-mini-container';if ($_data->is_true($_data->get('C_HIDDEN_WITH_SMALL_SCREENS'))){$_result.=' hidden-small-screens';}$_result.='">
			<div class="module-mini-top menu-vertical-' . $_data->get('DEPTH') . ' hidden-small-screens">
				';if ($_data->is_true($_data->get('RELATIVE_URL'))){$_result.='
				<a href="' . $_data->get('REL_URL') . '" title="' . $_data->get('L_TITLE') . '" class="cssmenu-title sub-title">
					';if ($_data->is_true($_data->get('C_IMG'))){$_result.='<img src="' . $_data->get('REL_IMG') . '" alt="' . $_data->get('TITLE') . '" height="' . $_data->get('IMG_HEIGHT') . '" width="' . $_data->get('IMG_WIDTH') . '" />';}$_result.='' . $_data->get('TITLE') . '</a>
				';}else{$_result.='
				';if ($_data->is_true($_data->get('C_IMG'))){$_result.='<img src="' . $_data->get('REL_IMG') . '" alt="' . $_data->get('TITLE') . '" height="' . $_data->get('IMG_HEIGHT') . '" width="' . $_data->get('IMG_WIDTH') . '" />';}$_result.='' . $_data->get('TITLE') . '
				';}$_result.='
			</div>
			<div class="module-mini-contents">
		';}$_result.='
	
		<nav id="cssmenu-' . $_data->get('ID') . '" class="cssmenu';if ($_data->is_true($_data->get('C_MENU_HORIZONTAL'))){$_result.=' cssmenu-horizontal';}$_result.='';if ($_data->is_true($_data->get('C_MENU_VERTICAL'))){$_result.=' cssmenu-vertical';}$_result.='';if ($_data->is_true($_data->get('C_MENU_STATIC'))){$_result.=' cssmenu-static';}$_result.='';if ($_data->is_true($_data->get('C_MENU_LEFT'))){$_result.=' cssmenu-left';}$_result.='';if ($_data->is_true($_data->get('C_MENU_RIGHT'))){$_result.=' cssmenu-right';}$_result.='';if ($_data->is_true($_data->get('C_HIDDEN_WITH_SMALL_SCREENS'))){$_result.=' hidden-small-screens';}$_result.='';if ($_data->is_true($_data->get('C_MENU_WITH_SUBMENU'))){$_result.=' cssmenu-with-submenu';}$_result.='">
			';if (!$_data->is_true($_data->get('C_MENU_CONTAINER'))){$_result.='
				';if ($_data->is_true($_data->get('RELATIVE_URL'))){$_result.='
				<a href="' . $_data->get('REL_URL') . '" title="' . $_data->get('L_TITLE') . '" class="cssmenu-img cssmenu-img-level-' . $_data->get('DEPTH') . '">
					';if ($_data->is_true($_data->get('C_IMG'))){$_result.='<img src="' . $_data->get('REL_IMG') . '" alt="' . $_data->get('TITLE') . '" height="' . $_data->get('IMG_HEIGHT') . '" width="' . $_data->get('IMG_WIDTH') . '" />';}$_result.='
				</a>
				';}else{$_result.='
					';if ($_data->is_true($_data->get('C_IMG'))){$_result.='<img src="' . $_data->get('REL_IMG') . '" alt="' . $_data->get('TITLE') . '" height="' . $_data->get('IMG_HEIGHT') . '" width="' . $_data->get('IMG_WIDTH') . '" class="cssmenu-img cssmenu-img-level-' . $_data->get('DEPTH') . '" />';}$_result.='
				';}$_result.='
			';}$_result.='
			<ul class="level-' . $_data->get('DEPTH') . '">';foreach($_data->get_block('elements') as $_tmp_elements){$_result.='' . $_data->get_from_list('DISPLAY', $_tmp_elements) . '';}$_result.='</ul>
		</nav>
	
		';if ($_data->is_true($_data->get('C_MENU_CONTAINER'))){$_result.=' <!-- Close mini-module-container -->
			</div>
			<div class="module-mini-bottom"></div>
		</div>
		';}$_result.='
		<script>jQuery("#cssmenu-' . $_functions->escape($_data->get('ID')) . '").menumaker({ title: "' . $_data->get('TITLE') . '", format: "multitoggle", breakpoint: 768';if ($_data->is_true($_data->get('C_MENU_STATIC'))){$_result.=', static: true';}$_result.=' }); </script>		
	';}$_result.='
		
	';if ($_data->is_true($_data->get('C_NEXT_MENU'))){$_result.=' <!-- Sub Element for Menu -->
	<li ';if ($_data->is_true($_data->get('C_HAS_CHILD'))){$_result.='class="has-sub" ';}$_result.='>
		';if ($_data->is_true($_data->get('C_URL'))){$_result.='
		<a href="' . $_data->get('REL_URL') . '" title="' . $_data->get('L_TITLE') . '" class="cssmenu-title">';if ($_data->is_true($_data->get('C_IMG'))){$_result.='<img src="' . $_data->get('REL_IMG') . '" alt="' . $_data->get('TITLE') . '" height="' . $_data->get('IMG_HEIGHT') . '" width="' . $_data->get('IMG_WIDTH') . '" /> ';}$_result.='' . $_data->get('TITLE') . '</a>
		';}else{$_result.='
		<span class="cssmenu-title">';if ($_data->is_true($_data->get('C_IMG'))){$_result.='<img src="' . $_data->get('REL_IMG') . '" alt="' . $_data->get('TITLE') . '" height="' . $_data->get('IMG_HEIGHT') . '" width="' . $_data->get('IMG_WIDTH') . '" />';}$_result.='' . $_data->get('TITLE') . '</span>
		';}$_result.='
		';if ($_data->is_true($_data->get('C_HAS_CHILD'))){$_result.=' <!-- Add Sub-Menu Element -->
		<ul class="level-' . $_data->get('DEPTH') . '">';foreach($_data->get_block('elements') as $_tmp_elements){$_result.='' . $_data->get_from_list('DISPLAY', $_tmp_elements) . '';}$_result.='</ul>
		';}$_result.='
	</li>
	';}$_result.='

';}else{$_result.=' <!-- Menu Element -->
<li>
	';if ($_data->is_true($_data->get('C_URL'))){$_result.='
	<a href="' . $_data->get('REL_URL') . '" title="' . $_data->get('L_TITLE') . '" class="cssmenu-title">';if ($_data->is_true($_data->get('C_IMG'))){$_result.='<img src="' . $_data->get('REL_IMG') . '" alt="' . $_data->get('TITLE') . '" height="' . $_data->get('IMG_HEIGHT') . '" width="' . $_data->get('IMG_WIDTH') . '" /> ';}$_result.='' . $_data->get('TITLE') . '</a>
	';}else{$_result.='
	<span class="cssmenu-title">';if ($_data->is_true($_data->get('C_IMG'))){$_result.='<img src="' . $_data->get('REL_IMG') . '" alt="' . $_data->get('TITLE') . '" height="' . $_data->get('IMG_HEIGHT') . '" width="' . $_data->get('IMG_WIDTH') . '" />';}$_result.='' . $_data->get('TITLE') . '</span>
	';}$_result.='
</li>
';}$_result.=''; ?>