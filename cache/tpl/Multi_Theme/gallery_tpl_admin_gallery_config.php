<?php $_result='		<script>
		<!--
		function check_form(){
			if(document.getElementById(\'max_height\').value == "") {
				alert("' . $_data->get('L_REQUIRE_MAX_HEIGHT') . '");
				return false;
			}
			if(document.getElementById(\'max_width\').value == "") {
				alert("' . $_data->get('L_REQUIRE_MAX_WIDTH') . '");
				return false;
			}
			if(document.getElementById(\'mini_max_height\').value == "") {
				alert("' . $_data->get('L_REQUIRE_MINI_MAX_HEIGHT') . '");
				return false;
			}
			if(document.getElementById(\'mini_max_width\').value == "") {
				alert("' . $_data->get('L_REQUIRE_MINI_MAX_WIDTH') . '");
				return false;
			}
			if(document.getElementById(\'max_weight\').value == "") {
				alert("' . $_data->get('L_REQUIRE_MAX_WEIGHT') . '");
				return false;
			}
			if(document.getElementById(\'quality\').value == "") {
				alert("' . $_data->get('L_REQUIRE_QUALITY') . '");
				return false;
			}
			if(document.getElementById(\'categories_number_per_page\').value == "") {
				alert("' . $_data->get('L_REQUIRE_CAT_P') . '");
				return false;
			}
			if(document.getElementById(\'columns_number\').value == "") {
				alert("' . $_data->get('L_REQUIRE_ROW') . '");
				return false;
			}
			if(document.getElementById(\'pics_number_per_page\').value == "") {
				alert("' . $_data->get('L_REQUIRE_IMG_P') . '");
				return false;
			}
			
			return true;
		}
		-->
		</script>

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
			<form action="admin_gallery_config.php" method="post" onsubmit="return check_form();" class="fieldset-content">
				<p class="center">' . $_data->get('L_REQUIRE') . '</p>
				<fieldset>
					<legend>' . $_data->get('L_CONFIG_CONFIG') . '</legend>
					<div class="fieldset-inset">
						<div class="form-element">
							<label for="max_width">* ' . $_data->get('L_MAX_WIDTH') . ' <span class="field-description">' . $_data->get('L_MAX_WIDTH_EXPLAIN') . '</span></label>
							<div class="form-field"><input type="number" min="1" id="max_width" name="max_width" value="' . $_data->get('MAX_WIDTH') . '" /> ' . $_data->get('L_UNIT_PX') . '</div>
						</div>
						<div class="form-element">
							<label for="max_height">* ' . $_data->get('L_MAX_HEIGHT') . ' <span class="field-description">' . $_data->get('L_MAX_HEIGHT_EXPLAIN') . '</span></label>
							<div class="form-field"><input type="number" min="1" id="max_height" name="max_height" value="' . $_data->get('MAX_HEIGHT') . '" /> ' . $_data->get('L_UNIT_PX') . '</div>
						</div>
						<div class="form-element">
							<label for="mini_max_height">* ' . $_data->get('L_MINI_MAX_HEIGHT') . ' <span class="field-description">' . $_data->get('L_MINI_MAX_HEIGHT_EXPLAIN') . '</span></label>
							<div class="form-field"><input type="number" min="1" id="mini_max_height" name="mini_max_height" value="' . $_data->get('MINI_MAX_HEIGHT') . '" /> ' . $_data->get('L_UNIT_PX') . '</div>
						</div>
						<div class="form-element">
							<label for="mini_max_width">* ' . $_data->get('L_MINI_MAX_WIDTH') . ' <span class="field-description">' . $_data->get('L_MINI_MAX_WIDTH_EXPLAIN') . '</span></label>
							<div class="form-field"><input type="number" min="1" id="mini_max_width" name="mini_max_width" value="' . $_data->get('MINI_MAX_WIDTH') . '" /> ' . $_data->get('L_UNIT_PX') . '</div>
						</div>
						<div class="form-element">
							<label for="max_weight">* ' . $_data->get('L_MAX_WEIGHT') . ' <span class="field-description">' . $_data->get('L_MAX_WEIGHT_EXPLAIN') . '</span></label>
							<div class="form-field"><input type="number" min="1" id="max_weight" name="max_weight" value="' . $_data->get('MAX_WEIGHT') . '" /> ' . $_data->get('L_UNIT_KO') . '</div>
						</div>
						<div class="form-element">
							<label for="quality">* ' . $_data->get('L_QUALITY_THUMB') . ' <span class="field-description">' . $_data->get('L_QUALITY_THUMB_EXPLAIN') . '</span></label>
							<div class="form-field"><input type="number" min="1" max="100" id="quality" name="quality" value="' . $_data->get('QUALITY') . '" /> %</div>
						</div>
						<div class="form-element">
							<label for="categories_number_per_page">* ' . LangLoader::get_message('config.categories_number_per_page', 'admin-common') . '</label>
							<div class="form-field"><input type="number" min="1" max="50" id="categories_number_per_page" name="categories_number_per_page" value="' . $_data->get('CATEGORIES_NUMBER_PER_PAGE') . '" /></div>
						</div>
						<div class="form-element">
							<label for="columns_number">* ' . $_data->get('L_COLUMNS_NUMBER') . ' <span class="field-description">' . $_data->get('L_COLUMNS_NUMBER_EXPLAIN') . '</span></label>
							<div class="form-field"><input type="number" min="1" max="4" id="columns_number" name="columns_number" value="' . $_data->get('COLUMNS_NUMBER') . '" /> ' . $_data->get('L_COLUMN') . '</div>
						</div>
						<div class="form-element">
							<label for="pics_number_per_page">* ' . $_data->get('L_PICS_NUMBER_PER_PAGE') . '</label>
							<div class="form-field"><input type="number" min="1" max="100" id="pics_number_per_page" name="pics_number_per_page" value="' . $_data->get('PICS_NUMBER_PER_PAGE') . '" /></div>
						</div>
					</div>
				</fieldset>
				
				<fieldset>
					<legend>' . $_data->get('L_DISPLAY_OPTION') . '</legend>
					<div class="fieldset-inset">
						<div class="form-element">
							<label for="pics_enlargement_mode">' . $_data->get('L_DISPLAY_MODE') . '</label>
							<div class="form-field">
								<div class="form-field-radio">
									<input type="radio" ';if ($_data->is_true($_data->get('C_DISPLAY_PICS_NEW_PAGE'))){$_result.='checked="checked" ';}$_result.='name="pics_enlargement_mode" id="pics_enlargement_mode" value="' . $_data->get('NEW_PAGE') . '" />
									<label for="pics_enlargement_mode"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_NEW_PAGE') . '</span>
								<br />
								<div class="form-field-radio">
									<input type="radio" ';if ($_data->is_true($_data->get('C_DISPLAY_PICS_RESIZE'))){$_result.='checked="checked" ';}$_result.='name="pics_enlargement_mode" id="pics_enlargement_mode_2" value="' . $_data->get('RESIZE') . '" />
									<label for="pics_enlargement_mode_2"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_RESIZE') . '</span>
								<br />
								<div class="form-field-radio">
									<input type="radio" ';if ($_data->is_true($_data->get('C_DISPLAY_PICS_POPUP'))){$_result.='checked="checked" ';}$_result.='name="pics_enlargement_mode" id="pics_enlargement_mode_3" value="' . $_data->get('POPUP') . '" />
									<label for="pics_enlargement_mode_3"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_POPUP') . '</span>
								<br />
								<div class="form-field-radio">
									<input type="radio" ';if ($_data->is_true($_data->get('C_DISPLAY_PICS_FULL_SCREEN'))){$_result.='checked="checked" ';}$_result.='name="pics_enlargement_mode" id="pics_enlargement_mode_4" value="' . $_data->get('FULL_SCREEN') . '">
									<label for="pics_enlargement_mode_4"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_POPUP_FULL') . '</span>
							</div>
						</div>
						<div class="form-element">
							<label for="title_enabled">' . $_data->get('L_TITLE_ENABLED') . ' <span class="field-description">' . $_data->get('L_TITLE_ENABLED_EXPLAIN') . '</span></label>
							<div class="form-field">
								<div class="form-field-radio">
									<input type="radio" ';if ($_data->is_true($_data->get('C_TITLE_ENABLED'))){$_result.='checked="checked" ';}$_result.='name="title_enabled" id="activ_title" value="1">
									<label for="activ_title"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_ENABLED') . '</span>
								<div class="form-field-radio">
									<input type="radio" ';if (!$_data->is_true($_data->get('C_TITLE_ENABLED'))){$_result.='checked="checked" ';}$_result.='name="title_enabled" id="activ_title_2" value="0">
									<label for="activ_title_2"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_DISABLED') . '</span>
							</div>
						</div>
						<div class="form-element">
							<label for="author_displayed">' . $_data->get('L_AUTHOR_DISPLAYED') . ' <span class="field-description">' . $_data->get('L_AUTHOR_DISPLAYED_EXPLAIN') . '</span></label>
							<div class="form-field">
								<div class="form-field-radio">
									<input type="radio" ';if ($_data->is_true($_data->get('C_AUTHOR_DISPLAYED'))){$_result.='checked="checked" ';}$_result.='name="author_displayed" id="author_displayed" value="1">
									<label for="author_displayed"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_ENABLED') . '</span>
								<div class="form-field-radio">
									<input type="radio" ';if (!$_data->is_true($_data->get('C_AUTHOR_DISPLAYED'))){$_result.='checked="checked" ';}$_result.='name="author_displayed" id="author_displayed_2" value="0">
									<label for="author_displayed_2"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_DISABLED') . '</span>
							</div>
						</div>
						<div class="form-element">
							<label for="views_counter_enabled">' . $_data->get('L_VIEWS_COUNTER_ENABLED') . ' <span class="field-description">' . $_data->get('L_VIEWS_COUNTER_ENABLED_EXPLAIN') . '</span></label>
							<div class="form-field">
								<div class="form-field-radio">
									<input type="radio" ';if ($_data->is_true($_data->get('C_VIEWS_COUNTER_ENABLED'))){$_result.='checked="checked" ';}$_result.='name="views_counter_enabled" id="views_counter_enabled" value="1">
									<label for="views_counter_enabled"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_ENABLED') . '</span>
								<div class="form-field-radio">
									<input type="radio" ';if (!$_data->is_true($_data->get('C_VIEWS_COUNTER_ENABLED'))){$_result.='checked="checked" ';}$_result.='name="views_counter_enabled" id="views_counter_enabled_2" value="0">
									<label for="views_counter_enabled_2"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_DISABLED') . '</span>
							</div>
						</div>
						<div class="form-element">
							<label for="notes_number_displayed">' . $_data->get('L_NOTES_NUMBER_DISPLAYED') . '</label>
							<div class="form-field">
								<div class="form-field-radio">
									<input type="radio" ';if ($_data->is_true($_data->get('C_NOTES_NUMBER_DISPLAYED'))){$_result.='checked="checked" ';}$_result.='name="notes_number_displayed" id="notes_number_displayed" value="1" />
									<label for="notes_number_displayed"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_YES') . '</span>
								<div class="form-field-radio">
									<input type="radio" ';if (!$_data->is_true($_data->get('C_NOTES_NUMBER_DISPLAYED'))){$_result.='checked="checked" ';}$_result.='name="notes_number_displayed" id="notes_number_displayed_2" value="0" />
									<label for="notes_number_displayed_2"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_NO') . '</span>
							</div>
						</div>
					</div>
				</fieldset>
				
				<fieldset>
					<legend>' . $_data->get('L_THUMBNAILS_SCROLLING') . '</legend>
					<div class="fieldset-inset">
						<div class="form-element">
							<label for="scroll_type">' . $_data->get('L_SCROLL_TYPE') . '</label>
							<div class="form-field"><label>
									<select name="scroll_type" id="scroll_type">
										' . $_data->get('SCROLL_TYPES') . '
									</select>
								</label>
							</div>
						</div>
						<div class="form-element">
							<label for="pics_number_in_mini">' . $_data->get('L_PICS_NUMBER_IN_MINI') . '</label>
							<div class="form-field"><label><input type="number" min="1" name="pics_number_in_mini" id="pics_number_in_mini" value="' . $_data->get('PICS_NUMBER_IN_MINI') . '"> </label></div>
						</div>
						<div class="form-element">
							<label for="mini_pics_speed">' . $_data->get('L_MINI_PICS_SPEED') . ' <span class="field-description">' . $_data->get('L_MINI_PICS_SPEED_EXPLAIN') . '</span></label>
							<div class="form-field">
								<label>
									<select name="mini_pics_speed" id="mini_pics_speed">
									' . $_data->get('MINI_PICS_SPEED') . '
									</select>
								</label>
							</div>
						</div>
					</div>
				</fieldset>
				
				<fieldset>
					<legend>' . $_data->get('L_IMG_PROTECT') . '</legend>
					<div class="fieldset-inset">
						<div class="form-element">
							<label for="logo_enabled">' . $_data->get('L_LOGO_ENABLED') . ' <span class="field-description">' . $_data->get('L_LOGO_ENABLED_EXPLAIN') . '</span></label>
							<div class="form-field">
								<div class="form-field-radio">
									<input type="radio" ';if ($_data->is_true($_data->get('C_LOGO_ENABLED'))){$_result.='checked="checked" ';}$_result.='name="logo_enabled" id="logo_ENABLED" value="1" />
									<label for="logo_ENABLED"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_ENABLED') . '</span>
								<div class="form-field-radio">
									<input type="radio" ';if (!$_data->is_true($_data->get('C_LOGO_ENABLED'))){$_result.='checked="checked" ';}$_result.='name="logo_enabled" id="logo_ENABLED_2" value="0" />
									<label for="logo_ENABLED_2"></label>
								</div>
								<span class="form-field-radio-span">' . $_data->get('L_DISABLED') . '</span>
							</div>
						</div>
						<div class="form-element">
							<label for="logo">' . $_data->get('L_LOGO_URL') . ' <span class="field-description">' . $_data->get('L_LOGO_URL_EXPLAIN') . '</span></label>
							<div class="form-field"><input type="text" name="logo" id="logo" value="' . $_data->get('LOGO') . '"></div>
						</div>
						<div class="form-element">
							<label for="logo_transparency">' . $_data->get('L_LOGO_TRANSPARENCY') . ' <span class="field-description">' . $_data->get('L_LOGO_TRANSPARENCY_EXPLAIN') . '</span></label>
							<div class="form-field"><input type="number" min="1" max="100" name="logo_transparency" id="logo_transparency" value="' . $_data->get('LOGO_TRANSPARENCY') . '"> %</div>
						</div>
						<div class="form-element">
							<label for="logo_horizontal_distance">' . $_data->get('L_WIDTH_BOTTOM_RIGHT') . ' <span class="field-description">' . $_data->get('L_WIDTH_BOTTOM_RIGHT_EXPLAIN') . '</span></label>
							<div class="form-field"><input type="number" min="1" name="logo_horizontal_distance" id="logo_horizontal_distance" value="' . $_data->get('LOGO_HORIZONTAL_DISTANCE') . '"> ' . $_data->get('L_UNIT_PX') . '</div>
						</div>
						<div class="form-element">
							<label for="logo_vertical_distance">' . $_data->get('L_HEIGHT_BOTTOM_RIGHT') . ' <span class="field-description">' . $_data->get('L_HEIGHT_BOTTOM_RIGHT_EXPLAIN') . '</span></label>
							<div class="form-field"><input type="number" min="1" name="logo_vertical_distance" id="logo_vertical_distance" value="' . $_data->get('LOGO_VERTICAL_DISTANCE') . '"> ' . $_data->get('L_UNIT_PX') . '</div>
						</div>
					</div>
				</fieldset>
				
				<fieldset>
					<legend>' . $_data->get('L_UPLOAD_PICS') . '</legend>
					<div class="fieldset-inset">
						<div class="form-element">
							<label for="member_max_pics_number">' . $_data->get('L_MEMBER_MAX_PICS_NUMBER') . ' <span class="field-description">' . $_data->get('L_MEMBER_MAX_PICS_NUMBER_EXPLAIN') . '</span></label>
							<div class="form-field"><input type="number" min="0" name="member_max_pics_number" id="member_max_pics_number" value="' . $_data->get('MEMBER_MAX_PICS_NUMBER') . '"></div>
						</div>
						<div class="form-element">
							<label for="moderator_max_pics_number">' . $_data->get('L_MODERATOR_MAX_PICS_NUMBER') . ' <span class="field-description">' . $_data->get('L_MODERATOR_MAX_PICS_NUMBER_EXPLAIN') . '</span></label>
							<div class="form-field"><input type="number" min="0" name="moderator_max_pics_number" id="moderator_max_pics_number" value="' . $_data->get('MODERATOR_MAX_PICS_NUMBER') . '"></div>
						</div>
					</div>
				</fieldset>
				
				<fieldset>
					<legend>' . LangLoader::get_message('authorizations', 'common') . '</legend>
					<div class="fieldset-inset">
						<p class="fieldset-description">' . LangLoader::get_message('config.authorizations.explain', 'admin-common') . '</p>
						<div class="form-element">
							<label>' . $_data->get('L_AUTH_READ') . '</label>
							<div class="form-field">' . $_data->get('AUTH_READ') . '</div>
						</div>
						<div class="form-element">
							<label>' . $_data->get('L_AUTH_WRITE') . '</label>
							<div class="form-field">' . $_data->get('AUTH_WRITE') . '</div>
						</div>
						<div class="form-element">
							<label>' . $_data->get('L_AUTH_MODERATION') . '</label>
							<div class="form-field">' . $_data->get('AUTH_MODERATION') . '</div>
						</div>
						<div class="form-element">
							<label>' . LangLoader::get_message('authorizations.categories_management', 'common') . '</label>
							<div class="form-field">' . $_data->get('AUTH_MANAGE_CATEGORIES') . '</div>
						</div>
					</div>
				</fieldset>
				
				<fieldset class="fieldset-submit">
					<legend>' . $_data->get('L_UPDATE') . '</legend>
					<div class="fieldset-inset">
						<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
						<button type="submit" name="valid" value="true" class="submit">' . $_data->get('L_UPDATE') . '</button>
						<button type="reset" value="true">' . $_data->get('L_RESET') . '</button>
					</div>
				</fieldset>
			</form>
			<form action="admin_gallery_config.php" name="form" method="post" class="fieldset-content">
				<fieldset>
					<legend>' . $_data->get('L_CACHE') . '</legend>
					<div class="fieldset-inset">
						<p class="center"><i class="fa fa-2x fa-refresh"></i></p>
						' . $_data->get('L_EXPLAIN_GALLERY_CACHE') . '
					</div>
				</fieldset>
				
				<fieldset class="fieldset-submit">
					<legend>' . $_data->get('L_EMPTY') . '</legend>
					<div class="fieldset-inset">
						<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
						<button type="submit" name="gallery_cache" value="true" class="submit alt">' . $_data->get('L_EMPTY') . '</button>
					</div>
				</fieldset>
			</form>
		</div>
'; ?>