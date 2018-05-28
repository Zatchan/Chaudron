<?php $_result='<div id="' . $_functions->escape($_data->get('HTML_ID')) . '_field" class="form-element form-element-upload-file';if ($_data->is_true($_data->get('C_REQUIRED_AND_HAS_VALUE'))){$_result.=' constraint-status-right';}$_result.='';if ($_data->is_true($_data->get('C_HAS_FIELD_CLASS'))){$_result.=' ' . $_data->get('FIELD_CLASS') . '';}$_result.='"';if ($_data->is_true($_data->get('C_HIDDEN'))){$_result.=' style="display: none;"';}$_result.='>
	';if ($_data->is_true($_data->get('C_HAS_LABEL'))){$_result.='
		<label for="' . $_functions->escape($_data->get('HTML_ID')) . '">
			' . $_data->get('LABEL') . '
			';if ($_data->is_true($_data->get('C_DESCRIPTION'))){$_result.='
			<span class="field-description">' . $_data->get('DESCRIPTION') . '</span>
			';}$_result.='
		</label>
	';}$_result.='

	<div id="onblurContainerResponse' . $_functions->escape($_data->get('HTML_ID')) . '" class="form-field ';if ($_data->is_true($_data->get('C_AUTH_UPLOAD'))){$_result.='form-field-upload-file';}$_result.=' picture-status-constraint';if ($_data->is_true($_data->get('C_REQUIRED'))){$_result.=' field-required ';}$_result.='">
		<input type="text" name="' . $_functions->escape($_data->get('NAME')) . '" id="' . $_functions->escape($_data->get('HTML_ID')) . '" value="' . $_data->get('VALUE') . '" class="field-xlarge ' . $_functions->escape($_data->get('CLASS')) . '"';if ($_data->is_true($_data->get('C_DISABLED'))){$_result.=' disabled="disabled"';}$_result.='';if ($_data->is_true($_data->get('C_READONLY'))){$_result.=' readonly="readonly"';}$_result.='/>
		';if ($_data->is_true($_data->get('C_AUTH_UPLOAD'))){$_result.='
			<a title="' . LangLoader::get_message('files_management', 'main') . '" href="" class="fa fa-cloud-upload fa-2x" onclick="window.open(\'' . $_data->get('PATH_TO_ROOT') . '/user/upload.php?popup=1&amp;fd=' . $_functions->escape($_data->get('NAME')) . '&amp;parse=true&amp;no_path=true\', \'\', \'height=500,width=720,resizable=yes,scrollbars=yes\');return false;"></a>
		';}$_result.='
		<span class="text-status-constraint" style="display: none;" id="onblurMessageResponse' . $_functions->escape($_data->get('HTML_ID')) . '"></span>
	</div>
</div>
<div id="' . $_functions->escape($_data->get('HTML_ID')) . '_preview"';if ($_data->is_true($_data->get('C_PREVIEW_HIDDEN'))){$_result.=' style="display: none;"';}$_result.=' class="form-element ';if ($_data->is_true($_data->get('C_HAS_FIELD_CLASS'))){$_result.='' . $_data->get('FIELD_CLASS') . '';}$_result.='">
	<label for="' . $_functions->escape($_data->get('HTML_ID')) . '_preview">
		' . LangLoader::get_message('form.picture.preview', 'common') . '
	</label>

	<div class="form-field">
		<img id="' . $_functions->escape($_data->get('HTML_ID')) . '_preview_picture" src="';if (!$_data->is_true($_data->get('C_PREVIEW_HIDDEN'))){$_result.='' . $_data->get('FILE_PATH') . '';}$_result.='" alt="preview" style="vertical-align:top" />
	</div>
</div>

';$_subtpl=$_data->get('ADD_FIELD_JS');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='

<script>
<!--

jQuery("#" + ' . $_functions->escapejs($_data->get('NAME')) . ').blur(function(){
	var fileName = HTMLForms.getField(' . $_functions->escapejs($_data->get('ID')) . ').getValue();
	var extension = fileName.substring(fileName.lastIndexOf(\'.\')+1);
	
	if ((/^(png|gif|jpg|jpeg|tiff|ico|svg)$/i).test(extension)) {
		jQuery(\'#' . $_functions->escape($_data->get('HTML_ID')) . '_preview\').show();
		jQuery.ajax({
			url: PATH_TO_ROOT + \'/kernel/framework/ajax/dispatcher.php?url=/image/preview/\',
			type: "post",
			dataType: "json",
			data: {token: ' . $_functions->escapejs($_data->get('TOKEN')) . ', image: HTMLForms.getField(' . $_functions->escapejs($_data->get('ID')) . ').getValue()},
			beforeSend: function(){
				jQuery(\'#' . $_functions->escape($_data->get('HTML_ID')) . '_preview_picture\').hide();
				jQuery(\'#' . $_functions->escape($_data->get('HTML_ID')) . '_preview_picture\').after(\'<i id="' . $_functions->escape($_data->get('HTML_ID')) . '_preview_loading" class="fa fa-spinner fa-spin"></i>\');
			},
			success: function(returnData){
				jQuery(\'#' . $_functions->escape($_data->get('HTML_ID')) . '_preview_loading\').remove();

				if (returnData.url) {
					jQuery(\'#' . $_functions->escape($_data->get('HTML_ID')) . '_preview_picture\').attr("src", returnData.url);
					jQuery(\'#' . $_functions->escape($_data->get('HTML_ID')) . '_preview_picture\').show();
				} else {
					jQuery(\'#' . $_functions->escape($_data->get('HTML_ID')) . '_preview\').hide();
				}
			},
			error: function(e){
				jQuery(\'#' . $_functions->escape($_data->get('HTML_ID')) . '_preview_loading\').remove();
				jQuery(\'#' . $_functions->escape($_data->get('HTML_ID')) . '_preview\').hide();
			}
		});
	} else {
		jQuery(\'#' . $_functions->escape($_data->get('HTML_ID')) . '_preview\').hide();
	}
});
-->
</script>
'; ?>