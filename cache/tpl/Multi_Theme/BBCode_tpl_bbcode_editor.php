<?php $_result='';if ($_data->is_true($_data->get('C_EDITOR_NOT_ALREADY_INCLUDED'))){$_result.='
<script>
<!--
function XMLHttpRequest_preview(field)
{
	if( XMLHttpRequest_preview.arguments.length == 0 )
		field = ' . $_functions->escapejs($_data->get('FIELD')) . ';

	var contents = jQuery(\'#\' + field).val();
	var preview_field = \'xmlhttprequest-preview\' + field;

	if( contents != "" )
	{
		jQuery("#" + preview_field).slideDown(500);

		jQuery(\'#loading-preview-\' + field).show();

		jQuery.ajax({
			url: PATH_TO_ROOT + "/kernel/framework/ajax/content_xmlhttprequest.php",
			type: "post",
			data: {
				token: \'' . $_data->get('TOKEN') . '\',
				path_to_root: \'' . $_data->get('PHP_PATH_TO_ROOT') . '\',
				editor: \'BBCode\',
				page_path: \'' . $_data->get('PAGE_PATH') . '\',
				contents: contents,
				ftags: \'' . $_data->get('FORBIDDEN_TAGS') . '\'
			},
			success: function(returnData){
				jQuery(\'#\' + preview_field).html(returnData);
				jQuery(\'#loading-preview-\' + field).hide();
			}
		});
	}
	else
		alert("' . LangLoader::get_message('require_text', 'main') . '");
}
-->
</script>
<script src="' . $_data->get('PATH_TO_ROOT') . '/BBCode/templates/js/bbcode.js"></script>
';}$_result.='

<div id="loading-preview-' . $_data->get('FIELD') . '" class="loading-preview-container" style="display: none;">
	<div class="loading-preview">
		<i class="fa fa-spinner fa-2x fa-spin"></i>
	</div>
</div>

<div id="xmlhttprequest-preview' . $_data->get('FIELD') . '" class="xmlhttprequest-preview" style="display: none;"></div>

<div id="bbcode-expanded" class="bbcode expand">
	<div class="bbcode-containers">
		<ul id="bbcode-container-smileys" class="bbcode-container">
			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_SMILEYS') . 'bb_display_block(\'1\', \'' . $_data->get('FIELD') . '\');return false;" onmouseover="' . $_data->get('DISABLED_SMILEYS') . 'bb_hide_block(\'1\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'1\', \'' . $_data->get('FIELD') . '\', 0);" class="bbcode-hover' . $_data->get('AUTH_SMILEYS') . '" title="' . $_functions->i18n('bb_smileys') . '">
					<i class="fa bbcode-icon-smileys"></i>
				</a>
				<div id="bb-block1' . $_data->get('FIELD') . '" class="bbcode-block-container" style="display: none;">
					<ul class="bbcode-block bbcode-block-smileys" onmouseover="bb_hide_block(\'1\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'1\', \'' . $_data->get('FIELD') . '\', 0);">
						';foreach($_data->get_block('smileys') as $_tmp_smileys){$_result.='
							<li>
							<a href="" onclick="insertbbcode(\'' . $_data->get_from_list('CODE', $_tmp_smileys) . '\', \'smile\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'1\', \'' . $_data->get('FIELD') . '\', 0);return false;" class="bbcode-hover" title="' . $_data->get_from_list('CODE', $_tmp_smileys) . '"><img src="' . $_data->get_from_list('URL', $_tmp_smileys) . '" title="' . $_data->get_from_list('CODE', $_tmp_smileys) . '" alt="' . $_data->get_from_list('CODE', $_tmp_smileys) . '"></a>
							</li>
						';}$_result.='
					</ul>
				</div>
			</li>
		</ul>

		<ul id="bbcode-container-fonts" class="bbcode-container">
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-bold' . $_data->get('AUTH_B') . '" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[b]\', \'[/b]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_bold') . '"></a>
			</li>

			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-italic' . $_data->get('AUTH_I') . '" onclick="' . $_data->get('DISABLED_I') . 'insertbbcode(\'[i]\', \'[/i]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_italic') . '"></a>
			</li>

			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-underline' . $_data->get('AUTH_U') . '" onclick="' . $_data->get('DISABLED_U') . 'insertbbcode(\'[u]\', \'[/u]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_underline') . '"></a>
			</li>

			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-strike' . $_data->get('AUTH_S') . '" onclick="' . $_data->get('DISABLED_S') . 'insertbbcode(\'[s]\', \'[/s]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_strike') . '"></a>
			</li>

			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_COLOR') . 'bbcode_color(\'5\', \'' . $_data->get('FIELD') . '\', \'color\');bb_display_block(\'5\', \'' . $_data->get('FIELD') . '\');return false;" onmouseout="' . $_data->get('DISABLED_COLOR') . 'bb_hide_block(\'5\', \'' . $_data->get('FIELD') . '\', 0);" title="' . $_functions->i18n('bb_color') . '" class="' . $_data->get('AUTH_COLOR') . '">
					<i class="fa bbcode-icon-color"></i>
				</a>
				<div id="bb-block5' . $_data->get('FIELD') . '" class="bbcode-block-container color-picker" style="display: none;">
					<div id="bb-color' . $_data->get('FIELD') . '" class="bbcode-block" onmouseover="bb_hide_block(\'5\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'5\', \'' . $_data->get('FIELD') . '\', 0);">
					</div>
				</div>
			</li>
			
			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_SIZE') . 'bb_display_block(\'6\', \'' . $_data->get('FIELD') . '\');return false;" onmouseout="' . $_data->get('DISABLED_SIZE') . 'bb_hide_block(\'6\', \'' . $_data->get('FIELD') . '\', 0);" class="bbcode-hover' . $_data->get('AUTH_SIZE') . '" title="' . $_functions->i18n('bb_size') . '">
					<i class="fa bbcode-icon-size"></i>
				</a>
				<div id="bb-block6' . $_data->get('FIELD') . '" class="bbcode-block-container" style="display: none;">
					<ul class="bbcode-block bbcode-block-list bbcode-block-size" onmouseover="bb_hide_block(\'6\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'6\', \'' . $_data->get('FIELD') . '\', 0);">
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[size=5]\', \'[/size]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'6\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_size', 'editor-common') . ' 05"> 05 </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[size=10]\', \'[/size]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'6\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_size', 'editor-common') . ' 10"> 10 </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[size=15]\', \'[/size]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'6\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_size', 'editor-common') . ' 15"> 15 </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[size=20]\', \'[/size]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'6\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_size', 'editor-common') . ' 20"> 20 </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[size=25]\', \'[/size]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'6\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_size', 'editor-common') . ' 25"> 25 </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[size=30]\', \'[/size]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'6\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_size', 'editor-common') . ' 30"> 30 </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[size=35]\', \'[/size]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'6\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_size', 'editor-common') . ' 35"> 35 </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[size=40]\', \'[/size]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'6\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_size', 'editor-common') . ' 40"> 40 </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[size=45]\', \'[/size]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'6\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_size', 'editor-common') . ' 45"> 45 </a></li>
					</ul>
				</div>
			</li>
			
			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_FONT') . 'bb_display_block(\'10\', \'' . $_data->get('FIELD') . '\');return false;" onmouseout="' . $_data->get('DISABLED_FONT') . 'bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);" class="bbcode-hover' . $_data->get('AUTH_FONT') . '" title="' . $_functions->i18n('bb_font') . '">
					<i class="fa bbcode-icon-font"></i>
				</a>
				<div id="bb-block10' . $_data->get('FIELD') . '" class="bbcode-block-container" style="display: none;">
					<ul class="bbcode-block bbcode-block-list bbcode-block-fonts" onmouseover="bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);">
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=andale mono]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Andale Mono"> <span style="font-family: andale mono;">Andale Mono</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=arial]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Arial"> <span style="font-family: arial;">Arial</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=arial black]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Arial Black"> <span style="font-family: arial black;">Arial Black</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=book antiqua]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Book Antiqua"> <span style="font-family: book antiqua;">Book Antiqua</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=comic sans ms]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Comic Sans MS"> <span style="font-family: comic sans ms;">Comic Sans MS</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=courier new]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Courier New"> <span style="font-family: courier new;">Courier New</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=georgia]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Georgia"> <span style="font-family: georgia;">Georgia</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=helvetica]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Helvetica"> <span style="font-family: helvetica;">Helvetica</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=impact]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Impact"> <span style="font-family: impact;">Impact</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=symbol]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Symbol"> <span style="font-family: symbol;">Symbol</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=tahoma]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Tahoma"> <span style="font-family: tahoma;">Tahoma</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=terminal]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Terminal"> <span style="font-family: terminal;">Terminal</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=times new roman]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Times New Roman"> <span style="font-family: times new roman;">Times New Roman</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=trebuchet ms]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Trebuchet MS"> <span style="font-family: trebuchet ms;">Trebuchet MS</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=verdana]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Verdana"> <span style="font-family: verdana;">Verdana</span> </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=webdings]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Webdings"> Webdings </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[font=wingdings]\', \'[/font]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'10\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_font', 'editor-common') . ' Wingdings"> Wingdings </a></li>
					</ul>
				</div>
			</li>
		</ul>

		<ul id="bbcode-container-titles" class="bbcode-container">
			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_TITLE') . 'bb_display_block(\'2\', \'' . $_data->get('FIELD') . '\');return false;" onmouseout="' . $_data->get('DISABLED_TITLE') . 'bb_hide_block(\'2\', \'' . $_data->get('FIELD') . '\', 0);" class="bbcode-hover' . $_data->get('AUTH_TITLE') . '" title="' . $_functions->i18n('bb_title') . '">
					<i class="fa bbcode-icon-title"></i>
				</a>
				<div id="bb-block2' . $_data->get('FIELD') . '" class="bbcode-block-container" style="display: none;">
					<ul class="bbcode-block bbcode-block-list bbcode-block-title" onmouseover="bb_hide_block(\'2\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'2\', \'' . $_data->get('FIELD') . '\', 0);">
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[title=1]\', \'[/title]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'2\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_title', 'editor-common') . ' 1"> ' . LangLoader::get_message('format_title', 'editor-common') . ' 1 </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[title=2]\', \'[/title]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'2\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_title', 'editor-common') . ' 2"> ' . LangLoader::get_message('format_title', 'editor-common') . ' 2 </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[title=3]\', \'[/title]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'2\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_title', 'editor-common') . ' 3"> ' . LangLoader::get_message('format_title', 'editor-common') . ' 3 </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[title=4]\', \'[/title]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'2\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_title', 'editor-common') . ' 4"> ' . LangLoader::get_message('format_title', 'editor-common') . ' 4 </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[title=5]\', \'[/title]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'2\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('format_title', 'editor-common') . ' 5"> ' . LangLoader::get_message('format_title', 'editor-common') . ' 5 </a></li>
					</ul>
				</div>
			</li>

			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_LIST') . 'bb_display_block(\'9\', \'' . $_data->get('FIELD') . '\');return false;" onmouseout="' . $_data->get('DISABLED_LIST') . 'bb_hide_block(\'9\', \'' . $_data->get('FIELD') . '\', 0);" class="bbcode-hover' . $_data->get('AUTH_LIST') . '" title="' . $_functions->i18n('bb_list') . '">
					<i class="fa bbcode-icon-list"></i>
				</a>
				<div id="bb-block9' . $_data->get('FIELD') . '" class="bbcode-block-container" style="display: none;">
					<div class="bbcode-block bbcode-block-ul" onmouseover="bb_hide_block(\'9\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'9\', \'' . $_data->get('FIELD') . '\', 0);">
						<div class="form-element">
							<label class="smaller" for="bb_list' . $_data->get('FIELD') . '">' . $_functions->i18n('lines') . '</label>
							<div class="form-field">
								<input id="bb_list' . $_data->get('FIELD') . '" class="field-smaller" size="3" type="text" name="bb_list' . $_data->get('FIELD') . '" maxlength="3" value="3">
							</div>
						</div>
						<div class="form-element">
							<label class="smaller" for="bb_ordered_list' . $_data->get('FIELD') . '">' . $_functions->i18n('ordered_list') . '</label>
							<div class="form-field">
								<input id="bb_ordered_list' . $_data->get('FIELD') . '" type="checkbox" name="bb_ordered_list' . $_data->get('FIELD') . '" >
							</div>
						</div>
						<div class="bbcode-form-element-text">
							<a class="small" href="" onclick="' . $_data->get('DISABLED_LIST') . 'bbcode_list(\'' . $_data->get('FIELD') . '\');bb_hide_block(\'9\', \'' . $_data->get('FIELD') . '\', 0);return false;">
								<i class="fa bbcode-icon-list valign-middle" title="' . $_functions->i18n('bb_list') . '"></i> ' . $_functions->i18n('insert_list') . '
							</a>
						</div>
					</div>
				</div>
			</li>
		</ul>

		<ul id="bbcode-container-blocks" class="bbcode-container">
			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_BLOCK') . 'bb_display_block(\'3\', \'' . $_data->get('FIELD') . '\');return false;" onmouseout="' . $_data->get('DISABLED_BLOCK') . 'bb_hide_block(\'3\', \'' . $_data->get('FIELD') . '\', 0);" class="bbcode-hover' . $_data->get('AUTH_BLOCK') . '" title="' . $_functions->i18n('bb_container') . '">
					<i class="fa bbcode-icon-subtitle"></i>
				</a>
				<div id="bb-block3' . $_data->get('FIELD') . '" class="bbcode-block-container" style="display: none;">
					<ul class="bbcode-block bbcode-block-list bbcode-block-block" onmouseover="bb_hide_block(\'3\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'3\', \'' . $_data->get('FIELD') . '\', 0);">
						<li><a href="" onclick="' . $_data->get('DISABLED_BLOCK') . 'insertbbcode(\'[p]\', \'[/p]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'3\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_functions->i18n('bb_container') . ' ' . $_functions->i18n('bb_paragraph_title') . '"> ' . $_functions->i18n('bb_paragraph') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_BLOCK') . 'insertbbcode(\'[block]\', \'[/block]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'3\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_functions->i18n('bb_container') . ' ' . $_functions->i18n('bb_block_title') . '"> ' . $_functions->i18n('bb_block') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_BLOCK') . 'bbcode_fieldset(\'' . $_data->get('FIELD') . '\', ' . $_functions->escapejs($_functions->i18n('bb_fieldset_prompt')) . ');return false;" title="' . $_functions->i18n('bb_container') . ' ' . $_functions->i18n('bb_fieldset_title') . '"> ' . $_functions->i18n('bb_fieldset') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_BLOCK') . 'bbcode_abbr(\'' . $_data->get('FIELD') . '\', ' . $_functions->escapejs($_functions->i18n('bb_abbr_prompt')) . ');return false;" title="' . $_functions->i18n('bb_container') . ' ' . $_functions->i18n('bb_abbr_title') . '"> ' . $_functions->i18n('bb_abbr') . ' </a></li>
					</ul>
				</div>
			</li>

			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-quote' . $_data->get('AUTH_QUOTE') . '" onclick="' . $_data->get('DISABLED_QUOTE') . 'insertbbcode(\'[quote]\', \'[/quote]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_quote') . '"></a>
			</li>

			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_HIDE') . 'bb_display_block(\'11\', \'' . $_data->get('FIELD') . '\');return false;" onmouseout="' . $_data->get('DISABLED_HIDE') . 'bb_hide_block(\'11\', \'' . $_data->get('FIELD') . '\', 0);" class="bbcode-hover' . $_data->get('AUTH_HIDE') . '" title="' . $_functions->i18n('bb_hide') . '">
					<i class="fa bbcode-icon-hide"></i>
				</a>
				<div class="bbcode-block-container" style="display: none;" id="bb-block11' . $_data->get('FIELD') . '">
					<ul class="bbcode-block bbcode-block-list bbcode-block-hide" onmouseover="bb_hide_block(\'11\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'11\', \'' . $_data->get('FIELD') . '\', 0);">
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[hide]\', \'[/hide]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'11\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_functions->i18n('bb_hide_all') . ' "> ' . $_functions->i18n('bb_hide') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[member]\', \'[/member]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'11\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_functions->i18n('bb_hide_view_member') . '"> ' . $_functions->i18n('bb_member') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[moderator]\', \'[/moderator]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'11\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_functions->i18n('bb_hide_view_moderator') . '  "> ' . $_functions->i18n('bb_moderator') . ' </a></li>
					</ul>
				</div>
			</li>

			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_STYLE') . 'bb_display_block(\'4\', \'' . $_data->get('FIELD') . '\');return false;" onmouseout="' . $_data->get('DISABLED_STYLE') . 'bb_hide_block(\'4\', \'' . $_data->get('FIELD') . '\', 0);" class="bbcode-hover' . $_data->get('AUTH_STYLE') . '" title="' . $_functions->i18n('bb_style') . '">
					<i class="fa bbcode-icon-style"></i>
				</a>
				<div class="bbcode-block-container" style="display: none;" id="bb-block4' . $_data->get('FIELD') . '">
					<ul class="bbcode-block bbcode-block-list bbcode-block-message" onmouseover="bb_hide_block(\'4\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'4\', \'' . $_data->get('FIELD') . '\', 0);">
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[style=success]\', \'[/style]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'4\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('style', 'main') . ' ' . LangLoader::get_message('success', 'main') . '"> ' . LangLoader::get_message('success', 'main') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[style=question]\', \'[/style]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'4\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('style', 'main') . ' ' . LangLoader::get_message('question', 'main') . '"> ' . LangLoader::get_message('question', 'main') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[style=notice]\', \'[/style]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'4\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('style', 'main') . ' ' . LangLoader::get_message('notice', 'main') . '"> ' . LangLoader::get_message('notice', 'main') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[style=warning]\', \'[/style]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'4\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('style', 'main') . ' ' . LangLoader::get_message('warning', 'main') . '"> ' . LangLoader::get_message('warning', 'main') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[style=error]\', \'[/style]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'4\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . LangLoader::get_message('style', 'main') . ' ' . LangLoader::get_message('error', 'main') . '"> ' . LangLoader::get_message('error', 'main') . ' </a></li>
					</ul>
				</div>
			</li>
		</ul>

		<ul id="bbcode-container-links" class="bbcode-container">
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-url' . $_data->get('AUTH_URL') . '" onclick="' . $_data->get('DISABLED_URL') . 'bbcode_url(\'' . $_data->get('FIELD') . '\', ' . $_functions->escapejs($_functions->i18n('bb_url_prompt')) . ');return false;" title="' . $_functions->i18n('bb_link') . '"></a>
			</li>
		</ul>

		<ul id="bbcode-container-pictures" class="bbcode-container">
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-image' . $_data->get('AUTH_IMG') . '" onclick="' . $_data->get('DISABLED_IMG') . 'insertbbcode(\'[img]\', \'[/img]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_picture') . '"></a>
			</li>

			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-lightbox' . $_data->get('AUTH_LIGHTBOX') . '" onclick="' . $_data->get('DISABLED_lightbox') . 'bbcode_lightbox(\'' . $_data->get('FIELD') . '\', ' . $_functions->escapejs($_functions->i18n('bb_url_prompt')) . ');return false;" title="' . $_functions->i18n('bb_lightbox') . '"></a>
			</li>
		</ul>

		';if ($_data->is_true($_data->get('C_UPLOAD_MANAGEMENT'))){$_result.='
		<ul id="bbcode-container-upload" class="bbcode-container">
			<li class="bbcode-elements">
				<a title="' . $_functions->i18n('bb_upload') . '" href="#" onclick="window.open(\'' . $_data->get('PATH_TO_ROOT') . '/user/upload.php?popup=1&amp;fd=' . $_data->get('FIELD') . '&amp;edt=BBCode\', \'\', \'height=550,width=720,resizable=yes,scrollbars=yes\');return false;">
					<i class="fa bbcode-icon-upload"></i>
				</a>
			</li>
		</ul>
		';}$_result.='
		
		<span class="bbcode-backspace"><br /></span>

		<ul id="bbcode-container-fa" class="bbcode-container bbcode-container-more">
			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_FA') . 'bb_display_block(\'12\', \'' . $_data->get('FIELD') . '\');return false;" onmouseover="' . $_data->get('DISABLED_FA') . 'bb_hide_block(\'12\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'12\', \'' . $_data->get('FIELD') . '\', 0);" class="bbcode-hover' . $_data->get('AUTH_FA') . '" title="' . $_functions->i18n('bb_fa') . '">
					<i class="fa bbcode-icon-fa"></i>
				</a>
				<div id="bb-block12' . $_data->get('FIELD') . '" class="bbcode-block-container" style="display: none;">
					<ul class="bbcode-block bbcode-block-fa" onmouseover="bb_hide_block(\'12\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'12\', \'' . $_data->get('FIELD') . '\', 0);">
						';foreach($_data->get_block('code_fa') as $_tmp_code_fa){$_result.='
						<li>
							<a href="" onclick="' . $_data->get('DISABLED_FA') . 'insertbbcode(\'[fa]' . $_data->get_from_list('CODE', $_tmp_code_fa) . '[/fa]\', \'\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'12\', \'' . $_data->get('FIELD') . '\', 0);return false;" class="bbcode-hover" title="' . $_data->get_from_list('CODE', $_tmp_code_fa) . '"><i class="fa fa-' . $_data->get_from_list('CODE', $_tmp_code_fa) . '"></i></a>
						</li>
						';}$_result.='
					</ul>
				</div>
			</li>
		</ul>

		<ul id="bbcode-container-positions" class="bbcode-container bbcode-container-more">
			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_ALIGN') . 'bb_display_block(\'13\', \'' . $_data->get('FIELD') . '\');return false;" onmouseover="' . $_data->get('DISABLED_ALIGN') . 'bb_hide_block(\'13\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'13\', \'' . $_data->get('FIELD') . '\', 0);" class="bbcode-hover' . $_data->get('AUTH_ALIGN') . '" title="' . $_functions->i18n('bb_align') . '">
					<i class="fa bbcode-icon-left"></i>
				</a>
				<div class="bbcode-block-container" style="display: none;" id="bb-block13' . $_data->get('FIELD') . '">
					<ul class="bbcode-block bbcode-block-list bbcode-block-aligns" onmouseover="bb_hide_block(\'13\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'13\', \'' . $_data->get('FIELD') . '\', 0);">
						<li><a href="" onclick="' . $_data->get('DISABLED_ALIGN') . 'insertbbcode(\'[align=left]\', \'[/align]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_left_title') . '"> ' . $_functions->i18n('bb_left') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_ALIGN') . 'insertbbcode(\'[align=center]\', \'[/align]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_center_title') . '"> ' . $_functions->i18n('bb_center') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_ALIGN') . 'insertbbcode(\'[align=right]\', \'[/align]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_left_title') . '"> ' . $_functions->i18n('bb_right') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_ALIGN') . 'insertbbcode(\'[align=justify]\', \'[/align]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_justify_title') . '"> ' . $_functions->i18n('bb_justify') . ' </a></li>
					</ul>
				</div>
			</li>
			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_POSITIONS') . 'bb_display_block(\'14\', \'' . $_data->get('FIELD') . '\');return false;" onmouseover="' . $_data->get('DISABLED_POSITIONS') . 'bb_hide_block(\'14\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'14\', \'' . $_data->get('FIELD') . '\', 0);" class="bbcode-hover' . $_data->get('AUTH_POSITIONS') . '" title="' . $_functions->i18n('bb_positions') . '">
					<i class="fa bbcode-icon-indent"></i>
				</a>
				<div class="bbcode-block-container" style="display: none;" id="bb-block14' . $_data->get('FIELD') . '">
					<ul class="bbcode-block bbcode-block-list bbcode-block-positions" onmouseover="bb_hide_block(\'14\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'14\', \'' . $_data->get('FIELD') . '\', 0);">
						<li><a href="" onclick="' . $_data->get('DISABLED_FLOAT') . 'insertbbcode(\'[float=left]\', \'[/float]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_float_left_title') . '" class="' . $_data->get('AUTH_ALIGN') . '"> ' . $_functions->i18n('bb_float_left') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_FLOAT') . 'insertbbcode(\'[float=right]\', \'[/float]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_float_right_title') . '" class="' . $_data->get('AUTH_ALIGN') . '"> ' . $_functions->i18n('bb_float_right') . ' </a></li>
						<li><a href="" onclick="' . $_data->get('DISABLED_INDENT') . 'insertbbcode(\'[indent]\', \'[/indent]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_indent_title') . '" class="' . $_data->get('AUTH_INDENT') . '"> ' . $_functions->i18n('bb_indent') . ' </a></li>
					</ul>
				</div>
			</li>
			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_TABLE') . 'bb_display_block(\'7\', \'' . $_data->get('FIELD') . '\');return false;" onmouseover="' . $_data->get('DISABLED_TABLE') . 'bb_hide_block(\'7\', \'' . $_data->get('FIELD') . '\', 1);" class="bbcode-hover' . $_data->get('AUTH_TABLE') . '" title="' . $_functions->i18n('bb_table') . '">
					<i class="fa bbcode-icon-table"></i>
				</a>
				<div id="bb-block7' . $_data->get('FIELD') . '" class="bbcode-block-container" style="display: none;">
					<div id="bbtable' . $_data->get('FIELD') . '" class="bbcode-block bbcode-block-table" onmouseover="bb_hide_block(\'7\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'7\', \'' . $_data->get('FIELD') . '\', 0);">
						<div class="form-element">
							<label class="smaller" for="bb-lines' . $_data->get('FIELD') . '">' . $_functions->i18n('lines') . '</label>
							<div class="form-field">
								<input type="text" maxlength="2" name="bb-lines' . $_data->get('FIELD') . '" id="bb-lines' . $_data->get('FIELD') . '" value="2" class="field-smaller">
							</div>
						</div>
						<div class="form-element">
							<label class="smaller" for="bb-cols' . $_data->get('FIELD') . '">' . $_functions->i18n('cols') . '</label>
							<div class="form-field">
								<input type="text" maxlength="2" name="bb-cols' . $_data->get('FIELD') . '" id="bb-cols' . $_data->get('FIELD') . '" value="2" class="field-smaller">
							</div>
						</div>
						<div class="form-element">
							<label class="smaller" for="bb-head' . $_data->get('FIELD') . '">' . $_functions->i18n('head_add') . '</label>
							<div class="form-field">
								<input type="checkbox" name="bb-head' . $_data->get('FIELD') . '" id="bb-head' . $_data->get('FIELD') . '" class="field-smaller">
							</div>
						</div>
						<div class="bbcode-form-element-text">
							<a class="small" href="" onclick="' . $_data->get('DISABLED_TABLE') . 'bbcode_table(\'' . $_data->get('FIELD') . '\', \'' . $_functions->i18n('head_table') . '\');bb_hide_block(\'7\', \'' . $_data->get('FIELD') . '\', 0);return false;">
								<i class="fa bbcode-icon-table" title="' . $_functions->i18n('bb_table') . '"></i> ' . $_functions->i18n('insert_table') . '
							</a>
						</div>
					</div>
				</div>
			</li>
		</ul>
		
		<ul id="bbcode-container-exp" class="bbcode-container bbcode-container-more">
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-sup' . $_data->get('AUTH_SUP') . '" onclick="' . $_data->get('DISABLED_SUP') . 'insertbbcode(\'[sup]\', \'[/sup]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_sup') . '"></a>
			</li>
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-sub' . $_data->get('AUTH_SUB') . '" onclick="' . $_data->get('DISABLED_SUB') . 'insertbbcode(\'[sub]\', \'[/sub]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_sub') . '"></a>
			</li>
			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_BGCOLOR') . 'bbcode_color(\'15\', \'' . $_data->get('FIELD') . '\', \'bgcolor\');bb_display_block(\'15\', \'' . $_data->get('FIELD') . '\');return false;" onmouseout="' . $_data->get('DISABLED_BGCOLOR') . 'bb_hide_block(\'15\', \'' . $_data->get('FIELD') . '\', 0);" title="' . $_functions->i18n('bb_bgcolor') . '" class="' . $_data->get('AUTH_BGCOLOR') . '">
					<i class="fa bbcode-icon-bgcolor"></i>
				</a>
				<div id="bb-block15' . $_data->get('FIELD') . '" class="bbcode-block-container color-picker" style="display: none;">
					<div id="bb-bgcolor' . $_data->get('FIELD') . '" class="bbcode-block" onmouseover="bb_hide_block(\'15\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'5\', \'' . $_data->get('FIELD') . '\', 0);">
					</div>
				</div>
			</li>
		</ul>

		<ul id="bbcode-container-anchor" class="bbcode-container bbcode-container-more">
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-anchor' . $_data->get('AUTH_ANCHOR') . '" onclick="' . $_data->get('DISABLED_ANCHOR') . 'bbcode_anchor(\'' . $_data->get('FIELD') . '\', ' . $_functions->escapejs($_functions->i18n('bb_anchor_prompt')) . ');return false;" title="' . $_functions->i18n('bb_anchor') . '"></a>
			</li>
		</ul>

		<ul id="bbcode-container-movies" class="bbcode-container bbcode-container-more">
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-flash' . $_data->get('AUTH_SWF') . '" onclick="' . $_data->get('DISABLED_SWF') . 'insertbbcode(\'[swf=425,344]\', \'[/swf]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_swf') . '"></a>
			</li>
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-movie' . $_data->get('AUTH_MOVIE') . '" onclick="' . $_data->get('DISABLED_MOVIE') . 'insertbbcode(\'[movie=100,100]\', \'[/movie]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_movie') . '"></a>
			</li>
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-youtube' . $_data->get('AUTH_YOUTUBE') . '" onclick="' . $_data->get('DISABLED_YOUTUBE') . 'insertbbcode(\'[youtube]\', \'[/youtube]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_youtube') . '"></a>
			</li>
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-sound' . $_data->get('AUTH_SOUND') . '" onclick="' . $_data->get('DISABLED_SOUND') . 'insertbbcode(\'[sound]\', \'[/sound]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_sound') . '"></a>
			</li>
		</ul>
		
		<ul id="bbcode-container-code" class="bbcode-container bbcode-container-more">
			<li class="bbcode-elements">
				<a href="" onclick="' . $_data->get('DISABLED_CODE') . 'bb_display_block(\'8\', \'' . $_data->get('FIELD') . '\');return false;" onmouseout="' . $_data->get('DISABLED_CODE') . 'bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);" class="bbcode-hover' . $_data->get('AUTH_CODE') . '" title="' . $_functions->i18n('bb_code') . '">
					<i class="fa bbcode-icon-code"></i>
				</a>
				<div id="bb-block8' . $_data->get('FIELD') . '" class="bbcode-block-container" style="display: none;">
					<div class="bbcode-block bbcode-block-list bbcode-block-code" onmouseover="bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 1);" onmouseout="bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);">
						<ul>
							<li class="bbcode-code-title"><span>' . $_functions->i18n('bb_text') . '</span></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=text]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' text">Text</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=sql]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' sql">SqL</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=xml]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' xml">Xml</a></li>

							<li class="bbcode-code-title"><span>' . $_functions->i18n('phpboost_languages') . '</span></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=bbcode]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' bbcode">BBCode</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=tpl]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' template">Template</a></li>

							<li class="bbcode-code-title"><span>' . $_functions->i18n('bb_script') . '</span></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=php]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' php">PHP</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=asp]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' asp">Asp</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=python]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' python">Python</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=pearl]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' text">Pearl</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=ruby]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' ruby">Ruby</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=bash]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' bash">Bash</a></li>

							<li class="bbcode-code-title"><span>' . $_functions->i18n('bb_web') . '</span></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=html]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' html">Html</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=css]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' css">Css</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=javascript]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' javascript">Javascript</a></li>

							<li class="bbcode-code-title"><span>' . $_functions->i18n('bb_prog') . '</span></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=c]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' c">C</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=cpp]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' c++">C++</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=c#]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' c#">C#</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=d]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' d">D</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=go]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' go">Go</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=java]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' java">Java</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=pascal]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' pascal">Pascal</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=delphi]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' delphi">Delphi</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=fortran]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' fortran">Fortran</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=vb]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' vb">Vb</a></li>
							<li><a href="" onclick="' . $_data->get('DISABLED_B') . 'insertbbcode(\'[code=asm]\', \'[/code]\', \'' . $_data->get('FIELD') . '\');bb_hide_block(\'8\', \'' . $_data->get('FIELD') . '\', 0);return false;" title="' . $_data->get('L_CODE') . ' asm">Asm</a></li>
						</ul>
					</div>
				</div>
			</li>

			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-math' . $_data->get('AUTH_MATH') . '" onclick="' . $_data->get('DISABLED_MATH') . 'insertbbcode(\'[math]\', \'[/math]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_math') . '"></a>
			</li>
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-html' . $_data->get('AUTH_HTML') . '" onclick="' . $_data->get('DISABLED_HTML') . 'insertbbcode(\'[html]\', \'[/html]\', \'' . $_data->get('FIELD') . '\');return false;" title="' . $_functions->i18n('bb_html') . '"></a>
			</li>
		</ul>

		<ul id="bbcode-container-mail" class="bbcode-container bbcode-container-more">
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-mail' . $_data->get('AUTH_MAIL') . '" onclick="' . $_data->get('DISABLED_MAIL') . 'bbcode_mail(\'' . $_data->get('FIELD') . '\', ' . $_functions->escapejs($_functions->i18n('bb_mail_prompt')) . ');return false;" title="' . $_functions->i18n('bb_mail') . '"></a>
			</li>
		</ul>

		<ul id="bbcode-container-feed" class="bbcode-container bbcode-container-more">
			<li class="bbcode-elements">
				<a href="" class="fa bbcode-icon-feed' . $_data->get('AUTH_FEED') . '" onclick="' . $_data->get('DISABLED_FEED') . 'bbcode_feed(\'' . $_data->get('FIELD') . '\', ' . $_functions->escapejs($_functions->i18n('bb_feed_prompt')) . ');return false;" title="' . $_functions->escape($_functions->i18n('bb_feed')) . '"></a>
			</li>
		</ul>

		<ul id="bbcode-container-help" class="bbcode-container bbcode-container-more">
			<li class="bbcode-elements">
				<a href="https://www.phpboost.com/wiki/bbcode" title="' . $_functions->i18n('bb_help') . '" target="_blank" rel="noopener">
					<i class="fa bbcode-icon-help"></i>
				</a>
			</li>
		</ul>
	</div>

	<div class="bbcode-elements bbcode-elements-more">
		<a href="" title="' . $_functions->i18n('bb_more') . '" onclick="show_bbcode_div(\'bbcode-container-more\');return false;">
			<i class="fa bbcode-icon-more bbcode-hover"></i>
		</a>
	</div>

</div>

<script>
<!--
set_bbcode_preference(\'bbcode-container-more\');
-->
</script>
'; ?>