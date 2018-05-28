<?php $_result='		<script>
		<!--
			function add_filter(nbr_filter)
			{
				if (typeof this.max_filter_p == \'undefined\' )
					this.max_filter_p = nbr_filter;
				else
					this.max_filter_p++;

				var new_id = this.max_filter_p + 1;
				document.getElementById(\'add_filter\' + this.max_filter_p).innerHTML +=  
					\'<p id="filter\' + new_id + \'">' . $_data->get('PATH_TO_ROOT') . ' / <select name="filter_module\' + new_id + \'" id="filter_module\' + new_id + \'">\' +
					';foreach($_data->get_block('modules') as $_tmp_modules){$_result.='
					\'<option value="' . $_data->get_from_list('ID', $_tmp_modules) . '">' . $_data->get_from_list('ID', $_tmp_modules) . '</option>\' +
					';}$_result.='
					\'</select> / <input type="text" name="f\' + new_id + \'" id="f\' + new_id + \'" value="">\' +
					\' &nbsp;<a href="javascript:delete_filter(\' + new_id + \');" class="fa fa-delete"></a>\' +
					\'</p><span id="add_filter\' + new_id + \'"></span>\';
			}
			function delete_filter(id) {
				document.getElementById(\'f\' + id).value = \'_deleted\';
				document.getElementById(\'filter_module\' + id).value = \'\';
				document.getElementById(\'filter\' + id).style.display = \'none\';
			}
		-->
		</script>

		<fieldset>
			<legend>' . $_functions->i18n('filters') . '</legend>
			<p>
				' . $_functions->i18n('links_menus_filters_explain') . '
			</p>
			<br />
			<div class="form-element">
				<label>' . $_functions->i18n('filters') . '</label>
				<div class="form-field">
					';foreach($_data->get_block('filters') as $_tmp_filters){$_result.='
					<p id="filter' . $_data->get_from_list('ID', $_tmp_filters) . '">
						' . $_data->get('PATH_TO_ROOT') . ' / 
						<select name="filter_module' . $_data->get_from_list('ID', $_tmp_filters) . '" id="filter_module' . $_data->get_from_list('ID', $_tmp_filters) . '">
							';foreach($_data->get_block_from_list('modules', $_tmp_filters) as $_tmp_filters_modules){$_result.='
							<option value="' . $_data->get_from_list('ID', $_tmp_filters_modules) . '"' . $_data->get_from_list('SELECTED', $_tmp_filters_modules) . '>' . $_data->get_from_list('ID', $_tmp_filters_modules) . '</option>
							';}$_result.='
						</select>
						/ <input type="text" name="f' . $_data->get_from_list('ID', $_tmp_filters) . '" id="f' . $_data->get_from_list('ID', $_tmp_filters) . '" value="' . $_data->get_from_list('FILTER', $_tmp_filters) . '">
						&nbsp;<a href="javascript:delete_filter(' . $_data->get_from_list('ID', $_tmp_filters) . ');" class="fa fa-delete"></a>
					</p>
					';}$_result.='
					
					<span id="add_filter' . $_data->get('NBR_FILTER') . '"></span>
					<p class="center">
						<a href="javascript:add_filter(' . $_data->get('NBR_FILTER') . ')" title="' . $_functions->i18n('add_filter') . '"><i class="fa fa-plus"></i></a>
					</p>
				</div>
			</div>
	    </fieldset>
	    '; ?>