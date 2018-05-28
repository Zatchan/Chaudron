<?php $_result='<script>
<!--
	jQuery(document).ready(function() {
		var nbr_element = jQuery(\'#mini-gallery-slideshow li\').length;
		';if ($_data->is_true($_data->get('C_HORIZONTAL_SCROLL'))){$_result.='
			jQuery(\'#mini-gallery-slideshow\').css(\'max-width\', (nbr_element * 150) + \'px\');
		';}$_result.='

		';if (!$_data->is_true($_data->get('C_FADE'))){$_result.='
		setInterval(function(){
			jQuery("#mini-gallery-slideshow").animate({';if ($_data->is_true($_data->get('C_HORIZONTAL_SCROLL'))){$_result.='marginLeft:-750';}else{$_result.=' marginTop:-150 ';}$_result.='},1000,function(){
				jQuery(this).css({';if ($_data->is_true($_data->get('C_HORIZONTAL_SCROLL'))){$_result.='marginLeft';}else{$_result.=' marginTop ';}$_result.=':0}).find("li:last").after(jQuery(this).find("li:first"));
			})
		}, ' . $_data->get('SCROLL_DELAY') . ');
		';}else{$_result.='
		jQuery(\'#mini-gallery-slideshow li:first\').show();
		setInterval(function() {
			jQuery("#mini-gallery-slideshow li:first").fadeOut(500, function() {
				jQuery(\'#mini-gallery-slideshow li:last\').after($("#mini-gallery-slideshow li:first"));
				jQuery(\'#mini-gallery-slideshow li:first\').fadeIn(2000);
			});
		}, ' . $_data->get('SCROLL_DELAY') . ');
		';}$_result.='
	});
-->
</script>
<div id="scrolling_images">
	';if ($_data->is_true($_data->get('C_STATIC'))){$_result.='
		';foreach($_data->get_block('pics_mini') as $_tmp_pics_mini){$_result.='
		<a href="' . $_data->get_from_list('U_PICS', $_tmp_pics_mini) . '#pics_max"><img src="' . $_data->get_from_list('PICS', $_tmp_pics_mini) . '" alt="' . $_data->get_from_list('NAME', $_tmp_pics_mini) . '" width="' . $_data->get_from_list('WIDTH', $_tmp_pics_mini) . '" height="' . $_data->get_from_list('HEIGHT', $_tmp_pics_mini) . '" /></a>
		';}$_result.='
	';}else{$_result.='
	';if (!$_data->is_true($_data->get('C_NO_RANDOM_PICS'))){$_result.='
	<ul id="mini-gallery-slideshow" class="';if ($_data->is_true($_data->get('C_VERTICAL_SCROLL'))){$_result.='vertical';}$_result.='';if ($_data->is_true($_data->get('C_FADE'))){$_result.='fade';}$_result.='';if ($_data->is_true($_data->get('C_HORIZONTAL_SCROLL'))){$_result.='horizontal';}$_result.='">
		';foreach($_data->get_block('pics_mini') as $_tmp_pics_mini){$_result.='
		<li><a href="' . $_data->get_from_list('U_PICS', $_tmp_pics_mini) . '#pics_max"><img src="' . $_data->get_from_list('PICS', $_tmp_pics_mini) . '" alt="' . $_data->get_from_list('NAME', $_tmp_pics_mini) . '" width="' . $_data->get_from_list('WIDTH', $_tmp_pics_mini) . '" height="' . $_data->get_from_list('HEIGHT', $_tmp_pics_mini) . '" /></a></li>
		';}$_result.='
	</ul>
	';}$_result.='
	';}$_result.='
	';if ($_data->is_true($_data->get('C_NO_RANDOM_PICS'))){$_result.='
	<br /><span class="smaller"><em>' . $_data->get('L_NO_RANDOM_PICS') . '</em></span><br />
	';}$_result.='
</div>
<a class="small" href="' . $_data->get('PATH_TO_ROOT') . '/gallery/gallery.php">' . $_data->get('L_GALLERY') . '</a>
'; ?>