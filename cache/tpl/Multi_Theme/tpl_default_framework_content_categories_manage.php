<?php $_result='<script>
<!--
jQuery(document).ready(function() {
	jQuery(\'ul#categories\').sortable({
		handle: \'.sortable-selector\',
		placeholder: \'<div class="dropzone">\' + ' . $_functions->escapejs(LangLoader::get_message('position.drop_here', 'common')) . ' + \'</div>\'
	});
	change_reposition_pictures();
	jQuery(\'li.sortable-element\').on(\'mouseout\',function(){
		change_reposition_pictures();
	});
});

function serialize_sortable()
{
	jQuery(\'#tree\').val(JSON.stringify(get_sortable_sequence()));
}

function get_sortable_sequence()
{
	var sequence = jQuery(\'ul#categories\').sortable(\'serialize\').get();
	return sequence[0];
}

function change_children_reposition_pictures(list)
{
	var length = list.length;
	for(var i = 0; i < length; i++)
	{
		if (jQuery(\'#cat-\' + list[i].id).is(\':first-child\'))
			jQuery("#move-up-" + list[i].id).hide();
		else
			jQuery("#move-up-" + list[i].id).show();
		
		if (jQuery(\'#cat-\' + list[i].id).is(\':last-child\'))
			jQuery("#move-down-" + list[i].id).hide();
		else
			jQuery("#move-down-" + list[i].id).show();
		
		if (typeof list[i].children !== \'undefined\')
		{
			var children = list[i].children[0];
			change_children_reposition_pictures(children);
		}
	}
}

function change_reposition_pictures()
{
	change_children_reposition_pictures(get_sortable_sequence());
}
-->
</script>
';$_subtpl=$_data->get('MSG');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
<form action="' . $_data->get('REWRITED_SCRIPT') . '" method="post" onsubmit="serialize_sortable();">
	<fieldset>
		<legend>' . $_data->get('FIELDSET_TITLE') . '</legend>
			<div class="fieldset-inset">
				<ul id="categories" class="sortable-block">
					';if ($_data->is_true($_data->get('C_NO_CATEGORIES'))){$_result.='
						<div class="center">' . LangLoader::get_message('no_item_now', 'common') . '</div>
					';}else{$_result.='
						';foreach($_data->get_block('children') as $_tmp_children){$_result.='
							' . $_data->get_from_list('child', $_tmp_children) . '
						';}$_result.='
					';}$_result.='
				</ul>
			</div>
	</fieldset>
	';if ($_data->is_true($_data->get('C_MORE_THAN_ONE_CATEGORY'))){$_result.='
	<fieldset class="fieldset-submit">
		<button type="submit" class="submit" name="submit" value="true">' . LangLoader::get_message('position.update', 'common') . '</button>
		<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
		<input type="hidden" name="tree" id="tree" value="">
	</fieldset>
	';}$_result.='
</form>'; ?>