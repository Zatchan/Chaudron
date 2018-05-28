<?php $_result='<script>
<!--
function shoutbox_add_message()
{
	var pseudo = jQuery("#shout-pseudo").val();
	var contents = jQuery("#shout-contents").val();

	if (pseudo && contents)
	{
		jQuery.ajax({
			url: \'' . $_functions->relative_url(ShoutboxUrlBuilder::ajax_add()) . '\',
			type: "post",
			dataType: "json",
			data: {\'pseudo\' : pseudo, \'contents\' : contents, \'token\' : \'' . $_data->get('TOKEN') . '\'},
			beforeSend: function(){
				jQuery(\'#shoutbox-refresh\').html(\'<i class="fa fa-spin fa-spinner"></i>\');
			},
			success: function(returnData){
				if(returnData.code > 0) {
					shoutbox_refresh_messages_box();
					jQuery(\'#shout-contents\').val(\'\');
				} else {
					switch(returnData.code)
					{
						case -1:
							alert(' . $_functions->escapejs(LangLoader::get_message('e_flood', 'errors')) . ');
						break;
						case -2:
							alert("' . $_data->get('L_ALERT_LINK_FLOOD') . '");
						break;
						case -3:
							alert(' . $_functions->escapejs(LangLoader::get_message('e_incomplete', 'errors')) . ');
						break;
						case -4:
							alert(' . $_functions->escapejs(LangLoader::get_message('error.auth', 'status-messages-common')) . ');
						break;
					}
				}
				jQuery(\'#shoutbox-refresh\').html(\'<i class="fa fa-refresh"></i>\');
			},
			error: function(e){
				alert(' . $_functions->escapejs(LangLoader::get_message('csrf_invalid_token', 'status-messages-common')) . ');
			}
		});
	} else {
		alert("' . LangLoader::get_message('require_text', 'main') . '");
		return false;
	}
}

function shoutbox_delete_message(id_message)
{
	if (confirm(' . $_functions->escapejs(LangLoader::get_message('confirm.delete', 'status-messages-common')) . '))
	{
		jQuery.ajax({
			url: \'' . $_functions->relative_url(ShoutboxUrlBuilder::ajax_delete()) . '\',
			type: "post",
			dataType: "json",
			data: {\'id\' : id_message, \'token\' : \'' . $_data->get('TOKEN') . '\'},
			beforeSend: function(){
				jQuery(\'#shoutbox-refresh\').html(\'<i class="fa fa-spin fa-spinner"></i>\');
			},
			success: function(returnData){
				var code = returnData.code;

				if(code > 0) {
					jQuery(\'#shoutbox-message-\' + code).remove();
				} else {
					alert("' . $_functions->i18n('error.message.delete') . '");
				}
				jQuery(\'#shoutbox-refresh\').html(\'<i class="fa fa-refresh"></i>\');
			},
			error: function(e){
				alert(' . $_functions->escapejs(LangLoader::get_message('csrf_invalid_token', 'status-messages-common')) . ');
			}
		});
	}
}

function shoutbox_refresh_messages_box() {
	jQuery.ajax({
		url: \'' . $_functions->relative_url(ShoutboxUrlBuilder::ajax_refresh()) . '\',
		type: "post",
		dataType: "json",
		data: {\'token\' : \'' . $_data->get('TOKEN') . '\'},
		beforeSend: function(){
			jQuery(\'#shoutbox-refresh\').html(\'<i class="fa fa-spin fa-spinner"></i>\');
		},
		success: function(returnData){
			jQuery(\'#shoutbox-messages-container\').html(returnData);

			jQuery(\'#shoutbox-refresh\').html(\'<i class="fa fa-refresh"></i>\');
		},
		error: function(e){
			jQuery(\'#shoutbox-messages-container\').html(e.responseText);
			
			jQuery(\'#shoutbox-refresh\').html(\'<i class="fa fa-refresh"></i>\');
		}
	});
}

';if ($_data->is_true($_data->get('C_AUTOMATIC_REFRESH_ENABLED'))){$_result.='setInterval(shoutbox_refresh_messages_box, ' . $_data->get('SHOUT_REFRESH_DELAY') . ');';}$_result.='
-->
</script>
';if ($_data->is_true($_data->get('C_DISPLAY_SHOUT_BBCODE'))){$_result.='<script src="' . $_data->get('PATH_TO_ROOT') . '/BBCode/templates/js/bbcode.js"></script>';}$_result.='

<div id="shoutbox-messages-container"';if ($_data->is_true($_data->get('C_HORIZONTAL'))){$_result.=' class="shout-horizontal" ';}$_result.='>';$_subtpl=$_data->get('SHOUTBOX_MESSAGES');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='</div>
';if ($_data->is_true($_data->get('C_DISPLAY_FORM'))){$_result.='
<form action="#" method="post">
	<div class="shout-form-container shout-pseudo-container">
		';if (!$_data->is_true($_data->get('C_MEMBER'))){$_result.='
		<label for="shout-pseudo"><span class="small">' . LangLoader::get_message('form.name', 'common') . '</span></label>
		<input maxlength="25" type="text" name="shout-pseudo" id="shout-pseudo" class="shout-pseudo not-connected" value="	' . LangLoader::get_message('visitor', 'user-common') . '">
		';}else{$_result.='
		<input type="hidden" name="shout-pseudo" id="shout-pseudo" class="shout-pseudo connected" value="' . $_data->get('SHOUTBOX_PSEUDO') . '">
		';}$_result.='
	</div>
	<div class="shout-form-container shout-contents-container">
		<label for="shout-contents"><span class="small">' . LangLoader::get_message('message', 'main') . '</span></label>
		<textarea id="shout-contents" name="shout-contents"';if ($_data->is_true($_data->get('C_VALIDATE_ONKEYPRESS_ENTER'))){$_result.=' onkeypress="if(event.keyCode==13){shoutbox_add_message();}"';}$_result.=' rows="2" cols="16"></textarea>
	</div>
	<div id="shoutbox-bbcode-container" class="shout-spacing">
		';if ($_data->is_true($_data->get('C_DISPLAY_SHOUT_BBCODE'))){$_result.='
		<ul>
			<li class="bbcode-elements">
				<a href="javascript:bb_display_block(\'1\', \'shout-contents\');" onmouseover="bb_hide_block(\'1\', \'shout-contents\', 1);" onmouseout="bb_hide_block(\'1\', \'shout-contents\', 0);" class="fa bbcode-icon-smileys" title="' . LangLoader::get_message('bb_smileys', 'common', 'BBCode') . '"></a>
				<div class="bbcode-block-container" style="display: none;" id="bb-block1shout-contents">
					<ul class="bbcode-block block-smileys" onmouseover="bb_hide_block(\'1\', \'shout-contents\', 1);" onmouseout="bb_hide_block(\'1\', \'shout-contents\', 0);">
						';foreach($_data->get_block('smileys') as $_tmp_smileys){$_result.='
						<li>
							<a href="" onclick="insertbbcode(\'' . $_data->get_from_list('CODE', $_tmp_smileys) . '\', \'smile\', \'shout-contents\');return false;" class="bbcode-hover" title="' . $_data->get_from_list('CODE', $_tmp_smileys) . '"><img src="' . $_data->get_from_list('URL', $_tmp_smileys) . '" alt="' . $_data->get_from_list('CODE', $_tmp_smileys) . '"></a>
						</li>
						';}$_result.='
					</ul>
				</div>
			</li>
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-bold';if ($_data->is_true($_data->get('C_BOLD_DISABLED'))){$_result.=' icon-disabled';}$_result.='" onclick="';if (!$_data->is_true($_data->get('C_BOLD_DISABLED'))){$_result.='insertbbcode(\'[b]\', \'[/b]\', \'shout-contents\');';}$_result.='return false;" title="' . LangLoader::get_message('bb_bold', 'common', 'BBCode') . '"></a>
			</li>
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-italic';if ($_data->is_true($_data->get('C_ITALIC_DISABLED'))){$_result.=' icon-disabled';}$_result.='" onclick="';if (!$_data->is_true($_data->get('C_ITALIC_DISABLED'))){$_result.='insertbbcode(\'[i]\', \'[/i]\', \'shout-contents\');';}$_result.='return false;" title="' . LangLoader::get_message('bb_italic', 'common', 'BBCode') . '"></a>
			</li>
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-underline';if ($_data->is_true($_data->get('C_UNDERLINE_DISABLED'))){$_result.=' icon-disabled';}$_result.='" onclick="';if (!$_data->is_true($_data->get('C_UNDERLINE_DISABLED'))){$_result.='insertbbcode(\'[u]\', \'[/u]\', \'shout-contents\');';}$_result.='return false;" title="' . LangLoader::get_message('bb_underline', 'common', 'BBCode') . '"></a>
			</li>
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-strike';if ($_data->is_true($_data->get('C_STRIKE_DISABLED'))){$_result.=' icon-disabled';}$_result.='" onclick="';if (!$_data->is_true($_data->get('C_STRIKE_DISABLED'))){$_result.='insertbbcode(\'[s]\', \'[/s]\', \'shout-contents\');';}$_result.='return false;" title="' . LangLoader::get_message('bb_strike', 'common', 'BBCode') . '"></a>
			</li>
		</ul>
		';}$_result.='
	</div>
	<p class="shout-spacing">
		<button onclick="shoutbox_add_message();" type="button">' . LangLoader::get_message('submit', 'main') . '</button>
		<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
		<a href="" onclick="shoutbox_refresh_messages_box();return false;" id="shoutbox-refresh" title="' . LangLoader::get_message('refresh', 'main') . '"><i class="fa fa-refresh"></i></a>
	</p>
</form>
';}else{$_result.='
	';if ($_data->is_true($_data->get('C_DISPLAY_NO_WRITE_AUTHORIZATION_MESSAGE'))){$_result.='
	<div class="spacer"></div>
	<span class="warning">' . $_functions->i18n('error.post.unauthorized') . '</span>
	<p class="shout-spacing">
		<a href="" onclick="shoutbox_refresh_messages_box();return false;" id="shoutbox-refresh" title="' . LangLoader::get_message('refresh', 'main') . '"><i class="fa fa-refresh"></i></a>
	</p>
	';}$_result.='
';}$_result.='
<a class="small" href="' . $_functions->relative_url(ShoutboxUrlBuilder::home()) . '" title="' . $_functions->i18n('archives.link') . '">' . $_functions->i18n('archives') . '</a>
'; ?>