<?php $_result='	';if ($_data->is_true($_data->get('C_CONTRIBUTION_LIST'))){$_result.='
	<section id="module-user-contribution-list">
		<header>
			<h1>' . $_data->get('L_CONTRIBUTION_PANEL') . '</h1>
		</header>
		<div class="content">
			<h1>' . $_data->get('L_CONTRIBUTION_LIST') . '</h1>
			<br />
			';if ($_data->is_true($_data->get('C_NO_CONTRIBUTION'))){$_result.='
			<div class="success">' . $_data->get('L_NO_CONTRIBUTION_TO_DISPLAY') . '</div>
			';}else{$_result.='
			<table id="table">
				<thead>
					<tr>
						<th>
							';if (!$_data->is_true($_data->get('C_ORDER_ENTITLED_ASC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_ENTITLED_ASC') . '" class="fa fa-table-sort-up"></a>
							';}$_result.='
							' . $_data->get('L_ENTITLED') . '
							';if (!$_data->is_true($_data->get('C_ORDER_ENTITLED_DESC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_ENTITLED_DESC') . '" class="fa fa-table-sort-down"></a>
							';}$_result.='
						</th>
						<th>
							';if (!$_data->is_true($_data->get('C_ORDER_MODULE_ASC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_MODULE_ASC') . '" class="fa fa-table-sort-up"></a>
							';}$_result.='
							' . $_data->get('L_MODULE') . '
							';if (!$_data->is_true($_data->get('C_ORDER_MODULE_DESC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_MODULE_DESC') . '" class="fa fa-table-sort-down"></a>
							';}$_result.='
						</th>
						<th>
							';if (!$_data->is_true($_data->get('C_ORDER_STATUS_ASC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_STATUS_ASC') . '" class="fa fa-table-sort-up"></a>
							';}$_result.='
							' . $_data->get('L_STATUS') . '
							';if (!$_data->is_true($_data->get('C_ORDER_STATUS_DESC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_STATUS_DESC') . '" class="fa fa-table-sort-down"></a>
							';}$_result.='
						</th>
						<th>
							';if (!$_data->is_true($_data->get('C_ORDER_CREATION_DATE_ASC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_CREATION_DATE_ASC') . '" class="fa fa-table-sort-up"></a>
							';}$_result.='
							' . $_data->get('L_CREATION_DATE') . '
							';if (!$_data->is_true($_data->get('C_ORDER_CREATION_DATE_DESC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_CREATION_DATE_DESC') . '" class="fa fa-table-sort-down"></a>
							';}$_result.='
						</th>
						<th>
							';if (!$_data->is_true($_data->get('C_ORDER_FIXING_DATE_ASC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_FIXING_DATE_ASC') . '" class="fa fa-table-sort-up"></a>
							';}$_result.='
							' . $_data->get('L_FIXING_DATE') . '
							';if (!$_data->is_true($_data->get('C_ORDER_FIXING_DATE_DESC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_FIXING_DATE_DESC') . '" class="fa fa-table-sort-down"></a>
							';}$_result.='
						</th>
						<th>
							';if (!$_data->is_true($_data->get('C_ORDER_POSTER_ASC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_POSTER_ASC') . '" class="fa fa-table-sort-up"></a>
							';}$_result.='
							' . $_data->get('L_POSTER') . '
							';if (!$_data->is_true($_data->get('C_ORDER_POSTER_DESC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_POSTER_DESC') . '" class="fa fa-table-sort-down"></a>
							';}$_result.='
						</th>
						<th>
							';if (!$_data->is_true($_data->get('C_ORDER_FIXER_ASC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_FIXER_ASC') . '" class="fa fa-table-sort-up"></a>
							';}$_result.='
							' . $_data->get('L_FIXER') . '
							';if (!$_data->is_true($_data->get('C_ORDER_FIXER_DESC'))){$_result.='
								<a href="' . $_data->get('U_ORDER_FIXER_DESC') . '" class="fa fa-table-sort-down"></a>
							';}$_result.='
						</th>
					</tr>
				</thead>
				';if ($_data->is_true($_data->get('C_PAGINATION'))){$_result.='
				<tfoot>
					<tr>
						<td colspan="7">
							';$_subtpl=$_data->get('PAGINATION');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
						</td>
					</tr>
				</tfoot>
				';}$_result.='
				<tbody>
					';foreach($_data->get_block('contributions') as $_tmp_contributions){$_result.='
					<tr>
						<td>
							<a href="' . $_data->get_from_list('U_CONSULT', $_tmp_contributions) . '">' . $_data->get_from_list('ENTITLED', $_tmp_contributions) . '</a>
						</td>
						<td >
							' . $_data->get_from_list('MODULE', $_tmp_contributions) . '
						</td>
						';if ($_data->is_true($_data->get_from_list('C_FIXED', $_tmp_contributions))){$_result.='
							<td class="bkgd-color-fixed">
								' . $_data->get_from_list('STATUS', $_tmp_contributions) . '
							</td>
						';}else{$_result.='
							';if ($_data->is_true($_data->get_from_list('C_PROCESSING', $_tmp_contributions))){$_result.='
							<td class="bkgd-color-processing">
								' . $_data->get_from_list('STATUS', $_tmp_contributions) . '
							</td>
							';}else{$_result.='
							<td class="bkgd-color-unknown">
								' . $_data->get_from_list('STATUS', $_tmp_contributions) . '
							</td>
							';}$_result.='
						';}$_result.='
						<td >
							' . $_data->get_from_list('CREATION_DATE', $_tmp_contributions) . '
						</td>
						<td >
							';if ($_data->is_true($_data->get_from_list('C_FIXED', $_tmp_contributions))){$_result.='
							' . $_data->get_from_list('FIXING_DATE', $_tmp_contributions) . '
							';}else{$_result.='
							-
							';}$_result.='
						</td>
						<td >
							<a href="' . $_data->get_from_list('U_POSTER_PROFILE', $_tmp_contributions) . '" class="' . $_data->get_from_list('POSTER_LEVEL_CLASS', $_tmp_contributions) . '" ';if ($_data->is_true($_data->get_from_list('C_POSTER_GROUP_COLOR', $_tmp_contributions))){$_result.=' style="color:' . $_data->get_from_list('POSTER_GROUP_COLOR', $_tmp_contributions) . '" ';}$_result.='>' . $_data->get_from_list('POSTER', $_tmp_contributions) . '</a>
						</td>
						<td >
							';if ($_data->is_true($_data->get_from_list('C_FIXED', $_tmp_contributions))){$_result.='
							<a href="' . $_data->get_from_list('U_FIXER_PROFILE', $_tmp_contributions) . '" class="' . $_data->get_from_list('FIXER_LEVEL_CLASS', $_tmp_contributions) . '" ';if ($_data->is_true($_data->get_from_list('C_FIXER_GROUP_COLOR', $_tmp_contributions))){$_result.=' style="color:' . $_data->get_from_list('FIXER_GROUP_COLOR', $_tmp_contributions) . '" ';}$_result.='>' . $_data->get_from_list('FIXER', $_tmp_contributions) . '</a>
							';}else{$_result.='
							-
							';}$_result.='
						</td>
					</tr>
					';}$_result.='
				</tbody>
			</table>
			';}$_result.='

				<hr>

				<h1>' . $_data->get('L_CONTRIBUTE') . '</h1>
				<br />
				';if (!$_data->is_true($_data->get('C_NO_MODULE_IN_WHICH_CONTRIBUTE'))){$_result.='
					<p>' . $_data->get('L_CONTRIBUTE_EXPLAIN') . '</p>

					';foreach($_data->get_block('row') as $_tmp_row){$_result.='
						';foreach($_data->get_block_from_list('module', $_tmp_row) as $_tmp_row_module){$_result.='
							<div class="contribution-module-container" style="width:' . $_data->get_from_list('WIDTH', $_tmp_row_module) . '%;">
								<a href="' . $_data->get_from_list('U_MODULE_LINK', $_tmp_row_module) . '" title="' . $_data->get_from_list('LINK_TITLE', $_tmp_row_module) . '"><img src="' . $_data->get('PATH_TO_ROOT') . '/' . $_data->get_from_list('MODULE_ID', $_tmp_row_module) . '/' . $_data->get_from_list('MODULE_ID', $_tmp_row_module) . '.png" alt="' . $_data->get_from_list('LINK_TITLE', $_tmp_row_module) . '" /></a>
								<br />
								<a href="' . $_data->get_from_list('U_MODULE_LINK', $_tmp_row_module) . '" title="' . $_data->get_from_list('LINK_TITLE', $_tmp_row_module) . '">' . $_data->get_from_list('MODULE_NAME', $_tmp_row_module) . '</a>
							</div>
						';}$_result.='
						<div class="spacer"></div>
					';}$_result.='
				';}else{$_result.='
					<div class="warning">' . $_data->get('L_NO_MODULE_IN_WHICH_CONTRIBUTE') . '</div>
				';}$_result.='
			</div>
		<footer></footer>
	</section>
	';}$_result.='

	';if ($_data->is_true($_data->get('C_CONSULT_CONTRIBUTION'))){$_result.='
	<section id="module-user-consult-contribution">
		<header>
			<h1>
			' . $_data->get('ENTITLED') . '
			';if ($_data->is_true($_data->get('C_WRITE_AUTH'))){$_result.='
			<span class="actions">
				<a href="' . $_data->get('U_UPDATE') . '" title="' . $_data->get('L_UPDATE') . '" class="fa fa-edit"></a>
				<a href="' . $_data->get('U_DELETE') . '" title="' . $_data->get('L_DELETE') . '" class="fa fa-delete" data-confirmation="delete-element"></a>
			</span>
			';}$_result.='
			</h1>
		</header>
		<div class="content">
			';if ($_data->is_true($_data->get('C_WRITE_AUTH'))){$_result.='
				';if ($_data->is_true($_data->get('C_UNPROCESSED_CONTRIBUTION'))){$_result.='
				<div class="unprocessed-contribution">
					<div>
						<a href="' . $_data->get('FIXING_URL') . '" title="' . $_data->get('L_PROCESS_CONTRIBUTION') . '">
							<i class="fa fa-wrench fa-2x"></i>
						</a>
						<br />
						<a href="' . $_data->get('FIXING_URL') . '" title="' . $_data->get('L_PROCESS_CONTRIBUTION') . '">' . $_data->get('L_PROCESS_CONTRIBUTION') . '</a>
					</div>
					<div>
						<a href="' . $_data->get('U_UPDATE') . '" title="' . $_data->get('L_UPDATE') . ' ' . $_data->get('L_STATUS') . '"><i class="fa fa-check fa-2x"></i></a>
						<br />
						<a href="' . $_data->get('U_UPDATE') . '" title="' . $_data->get('L_UPDATE') . ' ' . $_data->get('L_STATUS') . '">' . $_data->get('L_UPDATE') . ' ' . $_data->get('L_STATUS') . '</a>
					</div>
					<div class="spacer"></div>
				</div>
				';}$_result.='
			';}$_result.='

			<fieldset>
				<legend>' . $_data->get('L_CONTRIBUTION') . '</legend>
				<div class="form-element">
					<label>' . $_data->get('L_ENTITLED') . '</label>
					<div class="form-field">
						' . $_data->get('ENTITLED') . '
					</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_DESCRIPTION') . '</label>
					<div class="form-field">' . $_data->get('DESCRIPTION') . '</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_STATUS') . '</label>
					<div class="form-field">' . $_data->get('STATUS') . '</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_CONTRIBUTOR') . '</label>
					<div class="form-field"><a href="' . $_data->get('U_CONTRIBUTOR_PROFILE') . '" class="' . $_data->get('CONTRIBUTOR_LEVEL_CLASS') . '" ';if ($_data->is_true($_data->get('C_CONTRIBUTOR_GROUP_COLOR'))){$_result.=' style="color:' . $_data->get('CONTRIBUTOR_GROUP_COLOR') . '" ';}$_result.='>' . $_data->get('CONTRIBUTOR') . '</a></div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_CREATION_DATE') . '</label>
					<div class="form-field">' . $_data->get('CREATION_DATE') . '</div>
				</div>
				';if ($_data->is_true($_data->get('C_CONTRIBUTION_FIXED'))){$_result.='
				<div class="form-element">
					<label>' . $_data->get('L_FIXER') . '</label>
					<div class="form-field"><a href="' . $_data->get('U_FIXER_PROFILE') . '" class="' . $_data->get('FIXER_LEVEL_CLASS') . '" ';if ($_data->is_true($_data->get('C_FIXER_GROUP_COLOR'))){$_result.=' style="color:' . $_data->get('FIXER_GROUP_COLOR') . '" ';}$_result.='>' . $_data->get('FIXER') . '</a></div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_FIXING_DATE') . '</label>
					<div class="form-field">' . $_data->get('FIXING_DATE') . '</div>
				</div>
				';}$_result.='
				<div class="form-element">
					<label>' . $_data->get('L_MODULE') . '</label>
					<div class="form-field">' . $_data->get('MODULE') . '</div>
				</div>
			</fieldset>

			' . $_data->get('COMMENTS') . '
		</div>
		<footer></footer>
	</section>
	';}$_result.='

	';if ($_data->is_true($_data->get('C_EDIT_CONTRIBUTION'))){$_result.='
	<section id="module-user-edit-contribution">
		<header>
			<h1>' . $_data->get('ENTITLED') . '</h1>
		</header>
		<div class="content">
			<form action="contribution_panel.php" method="post">
				<fieldset>
					<legend>' . $_data->get('L_CONTRIBUTION') . '</legend>
					<div class="form-element">
						<label for="entitled">' . $_data->get('L_ENTITLED') . '</label>
						<div class="form-field">
							<input type="text" name="entitled" id="entitled" value="' . $_data->get('ENTITLED') . '">
						</div>
					</div>
					<div class="form-element-textarea">
						<label for="contents">' . $_data->get('L_DESCRIPTION') . '</label>
						' . $_data->get('EDITOR') . '
						<div class="form-field-textarea">
							<textarea rows="15" id="contents" name="contents">' . $_data->get('DESCRIPTION') . '</textarea>
						</div>
					</div>
					<div class="form-element">
						<label for="status">' . $_data->get('L_STATUS') . '</label>
						<div class="form-field"><select name="status" id="status">
								<option value="0"' . $_data->get('EVENT_STATUS_UNREAD_SELECTED') . '>' . $_data->get('L_CONTRIBUTION_STATUS_UNREAD') . '</option>
								<option value="1"' . $_data->get('EVENT_STATUS_BEING_PROCESSED_SELECTED') . '>' . $_data->get('L_CONTRIBUTION_STATUS_BEING_PROCESSED') . '</option>
								<option value="2"' . $_data->get('EVENT_STATUS_PROCESSED_SELECTED') . '>' . $_data->get('L_CONTRIBUTION_STATUS_PROCESSED') . '</option>
							</select>
						</div>
					</div>
				</fieldset>
				<fieldset class="fieldset-submit">
					<input type="hidden" name="idedit" value="' . $_data->get('CONTRIBUTION_ID') . '">
					<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
					<button type="submit" value="true" class="submit">' . $_data->get('L_SUBMIT') . '</button>
					<button type="button" name="preview" onclick="XMLHttpRequest_preview();">' . $_data->get('L_PREVIEW') . '</button>
					<button type="reset">' . $_data->get('L_RESET') . '</button>
				</fieldset>
			</form>
		</div>
		<footer></footer>
	</section>
	';}$_result.='
'; ?>