<?php $_result='<div id="module-mini-search"';if ($_data->is_true($_data->get('C_HIDDEN_WITH_SMALL_SCREENS'))){$_result.=' class="hidden-small-screens"';}$_result.='>
	<script>
	<!--
		function check_search_mini_form_post()
		{
			var textSearched = document.getElementById(\'TxTMiniSearched\').value;
			if (textSearched.length > 3)
			{
				textSearched = escape_xmlhttprequest(textSearched);
				return true;
			}
			else
			{
				alert(\'' . $_data->get('WARNING_LENGTH_STRING_SEARCH') . '\');
				return false;
			}
		}
		
		jQuery(document).ready(function() {
			jQuery(\'#search-token\').val(TOKEN);
		});
	-->
	</script>

	<form action="' . $_data->get('U_FORM_VALID') . '" onsubmit="return check_search_mini_form_post();" method="post">
		<div id="mini-search-form" class="input-element-button">
			<input type="search" id="TxTMiniSearched" title="' . $_data->get('L_SEARCH_TITLE') . '" name="q" value="' . $_data->get('TEXT_SEARCHED') . '" placeholder="' . $_data->get('L_SEARCH') . '...">
			<input type="hidden" id="search-token" name="token" value="' . $_data->get('TOKEN') . '">
			<button type="submit" name="search_submit"><i class="fa fa-search"></i></button>
		</div>
		';if ($_data->is_true($_data->get('C_VERTICAL'))){$_result.='<a href="' . $_data->get('U_ADVANCED_SEARCH') . '" class="small">' . $_data->get('L_ADVANCED_SEARCH') . '</a>';}$_result.='
	</form>
</div>
'; ?>