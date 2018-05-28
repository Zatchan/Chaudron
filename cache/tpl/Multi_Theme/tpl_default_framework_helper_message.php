<?php $_result='<div id="msg-helper-' . $_data->get('ID') . '" class="message-helper ' . $_data->get('MESSAGE_CSS_CLASS') . '">' . $_data->get('MESSAGE_CONTENT') . '</div>
';if ($_data->is_true($_data->get('C_TIMEOUT'))){$_result.='
	<script>
	<!--
		//Javascript timeout to hide this message
		setTimeout(\'jQuery("#msg-helper-' . $_data->get('ID') . '").fadeOut();\', ' . $_data->get('TIMEOUT') . ');
	-->
	</script>
';}$_result.=''; ?>