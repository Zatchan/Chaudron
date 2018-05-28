<?php $_result='<!DOCTYPE html>
<html lang="' . $_data->get('L_XML_LANGUAGE') . '">
	<head>
		<title>' . $_data->get('TITLE') . '</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Theme CSS -->
		';if ($_data->is_true($_data->get('C_CSS_CACHE_ENABLED'))){$_result.='
		<link rel="stylesheet" href="' . CSSCacheManager::get_css_path('/templates/default/theme/default.css;/kernel/lib/css/font-awesome/css/font-awesome.css;/kernel/lib/css/font-awesome-animation/css/font-awesome-animation.css;/kernel/lib/js/lightcase/css/lightcase.css;/templates/default/theme/admin_design.css;/templates/default/theme/admin_content.css;/templates/default/theme/admin_cssmenu.css;/templates/default/theme/admin_menus.css;/templates/default/theme/admin_table.css;/templates/default/theme/admin_form.css;/templates/default/theme/admin_global.css') . '" type="text/css" media="screen, print" />
		';}else{$_result.='
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/templates/default/theme/default.css" type="text/css" media="screen, print" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/kernel/lib/css/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/kernel/lib/css/font-awesome-animation/css/font-awesome-animation.css" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/kernel/lib/js/lightcase/css/lightcase.css" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/templates/default/theme/admin_design.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/templates/default/theme/admin_content.css" type="text/css" media="screen, print" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/templates/default/theme/admin_cssmenu.css" type="text/css" media="screen, print" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/templates/default/theme/admin_menus.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/templates/default/theme/admin_table.css" type="text/css" media="screen, print" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/templates/default/theme/admin_form.css" type="text/css" media="screen, print" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/templates/default/theme/admin_global.css" type="text/css" media="screen, print" />
		';}$_result.='
		
		<!-- Modules CSS -->
		' . $_data->get('MODULES_CSS') . '
				
		';if ($_data->is_true($_data->get('C_FAVICON'))){$_result.='
		<link rel="shortcut icon" href="' . $_data->get('FAVICON') . '" type="' . $_data->get('FAVICON_TYPE') . '" />
		';}$_result.='
		
		';$_subtpl=$_data->get('JS_TOP');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
		
	</head>
	<body>
		';$_subtpl=$_data->get('BODY');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
		';$_subtpl=$_data->get('JS_BOTTOM');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
		<script>
		<!--
			function open_submenu(myid)
			{
				jQuery(\'#\' + myid).toggleClass(\'active\');
			}
		-->
		</script>
	</body>
</html>
'; ?>