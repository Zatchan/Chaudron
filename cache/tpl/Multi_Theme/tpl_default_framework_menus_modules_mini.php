<?php $_result='<div id="' . $_data->get('ID') . '" class="module-mini-container';if ($_data->is_true($_data->get('C_HIDDEN_WITH_SMALL_SCREENS'))){$_result.=' hidden-small-screens';}$_result.='">
	<div class="module-mini-top">
		<div class="sub-title">' . $_data->get('TITLE') . '</div>
	</div>
	<div class="module-mini-contents">
		' . $_data->get('CONTENTS') . '
	</div>
	<div class="module-mini-bottom">
	</div>
</div>'; ?>