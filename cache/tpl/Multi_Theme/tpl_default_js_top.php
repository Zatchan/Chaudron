<?php $_result='<script>
<!--
	//Variables PHPBoost
	var PATH_TO_ROOT = "' . $_data->get('PATH_TO_ROOT') . '";
	var TOKEN        = "' . $_data->get('TOKEN') . '";
	var THEME        = "' . $_data->get('THEME') . '";
	var LANG         = "' . $_data->get('LANG') . '";

	//Variables BBCode
	var L_HIDE_MESSAGE    = ' . $_functions->escapejs(LangLoader::get_message('tag_hide_message', 'editor-common')) . ';
	var L_HIDE_HIDEBLOCK  = ' . $_functions->escapejs(LangLoader::get_message('tag_hide_hideblock', 'editor-common')) . ';
	var L_COPYTOCLIPBOARD = ' . $_functions->escapejs(LangLoader::get_message('tag_copytoclipboard', 'editor-common')) . ';

	//Variables CookieBar
	';if ($_data->is_true($_data->get('C_COOKIEBAR_ENABLED'))){$_result.='
	var COOKIEBAR_DURATION        = ' . $_data->get('COOKIEBAR_DURATION') . ';
	var COOKIEBAR_TRACKING_MODE   = \'' . $_data->get('COOKIEBAR_TRACKING_MODE') . '\';
	var L_COOKIEBAR_CONTENT       = ' . $_data->get('COOKIEBAR_CONTENT') . ';
	var L_COOKIEBAR_UNDERSTAND    = ' . $_functions->escapejs(LangLoader::get_message('cookiebar.understand', 'user-common')) . ';
	var L_COOKIEBAR_ALLOWED       = ' . $_functions->escapejs(LangLoader::get_message('cookiebar.allowed', 'user-common')) . ';
	var L_COOKIEBAR_DECLINED      = ' . $_functions->escapejs(LangLoader::get_message('cookiebar.declined', 'user-common')) . ';
	var L_COOKIEBAR_MORE_TITLE    = ' . $_functions->escapejs(LangLoader::get_message('cookiebar.more-title', 'user-common')) . ';
	var L_COOKIEBAR_MORE          = ' . $_functions->escapejs(LangLoader::get_message('cookiebar.more', 'user-common')) . ';
	var L_COOKIEBAR_CHANGE_CHOICE = ' . $_functions->escapejs(LangLoader::get_message('cookiebar.change-choice', 'user-common')) . ';
	var U_COOKIEBAR_ABOUTCOOKIE   = \'' . $_functions->relative_url(UserUrlBuilder::aboutcookie()) . '\';
	';}$_result.='
-->
</script>

<script src="' . $_data->get('PATH_TO_ROOT') . '/kernel/lib/js/jquery/jquery.js"></script>
<script src="' . $_data->get('PATH_TO_ROOT') . '/kernel/lib/js/global.js"></script>
'; ?>