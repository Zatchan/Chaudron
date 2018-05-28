<?php $_result='<!DOCTYPE html>
<html lang="' . $_data->get('L_XML_LANGUAGE') . '">
	<head>
		<title>' . $_data->get('Chaudronn') . '</title>
		<meta charset="UTF-8" />
		';if ($_data->is_true($_data->get('C_DESCRIPTION'))){$_result.='<meta name="description" content="' . $_data->get('SITE_DESCRIPTION') . '" />';}$_result.='
		<meta name="generator" content="PHPBoost" />
		';if ($_data->is_true($_data->get('C_CANONICAL_URL'))){$_result.='<link rel="canonical" href="' . $_data->get('U_CANONICAL') . '" />';}$_result.='
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Theme CSS -->
		';if ($_data->is_true($_data->get('C_CSS_CACHE_ENABLED'))){$_result.='
		<link rel="stylesheet" href="' . CSSCacheManager::get_css_path('/templates/default/theme/default.css;/kernel/lib/css/font-awesome/css/font-awesome.css;/kernel/lib/css/font-awesome-animation/css/font-awesome-animation.css;/kernel/lib/js/lightcase/css/lightcase.css;/templates/{THEME}/theme/design.css;/templates/{THEME}/theme/global.css;/templates/{THEME}/theme/content.css;/templates/{THEME}/theme/cssmenu.css') . '" type="text/css" media="screen, print" />
		';}else{$_result.='
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/templates/default/theme/default.css" type="text/css" media="screen, print" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/kernel/lib/css/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/kernel/lib/css/font-awesome-animation/css/font-awesome-animation.css" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/kernel/lib/js/lightcase/css/lightcase.css" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/templates/' . $_data->get('THEME') . '/theme/design.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/templates/' . $_data->get('THEME') . '/theme/global.css" type="text/css" media="screen, print" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/templates/' . $_data->get('THEME') . '/theme/content.css" type="text/css" media="screen, print" />
		<link rel="stylesheet" href="' . $_data->get('PATH_TO_ROOT') . '/templates/' . $_data->get('THEME') . '/theme/cssmenu.css" type="text/css" media="screen" />	
		';}$_result.='

		<!-- Modules CSS -->
		' . $_data->get('MODULES_CSS') . '

		';if ($_data->is_true($_data->get('C_FAVICON'))){$_result.='
		<link rel="shortcut icon" href="' . $_data->get('FAVICON') . '" type="' . $_data->get('FAVICON_TYPE') . '" />
		';}$_result.='

		';$_subtpl=$_data->get('JS_TOP');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
		<script src="' . $_data->get('PATH_TO_ROOT') . '/templates/' . $_data->get('THEME') . '/js/slide-show.js"></script>	
	</head>

	<body itemscope="itemscope" itemtype="http://schema.org/WebPage">
		';$_subtpl=$_data->get('BODY');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
		';$_subtpl=$_data->get('JS_BOTTOM');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
	</body>
</html>'; ?>