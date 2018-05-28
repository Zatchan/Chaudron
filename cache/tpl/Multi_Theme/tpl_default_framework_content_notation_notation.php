<?php $_result='';if ($_data->is_true($_data->get('C_STATIC_DISPLAY'))){$_result.='
	';if ($_data->is_true($_data->get('C_NOTES'))){$_result.='
		<div class="static-notation" itemprop="aggregateRating" itemscope="itemscope" itemtype="http://schema.org/AggregateRating">
			';foreach($_data->get_block('star') as $_tmp_star){$_result.='
				<a href="" onclick="return false;" class="fa star ';if ($_data->is_true($_data->get_from_list('STAR_EMPTY', $_tmp_star))){$_result.='fa-star-o';}$_result.='';if ($_data->is_true($_data->get_from_list('STAR_HALF', $_tmp_star))){$_result.='fa-star-half-o';}$_result.='';if ($_data->is_true($_data->get_from_list('STAR_FULL', $_tmp_star))){$_result.='fa-star';}$_result.='"></a>
			';}$_result.='
			<meta itemprop="ratingCount" content="' . $_data->get('NUMBER_NOTES') . '">
			<meta itemprop="ratingValue" content="' . $_data->get('AVERAGE_NOTES') . '">
			<meta itemprop="bestRating" content="' . $_data->get('NOTATION_SCALE') . '">
		</div>
	';}else{$_result.='
		<span>' . $_data->get('L_NO_NOTE') . '</span>
	';}$_result.='
';}else{$_result.='
	';if ($_data->is_true($_data->get('C_JS_NOT_ALREADY_INCLUDED'))){$_result.='
		<script>
		<!--
			var NOTATION_LANG_AUTH = ' . $_functions->escapejs($_data->get('L_AUTH_ERROR')) . ';
			var NOTATION_LANG_ALREADY_VOTE = ' . $_functions->escapejs($_data->get('L_ALREADY_NOTE')) . ';
			var NOTATION_LANG_NOTE = ' . $_functions->escapejs($_data->get('L_NOTE')) . ';
			var NOTATION_LANG_NOTES = ' . $_functions->escapejs($_data->get('L_NOTES')) . ';
			var NOTATION_USER_CONNECTED = ' . $_functions->escapejs($_data->get('IS_USER_CONNECTED')) . ';
		-->
		</script>
		<script src="' . $_data->get('PATH_TO_ROOT') . '/kernel/lib/js/phpboost/notation.js"></script>
	';}$_result.='
	
	<script>
	<!--
		jQuery(document).ready(function() { new Note(\'' . $_data->get('ID_IN_MODULE') . '\', \'' . $_data->get('NOTATION_SCALE') . '\', \'' . $_data->get('AVERAGE_NOTES') . '\', \'' . $_data->get('ALREADY_NOTE') . '\'); });
	-->
	</script>
		
	<div class="notation" id="notation-' . $_data->get('ID_IN_MODULE') . '" ';if ($_data->is_true($_data->get('C_NOTES'))){$_result.='itemprop="aggregateRating" itemscope="itemscope" itemtype="http://schema.org/AggregateRating"';}$_result.='>
		<span class="stars">
			';foreach($_data->get_block('star') as $_tmp_star){$_result.='
				<a href="" onclick="return false;" class="fa star ';if ($_data->is_true($_data->get_from_list('STAR_EMPTY', $_tmp_star))){$_result.='fa-star-o';}$_result.='';if ($_data->is_true($_data->get_from_list('STAR_HALF', $_tmp_star))){$_result.='fa-star-half-o';}$_result.='';if ($_data->is_true($_data->get_from_list('STAR_FULL', $_tmp_star))){$_result.='fa-star';}$_result.='" id="star-' . $_data->get('ID_IN_MODULE') . '-' . $_data->get_from_list('I', $_tmp_star) . '"></a>
			';}$_result.='
		</span>
		<span class="notes">
			<span class="number-notes" ';if ($_data->is_true($_data->get('C_NOTES'))){$_result.='itemprop="ratingCount"';}$_result.='>' . $_data->get('NUMBER_NOTES') . '</span>
			';if ($_data->is_true($_data->get('C_MORE_1_NOTES'))){$_result.='
				<span title="' . $_data->get('NUMBER_NOTES') . ' ' . $_data->get('L_NOTES') . '">' . $_data->get('L_NOTES') . '</span>
			';}else{$_result.='
				<span title="' . $_data->get('NUMBER_NOTES') . ' ' . $_data->get('L_NOTE') . '">' . $_data->get('L_NOTE') . '</span>
			';}$_result.='
		</span>
		';if ($_data->is_true($_data->get('C_NOTES'))){$_result.='
		<meta itemprop="ratingValue" content="' . $_data->get('AVERAGE_NOTES') . '">
		<meta itemprop="bestRating" content="' . $_data->get('NOTATION_SCALE') . '">
		';}$_result.='
	</div>
';}$_result.=''; ?>