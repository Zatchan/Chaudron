<?php $_result='		';if ($_data->is_true($_data->get('C_IMG'))){$_result.='
		<script>
			function unselect_all_pictures() {
				';foreach($_data->get_block('list') as $_tmp_list){$_result.='
				jQuery(\'#\' + \'' . $_data->get_from_list('ID', $_tmp_list) . 'activ\').prop(\'checked\', false);
				';}$_result.='
				jQuery(\'#change_all_pictures_selection_top\').attr(\'onclick\', "select_all_pictures();return false;");
				jQuery(\'#change_all_pictures_selection_top\').text("' . $_data->get('L_SELECT_ALL_PICTURES') . '");
				jQuery(\'#change_all_pictures_selection_bottom\').attr(\'onclick\', "select_all_pictures();return false;");
				jQuery(\'#change_all_pictures_selection_bottom\').text("' . $_data->get('L_SELECT_ALL_PICTURES') . '");
			};
			
			function select_all_pictures() {
				';foreach($_data->get_block('list') as $_tmp_list){$_result.='
				jQuery(\'#\' + \'' . $_data->get_from_list('ID', $_tmp_list) . 'activ\').prop(\'checked\', \'checked\');
				';}$_result.='
				jQuery(\'#change_all_pictures_selection_top\').attr(\'onclick\', "unselect_all_pictures();return false;");
				jQuery(\'#change_all_pictures_selection_top\').text("' . $_data->get('L_UNSELECT_ALL_PICTURES') . '");
				jQuery(\'#change_all_pictures_selection_bottom\').attr(\'onclick\', "unselect_all_pictures();return false;");
				jQuery(\'#change_all_pictures_selection_bottom\').text("' . $_data->get('L_UNSELECT_ALL_PICTURES') . '");
			};
		</script>
		';}$_result.='
		
		<nav id="admin-quick-menu">
			<a href="" class="js-menu-button" onclick="open_submenu(\'admin-quick-menu\');return false;" title="' . $_data->get('L_GALLERY_MANAGEMENT') . '">
				<i class="fa fa-bars"></i> ' . $_data->get('L_GALLERY_MANAGEMENT') . '
			</a>
			<ul>
				<li>
					<a href="' . Url::to_rel('/gallery') . '" class="quick-link">' . LangLoader::get_message('home', 'main') . '</a>
				</li>
				<li>
					<a href="admin_gallery.php" class="quick-link">' . $_data->get('L_GALLERY_MANAGEMENT') . '</a>
				</li>
				<li>
					<a href="admin_gallery_add.php" class="quick-link">' . $_data->get('L_GALLERY_PICS_ADD') . '</a>
				</li>
				<li>
					<a href="admin_gallery_config.php" class="quick-link">' . $_data->get('L_GALLERY_CONFIG') . '</a>
				</li>
				<li>
					<a href="' . $_functions->relative_url(GalleryUrlBuilder::documentation()) . '" class="quick-link">' . LangLoader::get_message('module.documentation', 'admin-modules-common') . '</a>
				</li>
			</ul>
		</nav>
		
		<div id="admin-contents">
			
			';$_subtpl=$_data->get('message_helper');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
			
			<form action="admin_gallery_add.php" method="post" enctype="multipart/form-data" class="fieldset-content">
				<fieldset>
					<legend>' . $_data->get('L_ADD_IMG') . '</legend>
					<div class="fieldset-inset">
						';foreach($_data->get_block('image_up') as $_tmp_image_up){$_result.='
							<div class="center">
								<strong>' . $_data->get_from_list('L_SUCCESS_UPLOAD', $_tmp_image_up) . '</strong>
								
								<div class="spacer"></div>
								
								<strong>' . $_data->get_from_list('NAME', $_tmp_image_up) . '</strong>
								<div class="spacer"></div>
								<a href="' . $_data->get_from_list('U_IMG', $_tmp_image_up) . '"><img src="pics/' . $_data->get_from_list('PATH', $_tmp_image_up) . '" alt="' . $_data->get_from_list('NAME', $_tmp_image_up) . '" /></a>
								<div class="spacer"></div>
								<a href="' . $_data->get_from_list('U_CAT', $_tmp_image_up) . '" title="' . $_data->get_from_list('CATNAME', $_tmp_image_up) . '">' . $_data->get_from_list('CATNAME', $_tmp_image_up) . '</a>
							</div>
						';}$_result.='
						<span>' . $_data->get('L_AUTH_EXTENSION') . ': <strong>' . $_data->get('AUTH_EXTENSION') . ' </strong></span>
						
						<div class="spacer"></div>
						
						<span>' . $_data->get('L_WIDTH_MAX') . ': ' . $_data->get('WIDTH_MAX') . ' ' . $_data->get('L_UNIT_PX') . '</span>
						<div class="spacer"></div>
						<span>' . $_data->get('L_HEIGHT_MAX') . ': ' . $_data->get('HEIGHT_MAX') . ' ' . $_data->get('L_UNIT_PX') . '</span>
						<div class="spacer"></div>
						<span>' . $_data->get('L_WEIGHT_MAX') . ': ' . $_data->get('WEIGHT_MAX') . ' ' . $_data->get('L_UNIT_KO') . '</span>
	
						<div class="spacer"></div>
						
						<div class="form-element">
							<label for="category">' . LangLoader::get_message('form.category', 'common') . '</label>
							<div class="form-field">
								<select name="idcat_post" id="category">
									' . $_data->get('CATEGORIES') . '
								</select>
							</div>
						</div>
						<div class="form-element">
							<label for="name">' . $_data->get('L_NAME') . '</label>
							<div class="form-field"><label><input type="text" maxlength="50" name="name" id="name"></label></div>
						</div>
						<div class="form-element">
							<label for="gallery">' . $_data->get('L_UPLOAD_IMG') . '</label>
							<div class="form-field"><label><input type="file" name="gallery" id="gallery" class="file"></label></div>
						</div>
					</div>
				</fieldset>
				
				<fieldset class="fieldset-submit">
					<legend>' . $_data->get('L_UPLOAD_IMG') . '</legend>
					<div class="fieldset-inset">
						<input type="hidden" name="max_file_size" value="2000000">
						<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
						<button type="submit" name="" value="true" class="submit">' . $_data->get('L_UPLOAD_IMG') . '</button>
					</div>
				</fieldset>
			</form>
			
			<form action="admin_gallery_add.php" method="post">
				';if ($_data->is_true($_data->get('C_IMG'))){$_result.='
				<div class="center"><a href="" onclick="unselect_all_pictures();return false;" id="change_all_pictures_selection_top" class="smaller">' . $_data->get('L_UNSELECT_ALL_PICTURES') . '</a></div>
				<table id="table">
					<thead>
						<tr>
							<th colspan="4">' . $_data->get('L_IMG_DISPO_GALLERY') . '</th>
						</tr>
					</thead>
					<tbody>
						';foreach($_data->get_block('list') as $_tmp_list){$_result.='
						';if ($_data->is_true($_data->get_from_list('C_DISPLAY_TR_START', $_tmp_list))){$_result.='<tr>';}$_result.='
							<td class="valign-bottom">
								<div class="smaller">
									<div class="thumnails-list-container">
									<img src="pics/thumbnails/' . $_data->get_from_list('NAME', $_tmp_list) . '" alt="' . $_data->get_from_list('NAME', $_tmp_list) . '" />
									</div>
									<div class="spacer"></div>
									<div>
										' . $_data->get('L_NAME') . '
										<div class="spacer"></div>
										<input type="text" name="' . $_data->get_from_list('ID', $_tmp_list) . 'name" value="' . $_data->get_from_list('NAME', $_tmp_list) . '">
										<input type="hidden" name="' . $_data->get_from_list('ID', $_tmp_list) . 'uniq" value="' . $_data->get_from_list('UNIQ_NAME', $_tmp_list) . '">
									</div>
									<div class="spacer"></div>
									<div>
										' . LangLoader::get_message('form.category', 'common') . '
										<div class="spacer"></div>
											<select name="' . $_data->get_from_list('ID', $_tmp_list) . 'cat" id="' . $_data->get_from_list('ID', $_tmp_list) . 'cat" class="select-cat">
												' . $_data->get_from_list('CATEGORIES', $_tmp_list) . '
											</select>
									</div>
									<div class="spacer"></div>
									<div class="right">
										' . $_data->get('L_SELECT') . ' <input type="checkbox" checked="checked" id="' . $_data->get_from_list('ID', $_tmp_list) . 'activ" name="' . $_data->get_from_list('ID', $_tmp_list) . 'activ" value="1">
										<div class="spacer"></div>
										' . $_data->get('L_DELETE') . ' <input type="checkbox" name="' . $_data->get_from_list('ID', $_tmp_list) . 'del" value="1">
									</div>
								</div>
							</td>
						';if ($_data->is_true($_data->get_from_list('C_DISPLAY_TR_END', $_tmp_list))){$_result.='</tr>';}$_result.='
						';}$_result.='
						
						';foreach($_data->get_block('end_td_pics') as $_tmp_end_td_pics){$_result.='
							<td style="width:' . $_data->get_from_list('COLUMN_WIDTH_PICS', $_tmp_end_td_pics) . '%;padding:0">&nbsp;</td>
							
						';if ($_data->is_true($_data->get_from_list('C_DISPLAY_TR_END', $_tmp_end_td_pics))){$_result.='</tr>';}$_result.='
						';}$_result.='
					</tbody>
				</table>
				<div class="center"><a href="" onclick="unselect_all_pictures();return false;" id="change_all_pictures_selection_bottom" class="smaller">' . $_data->get('L_UNSELECT_ALL_PICTURES') . '</a></div>
				
				<div class="spacer"></div>
				
				<div class="form-element">
					<label for="root_cat">' . $_data->get('L_GLOBAL_CAT_SELECTION') . ' <spa class="field-description">' . $_data->get('L_GLOBAL_CAT_SELECTION_EXPLAIN') . '</span></span></label>
					<div class="form-field">
						<select name="root_cat" id="root_cat">
							' . $_data->get('ROOT_CATEGORIES') . '
						</select>
						<script>
						jQuery(\'#root_cat\').on(\'change\', function() {
							root_value = jQuery(\'#root_cat\').val();
							';foreach($_data->get_block('list') as $_tmp_list){$_result.='
							jQuery(\'#\' + \'' . $_data->get_from_list('ID', $_tmp_list) . 'cat\').val(root_value);
							';}$_result.='
						});
						</script>
					</div>
				</div>
				
				<fieldset class="fieldset-submit">
					<legend>' . $_data->get('L_SUBMIT') . '</legend>
					<div class="fieldset-inset">
						<input type="hidden" name="nbr_pics" value="' . $_data->get('NBR_PICS') . '">
						<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
						<button type="submit" name="valid" value="true" class="submit">' . $_data->get('L_SUBMIT') . '</button>
					';}else{$_result.='
						<div class="notice">' . $_data->get('L_NO_IMG') . '</div>
					';}$_result.='
					</div>
				</fieldset>
			</form>
		</div>'; ?>