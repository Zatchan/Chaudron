<?php $_result='<input name="max_file_size" value="' . $_data->get('MAX_FILE_SIZE') . '" type="hidden" />
<input type="file" name="' . $_functions->escape($_data->get('NAME')) . '" id="' . $_functions->escape($_data->get('HTML_ID')) . '" ';if ($_data->is_true($_data->get('C_DISABLED'))){$_result.=' disabled="disabled" ';}$_result.=' />
<script>
<!--
jQuery("#' . $_functions->escape($_data->get('HTML_ID')) . '").parents("form:first")[0].enctype = "multipart/form-data";
-->
</script>
'; ?>