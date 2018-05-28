<?php $_result='		<nav id="admin-quick-menu">
			<a href="" class="js-menu-button" onclick="open_submenu(\'admin-quick-menu\');return false;" title="' . $_data->get('L_QUICK_LINKS') . '">
				<i class="fa fa-bars"></i> ' . $_data->get('L_QUICK_LINKS') . '
			</a>
			<ul>
				<li>
					<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/admin_alerts.php" class="quick-link">' . $_data->get('L_ADMINISTRATOR_ALERTS') . '</a>
				</li>
				<li>
					<a href="' . $_functions->relative_url(AdminMembersUrlBuilder::management()) . '" class="quick-link">' . $_data->get('L_ACTION_USERS_MANAGEMENT') . '</a>
				</li>
				<li>
					<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/menus.php" class="quick-link">' . $_data->get('L_ACTION_MENUS_MANAGEMENT') . '</a>
				</li>
				<li>
					<a href="' . $_functions->relative_url(AdminModulesUrlBuilder::list_installed_modules()) . '" class="quick-link">' . $_data->get('L_ACTION_MODULES_MANAGEMENT') . '</a>
				</li>
				<li>
					<a href="' . $_functions->relative_url(AdminThemeUrlBuilder::list_installed_theme()) . '" class="quick-link">' . $_data->get('L_ACTION_THEMES_MANAGEMENT') . '</a>
				</li>
				<li>
					<a href="' . $_functions->relative_url(AdminLangsUrlBuilder::list_installed_langs()) . '" class="quick-link">' . $_data->get('L_ACTION_LANGS_MANAGEMENT') . '</a>
				</li>
				<li>
					<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/updates/updates.php" class="quick-link">' . $_data->get('L_WEBSITE_UPDATES') . '</a>
				</li>
			</ul>
		</nav>
		
		<div id="admin-contents">
			
			<div class="block welcome">
				<div class="index-logo" ';if ($_data->is_true($_data->get('C_HEADER_LOGO'))){$_result.='style="background-image: url(' . $_data->get('HEADER_LOGO') . ');"';}$_result.='></div>
				<div class="welcome-desc">
					<h2>' . $_data->get('L_WELCOME_TITLE') . '</h2>
					<p>' . $_data->get('L_WELCOME_DESC') . '</p>
				</div>
			</div>
			
			<div class="quick-access">
				<h2><i class="fa fa-angle-double-right"></i> ' . $_data->get('L_QUICK_ACCESS') . '</h2>
				<div class="fieldset-inset elements-container columns-3 no-style">
					<div class="block">
						<h3><i class="fa fa-fw fa-cogs"></i> ' . $_data->get('L_SITE_MANAGEMENT') . '</h3>
						<ul>
							<li><a href="' . $_functions->relative_url(AdminConfigUrlBuilder::general_config()) . '" title="' . $_data->get('L_GENERAL_CONFIG') . '">' . $_data->get('L_GENERAL_CONFIG') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminCacheUrlBuilder::clear_cache()) . '" title="' . $_data->get('L_EMPTY_CACHE') . '">' . $_data->get('L_EMPTY_CACHE') . '</a></li>
							';if ($_data->is_true($_data->get('C_MODULE_DATABASE_INSTALLED'))){$_result.='
							<li><a href="' . $_data->get('U_SAVE_DATABASE') . '" title="' . $_data->get('L_SAVE_DATABASE') . '">' . $_data->get('L_SAVE_DATABASE') . '</a></li>
							';}$_result.='
						</ul>
					</div>
					<div class="block">
						<h3><i class="fa fa-fw fa-picture-o"></i> ' . $_data->get('L_CUSTOMIZE_SITE') . '</h3>
						<ul>
							<li><a href="' . $_functions->relative_url(AdminThemeUrlBuilder::add_theme()) . '" title="' . $_data->get('L_ADD_TEMPLATE') . '">' . $_data->get('L_ADD_TEMPLATE') . '</a></li>
							<li><a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus" title="' . $_data->get('L_MENUS_MANAGEMENT') . '">' . $_data->get('L_MENUS_MANAGEMENT') . '</a></li>
							';if ($_data->is_true($_data->get('C_MODULE_CUSTOMIZATION_INSTALLED'))){$_result.='
							<li><a href="' . $_data->get('U_EDIT_CSS_FILES') . '" title="' . $_data->get('L_CUSTOMIZE_TEMPLATE') . '">' . $_data->get('L_CUSTOMIZE_TEMPLATE') . '</a></li>
							';}$_result.='
						</ul>
					</div>
					<div class="block">
						<h3><i class="fa fa-fw fa-plus"></i> ' . $_data->get('L_ADD_CONTENT') . '</h3>
						<ul>
							<li><a href="' . $_functions->relative_url(AdminModulesUrlBuilder::list_installed_modules()) . '" title="' . $_data->get('L_MODULES_MANAGEMENT') . '">' . $_data->get('L_MODULES_MANAGEMENT') . '</a></li>
							';if ($_data->is_true($_data->get('C_MODULE_ARTICLES_INSTALLED'))){$_result.='
							<li><a href="' . $_data->get('U_ADD_ARTICLE') . '" title="' . $_data->get('L_ADD_ARTICLES') . '">' . $_data->get('L_ADD_ARTICLES') . '</a></li>
							';}$_result.='
							';if ($_data->is_true($_data->get('C_MODULE_NEWS_INSTALLED'))){$_result.='
							<li><a href="' . $_data->get('U_ADD_NEWS') . '" title="' . $_data->get('L_ADD_NEWS') . '">' . $_data->get('L_ADD_NEWS') . '</a></li>
							';}$_result.='
						</ul>
					</div>
				</div>
			</div>
			<div class="elements-container columns-2 no-style">
				<div class="block">
					<div class="admin-index-alert">
						<h2><i class="fa fa-bell"></i> ' . $_data->get('L_ADMIN_ALERTS') . '</h2>
						<div class="fieldset-inset">
							<div class="form-element">
								';if ($_data->is_true($_data->get('C_UNREAD_ALERTS'))){$_result.='
									<div class="warning">' . $_data->get('L_UNREAD_ALERT') . '</div>
								';}else{$_result.='
									<div class="success">' . $_data->get('L_NO_UNREAD_ALERT') . '</div>
								';}$_result.='
							</div>
							';if ($_data->is_true($_data->get('C_UNREAD_ALERTS'))){$_result.='
							<p class="smaller center">
								<a href="admin_alerts.php">' . $_data->get('L_DISPLAY_ALL_ALERTS') . '</a>
							</p>
							';}$_result.='
						</div>
					</div>
					<div class="admin-index-comments">
						<h2><i class="fa fa-comment-o"></i> ' . $_data->get('L_LAST_COMMENTS') . '</h2>
						<div class="fieldset-inset">
							<div class="form-element">
								';foreach($_data->get_block('comments_list') as $_tmp_comments_list){$_result.='
									<a href="' . $_data->get_from_list('U_DELETE', $_tmp_comments_list) . '" title="' . LangLoader::get_message('delete', 'common') . '" class="fa fa-delete" data-confirmation="delete-element"></a>
									<a href="' . $_data->get_from_list('U_LINK', $_tmp_comments_list) . '">
										<i class="fa fa-hand-o-right"></i>
									</a>
									<span class="smaller">' . $_data->get('L_BY') . ' ' . $_data->get_from_list('U_PSEUDO', $_tmp_comments_list) . '</span> : ' . $_data->get_from_list('CONTENT', $_tmp_comments_list) . '
									<br /><br />
								';}$_result.='
								';if ($_data->is_true($_data->get('C_NO_COM'))){$_result.='
								<p class="center"><em>' . $_data->get('L_NO_COMMENT') . '</em></p>
								';}$_result.='
							</div>
							';if (!$_data->is_true($_data->get('C_NO_COM'))){$_result.='<p class="smaller center"><a href="' . $_functions->relative_url(UserUrlBuilder::comments()) . '">' . $_data->get('L_VIEW_ALL_COMMENTS') . '</a></p>';}$_result.='
						</div>
					</div>
					
					<form action="admin_index.php" method="post">
						<div class="admin-index-user-online">
							<h2><i class="fa fa-user"></i> ' . $_data->get('L_USER_ONLINE') . '</h2>
							<div class="fieldset-inset-user">
								<div class="form-element">
									<table id="table">
										<thead>
											<tr> 
												<th>
													' . $_data->get('L_USER_ONLINE') . '
												</th>
												<th>
													' . $_data->get('L_USER_IP') . '
												</th>
												<th>
													' . $_data->get('L_LOCALISATION') . '
												</th>
												<th>
													' . $_data->get('L_LAST_UPDATE') . '
												</th>
											</tr>
										</thead>
										<tbody>
											';foreach($_data->get_block('user') as $_tmp_user){$_result.='
											<tr> 
												<td>
													' . $_data->get_from_list('USER', $_tmp_user) . '
												</td>
												<td>
													' . $_data->get_from_list('USER_IP', $_tmp_user) . '
												</td>
												<td>
													' . $_data->get_from_list('WHERE', $_tmp_user) . '
												</td>
												<td>
													' . $_data->get_from_list('TIME', $_tmp_user) . '
												</td>
											</tr>
											';}$_result.='
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</form>
				</div>
				
				<div class="block">
					
					';$_subtpl=$_data->get('ADVISES');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
					
					<form action="admin_index.php" method="post">
						<div class="admin-index-writting-pad">
							<h2><i class="fa fa-edit"></i> ' . $_data->get('L_WRITING_PAD') . '</h2>
							<div class="fieldset-inset">
								<div class="form-element">
									<textarea id="writing_pad_content" name="writing_pad_content">' . $_data->get('WRITING_PAD_CONTENT') . '</textarea> 
								</div>
								<p class="center">
									<button type="submit" class="submit" name="writingpad" value="true">' . $_data->get('L_UPDATE') . '</button>
									<button type="reset" value="true">' . $_data->get('L_RESET') . '</button>
									<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
								</p>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="spacer"></div>
		</div><!-- admin-contents -->
			'; ?>