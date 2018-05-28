<?php $_result='<li id="cat-' . $_data->get('ID') . '" class="sortable-element" data-id="' . $_data->get('ID') . '">
	<div class="sortable-selector" title="' . LangLoader::get_message('position.move', 'common') . '"></div>
	<div class="sortable-title"> 
		<i class="fa fa-globe"></i>
		<a href="' . $_data->get('U_DISPLAY') . '" title="' . $_data->get('NAME') . '">' . $_data->get('NAME') . '</a>
		';if ($_data->is_true($_data->get('C_DESCRIPTION'))){$_result.='<span class="cat-desc"> | ' . $_data->get('DESCRIPTION') . '</span>';}$_result.='
		<div class="sortable-actions">
			<a href="" title="' . LangLoader::get_message('position.move_up', 'common') . '" id="move-up-' . $_data->get('ID') . '" onclick="return false;"><i class="fa fa-arrow-up"></i></a>
			<a href="" title="' . LangLoader::get_message('position.move_down', 'common') . '" id="move-down-' . $_data->get('ID') . '" onclick="return false;"><i class="fa fa-arrow-down"></i></a>
			<a href="' . $_data->get('U_EDIT') . '" title="' . LangLoader::get_message('edit', 'common') . '"><i class="fa fa-edit"></i></a>
			<a href="' . $_data->get('U_DELETE') . '" title="' . LangLoader::get_message('delete', 'common') . '" data-confirmation="' . $_data->get('DELETE_CONFIRMATION_MESSAGE') . '"><i class="fa fa-delete"></i></a>
		</div>
	</div>
	<div class="spacer"></div>
	<script>
	<!--
	jQuery(document).ready(function() {
		jQuery("#move-up-' . $_data->get('ID') . '").on(\'click\',function(){
			var li = jQuery(this).closest(\'li\');
			li.insertBefore( li.prev() );
			change_reposition_pictures();
		});
		
		jQuery("#move-down-' . $_data->get('ID') . '").on(\'click\',function(){
			var li = jQuery(this).closest(\'li\');
			li.insertAfter( li.next() );
			change_reposition_pictures();
		});
	});
	-->
	</script>

	';if ($_data->is_true($_data->get('C_ALLOWED_TO_HAVE_CHILDS'))){$_result.='
	<ul id="subcat-' . $_data->get('ID') . '" class="sortable-block">
		';foreach($_data->get_block('children') as $_tmp_children){$_result.='
			' . $_data->get_from_list('child', $_tmp_children) . '
		';}$_result.='
	</ul>
	';}$_result.='
</li>'; ?>