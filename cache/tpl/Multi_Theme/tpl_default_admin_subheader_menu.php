<?php $_result='<nav class="cssmenu-admin">
	<ul>
		<li class="admin-li">
			<a href="#openmodal-' . $_data->get('L_ADMINISTRATION') . '" title="' . $_data->get('L_ADMINISTRATION') . '"><i class="fa fa-fw fa-cog"></i><span>' . $_data->get('L_ADMINISTRATION') . '</span></a>
			<div id="openmodal-' . $_data->get('L_ADMINISTRATION') . '" class="cssmenu-modal">
				<a href="#closemodal" title="' . LangLoader::get_message('close_menu', 'admin') . '" class="close"><span>x</span></a>
				<div class="next-menu">
					<a class="float-left" href="#openmodule-' . $_data->get('L_MODULES') . '" title="' . $_data->get('L_MODULES') . '">
						<i class="fa fa-arrow-left"></i>
						' . $_data->get('L_MODULES') . '
					</a>
					<a class="float-right" href="#openmodal-' . $_data->get('L_TOOLS') . '" title="' . $_data->get('L_TOOLS') . '">
						' . $_data->get('L_TOOLS') . '
						<i class="fa fa-arrow-right"></i>
					</a>
				</div>
				<ul class="submenu">
					<li>
						<a href="' . $_functions->relative_url(AdminConfigUrlBuilder::general_config()) . '" title="' . $_data->get('L_CONFIGURATION') . '"><i class="fa fa-fw fa-cog"></i>' . $_data->get('L_CONFIGURATION') . '</a>
						<ul class="level-2">
							<li><a href="' . $_functions->relative_url(AdminConfigUrlBuilder::general_config()) . '" title="' . $_data->get('L_CONFIG_GENERAL') . '"><i class="fa fa-fw fa-cog"></i>' . $_data->get('L_CONFIG_GENERAL') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminConfigUrlBuilder::advanced_config()) . '" title="' . $_data->get('L_CONFIG_ADVANCED') . '"><i class="fa fa-fw fa-cogs"></i>' . $_data->get('L_CONFIG_ADVANCED') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminConfigUrlBuilder::mail_config()) . '" title="' . $_data->get('L_MAIL_CONFIG') . '"><i class="fa fa-fw fa-envelope-o"></i>' . $_data->get('L_MAIL_CONFIG') . '</a></li>
						</ul>
					</li>
					<li>
						<a href="' . $_functions->relative_url(AdminThemeUrlBuilder::list_installed_theme()) . '" title="' . $_data->get('L_THEMES') . '"><i class="fa fa-fw fa-picture-o"></i>' . $_data->get('L_THEMES') . '</a>
						<ul class="level-2">
							<li><a href="' . $_functions->relative_url(AdminThemeUrlBuilder::list_installed_theme()) . '" title="' . $_data->get('L_MANAGEMENT') . '"><i class="fa fa-fw fa-cog"></i>' . $_data->get('L_MANAGEMENT') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminThemeUrlBuilder::add_theme()) . '" title="' . $_data->get('L_ADD') . '"><i class="fa fa-fw fa-plus"></i>' . $_data->get('L_ADD') . '</a></li>
						</ul>
					</li>
					<li>
						<a href="' . $_functions->relative_url(AdminLangsUrlBuilder::list_installed_langs()) . '" title="' . $_data->get('L_LANGS') . '"><i class="fa fa-fw fa-language"></i>' . $_data->get('L_LANGS') . '</a>
						<ul class="level-2">
							<li><a href="' . $_functions->relative_url(AdminLangsUrlBuilder::list_installed_langs()) . '" title="' . $_data->get('L_MANAGEMENT') . '"><i class="fa fa-fw fa-cog"></i>' . $_data->get('L_MANAGEMENT') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminLangsUrlBuilder::install()) . '" title="' . $_data->get('L_ADD') . '"><i class="fa fa-fw fa-plus"></i> ' . $_data->get('L_ADD') . '</a></li>
						</ul>
					</li>
					<li>
						<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/updates/updates.php" title="' . $_data->get('L_UPDATES') . '"><i class="fa fa-fw fa-download"></i>' . $_data->get('L_UPDATES') . '</a>
						<ul class="level-2">
							<li><a href="' . $_data->get('PATH_TO_ROOT') . '/admin/updates/updates.php?type=kernel" title="' . $_data->get('L_KERNEL') . '"><i class="fa fa-fw fa-cog"></i>' . $_data->get('L_KERNEL') . '</a></li>
							<li><a href="' . $_data->get('PATH_TO_ROOT') . '/admin/updates/updates.php?type=module" title="' . $_data->get('L_MODULES') . '"><i class="fa fa-fw fa-cubes"></i>' . $_data->get('L_MODULES') . '</a></li>
							<li><a href="' . $_data->get('PATH_TO_ROOT') . '/admin/updates/updates.php?type=template" title="' . $_data->get('L_THEMES') . '"><i class="fa fa-fw fa-picture-o"></i>' . $_data->get('L_THEMES') . '</a></li>
						</ul>
					</li>
					<li>
						<a href="' . $_functions->relative_url(AdminMaintainUrlBuilder::maintain()) . '" title="' . $_data->get('L_MAINTAIN') . '"><i class="fa fa-fw fa-clock-o"></i>' . $_data->get('L_MAINTAIN') . '</a>
					</li>
					<li>
						<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/admin_alerts.php" title="' . $_data->get('L_ADMINISTRATOR_ALERTS') . '"><i class="fa fa-fw fa-bell"></i> ' . $_data->get('L_ADMINISTRATOR_ALERTS') . '</a>
					</li>
					';if ($_data->is_true($_data->get('C_ADMIN_LINKS_2'))){$_result.='
						';foreach($_data->get_block('admin_links_2') as $_tmp_admin_links_2){$_result.='
							';$_subtpl=$_data->get_from_list('MODULE_MENU', $_tmp_admin_links_2);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
						';}$_result.='
					';}$_result.='
				</ul>
			</div>
			
		</li>
		<li class="admin-li">
			<a href="#openmodal-' . $_data->get('L_TOOLS') . '" title="' . $_data->get('L_TOOLS') . '"><i class="fa fa-fw fa-wrench"></i><span>' . $_data->get('L_TOOLS') . '</span></a>
			<div id="openmodal-' . $_data->get('L_TOOLS') . '" class="cssmenu-modal">
				<a href="#closemodal" title="' . LangLoader::get_message('close_menu', 'admin') . '" class="close"><span>x</span></a>
				<div class="next-menu">
					<a class="float-left" href="#openmodal-' . $_data->get('L_ADMINISTRATION') . '" title="' . $_data->get('L_ADMINISTRATION') . '">
						<i class="fa fa-arrow-left"></i>
						' . $_data->get('L_ADMINISTRATION') . '
					</a>
					<a class="float-right" href="#openmodal-' . $_data->get('L_USER') . '" title="' . $_data->get('L_USER') . '">
						' . $_data->get('L_USER') . '
						<i class="fa fa-arrow-right"></i>
					</a>
				</div>
				<ul class="submenu">
					<li>
						<a href="' . $_functions->relative_url(AdminCacheUrlBuilder::clear_cache()) . '" title="' . $_data->get('L_CACHE') . '"><i class="fa fa-fw fa-refresh"></i>' . $_data->get('L_CACHE') . '</a>
						<ul class="level-2">
							<li><a href="' . $_functions->relative_url(AdminCacheUrlBuilder::clear_cache()) . '" title="' . $_data->get('L_CACHE') . '"><i class="fa fa-fw fa-refresh"></i>' . $_data->get('L_CACHE') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminCacheUrlBuilder::clear_syndication_cache()) . '" title="' . $_data->get('L_SYNDICATION_CACHE') . '"><i class="fa fa-fw fa-rss"></i>' . $_data->get('L_SYNDICATION_CACHE') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminCacheUrlBuilder::clear_css_cache()) . '" title="' . $_data->get('L_CSS_CACHE_CONFIG') . '"><i class="fa fa-fw fa-css3"></i>' . $_data->get('L_CSS_CACHE_CONFIG') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminCacheUrlBuilder::configuration()) . '" title="' . $_data->get('L_CONFIGURATION') . '"><i class="fa fa-fw fa-cogs"></i>' . $_data->get('L_CONFIGURATION') . '</a></li>
						</ul>
					</li>
					<li>
						<a href="' . $_functions->relative_url(AdminErrorsUrlBuilder::logged_errors()) . '" title="' . $_data->get('L_ERRORS') . '"><i class="fa fa-fw fa-exclamation-triangle"></i>' . $_data->get('L_ERRORS') . '</a>
						<ul class="level-2">
							<li><a href="' . $_functions->relative_url(AdminErrorsUrlBuilder::logged_errors()) . '" title="' . $_data->get('L_LOGGED_ERRORS') . '"><i class="fa fa-fw fa-exclamation-circle"></i>' . $_data->get('L_LOGGED_ERRORS') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminErrorsUrlBuilder::list_404_errors()) . '" title="' . $_data->get('L_404_ERRORS') . '"><i class="fa fa-fw fa-ban"></i>' . $_data->get('L_404_ERRORS') . '</a></li>
						</ul>
					</li>
					<li>
						<a href="' . $_functions->relative_url(AdminServerUrlBuilder::system_report()) . '" title="' . $_data->get('L_SERVER') . '"><i class="fa fa-fw fa-building"></i>' . $_data->get('L_SERVER') . '</a>
						<ul class="level-2">
							<li><a href="' . $_functions->relative_url(AdminServerUrlBuilder::phpinfo()) . '" title="' . $_data->get('L_PHPINFO') . '"><i class="fa fa-fw fa-info"></i>' . $_data->get('L_PHPINFO') . '</a></a></li>
							<li><a href="' . $_functions->relative_url(AdminServerUrlBuilder::system_report()) . '" title="' . $_data->get('L_SYSTEM_REPORT') . '"><i class="fa fa-fw fa-info-circle"></i>' . $_data->get('L_SYSTEM_REPORT') . '</a></li>
						</ul>
					</li>
					';if ($_data->is_true($_data->get('C_ADMIN_LINKS_3'))){$_result.='
						';foreach($_data->get_block('admin_links_3') as $_tmp_admin_links_3){$_result.='
							';$_subtpl=$_data->get_from_list('MODULE_MENU', $_tmp_admin_links_3);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
						';}$_result.='
					';}$_result.='
				</ul>
			</div>
		</li>
		<li class="admin-li">
			<a href="#openmodal-' . $_data->get('L_USER') . '" title="' . $_data->get('L_USER') . '"><i class="fa fa-fw fa-user"></i><span>' . $_data->get('L_USER') . '</span></a>
			<div id="openmodal-' . $_data->get('L_USER') . '" class="cssmenu-modal">
				<a href="#closemodal" title="' . LangLoader::get_message('close_menu', 'admin') . '" class="close"><span>x</span></a>
				<div class="next-menu">
					<a class="float-left" href="#openmodal-' . $_data->get('L_TOOLS') . '" title="' . $_data->get('L_TOOLS') . '">
						<i class="fa fa-arrow-left"></i>
						' . $_data->get('L_TOOLS') . '
					</a>
					<a class="float-right" href="#openmodal-' . $_data->get('L_CONTENT') . '" title="' . $_data->get('L_CONTENT') . '">
						' . $_data->get('L_CONTENT') . '
						<i class="fa fa-arrow-right"></i>
					</a>
				</div>
				<ul class="submenu">
					<li>
						<a href="' . $_functions->relative_url(AdminMembersUrlBuilder::management()) . '" title="' . $_data->get('L_USER') . '"><i class="fa fa-fw fa-user"></i>' . $_data->get('L_USER') . '</a>
						<ul class="level-2">
							<li><a href="' . $_functions->relative_url(AdminMembersUrlBuilder::management()) . '" title="' . $_data->get('L_MANAGEMENT') . '"><i class="fa fa-fw fa-cog"></i>' . $_data->get('L_MANAGEMENT') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminMembersUrlBuilder::add()) . '" title="' . $_data->get('L_ADD') . '"><i class="fa fa-fw fa-plus"></i>' . $_data->get('L_ADD') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminMembersUrlBuilder::configuration()) . '" title="' . $_data->get('L_CONFIGURATION') . '"><i class="fa fa-fw fa-cogs"></i>' . $_data->get('L_CONFIGURATION') . '</a></li>
							<li><a href="' . $_data->get('PATH_TO_ROOT') . '/user/moderation_panel.php" title="' . $_data->get('L_PUNISHEMENT') . '"><i class="fa fa-fw fa-ban"></i>' . $_data->get('L_PUNISHEMENT') . '</a></li>
						</ul>
					</li>
					<li>
						<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/admin_groups.php" title="' . $_data->get('L_GROUP') . '"><i class="fa fa-fw fa-users"></i>' . $_data->get('L_GROUP') . '</a>
						<ul class="level-2">
							<li><a href="' . $_data->get('PATH_TO_ROOT') . '/admin/admin_groups.php" title="' . $_data->get('L_MANAGEMENT') . '"><i class="fa fa-fw fa-cog"></i>' . $_data->get('L_MANAGEMENT') . '</a></li>
							<li><a href="' . $_data->get('PATH_TO_ROOT') . '/admin/admin_groups.php?add=1" title="' . $_data->get('L_ADD') . '"><i class="fa fa-fw fa-plus"></i>' . $_data->get('L_ADD') . '</a></li>
						</ul>
					</li>
					<li>
						<a href="' . $_functions->relative_url(AdminExtendedFieldsUrlBuilder::fields_list()) . '" title="' . $_data->get('L_EXTEND_FIELD') . '"><i class="fa fa-fw fa-reorder"></i>' . $_data->get('L_EXTEND_FIELD') . '</a>
						<ul class="level-2">
							<li><a href="' . $_functions->relative_url(AdminExtendedFieldsUrlBuilder::fields_list()) . '" title="' . $_data->get('L_MANAGEMENT') . '"><i class="fa fa-cog"></i>' . $_data->get('L_MANAGEMENT') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminExtendedFieldsUrlBuilder::add()) . '" title="' . $_data->get('L_ADD') . '"><i class="fa fa-fw fa-plus"></i>' . $_data->get('L_ADD') . '</a></li>
						</ul>
					</li>
					';if ($_data->is_true($_data->get('C_ADMIN_LINKS_4'))){$_result.='
						';foreach($_data->get_block('admin_links_4') as $_tmp_admin_links_4){$_result.='
							';$_subtpl=$_data->get_from_list('MODULE_MENU', $_tmp_admin_links_4);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
						';}$_result.='
					';}$_result.='
				</ul>
			</div>
		</li>
		<li class="admin-li">
			<a href="#openmodal-' . $_data->get('L_CONTENT') . '" title="' . $_data->get('L_CONTENT') . '"><i class="fa fa-fw fa-square-o"></i><span>' . $_data->get('L_CONTENT') . '</span></a>
			<div id="openmodal-' . $_data->get('L_CONTENT') . '" class="cssmenu-modal">
				<a href="#closemodal" title="' . LangLoader::get_message('close_menu', 'admin') . '" class="close"><span>x</span></a>
				<div class="next-menu">
					<a class="float-left" href="#openmodal-' . $_data->get('L_USER') . '" title="' . $_data->get('L_USER') . '">
						<i class="fa fa-arrow-left"></i>
						' . $_data->get('L_USER') . '
					</a>
					<a class="float-right" href="#openmodule-' . $_data->get('L_MODULES') . '" title="' . $_data->get('L_MODULES') . '">
						' . $_data->get('L_MODULES') . '
						<i class="fa fa-arrow-right"></i>
					</a>
				</div>
				<ul class="submenu">
					<li>
						<a href="' . $_functions->relative_url(AdminContentUrlBuilder::content_configuration()) . '" title="' . $_data->get('L_CONTENT_CONFIG') . '"><i class="fa fa-fw fa-square-o"></i>' . $_data->get('L_CONTENT_CONFIG') . '</a>
					</li>
					<li>
						<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/menus.php" title="' . $_data->get('L_MENUS') . '"><i class="fa fa-fw fa-list-ul"></i>' . $_data->get('L_MENUS') . '</a>
						<ul class="level-2">
							<li><a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/menus.php" title="' . $_data->get('L_MANAGEMENT') . '"><i class="fa fa-fw fa-cog"></i>' . $_data->get('L_MANAGEMENT') . '</a></li>
							<li><a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/links.php" title="' . $_data->get('L_ADD_LINKS_MENU') . '"><i class="fa fa-fw fa-list-ul"></i>' . $_data->get('L_ADD_LINKS_MENU') . '</a></li>
							<li><a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/content.php" title="' . $_data->get('L_ADD_CONTENT_MENU') . '"><i class="fa fa-fw fa-file-o"></i>' . $_data->get('L_ADD_CONTENT_MENU') . '</a></li>
							<li><a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/feed.php" title="' . $_data->get('L_ADD_FEED_MENU') . '"><i class="fa fa-fw fa-rss"></i>' . $_data->get('L_ADD_FEED_MENU') . '</a></li>
						</ul>
					</li>
					<li>
						<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/admin_files.php" title="' . $_data->get('L_FILES') . '"><i class="fa fa-fw fa-file-text-o"></i>' . $_data->get('L_FILES') . '</a>
						<ul class="level-2">
							<li><a href="' . $_data->get('PATH_TO_ROOT') . '/admin/admin_files.php" title="' . $_data->get('L_MANAGEMENT') . '"><i class="fa fa-fw fa-cog"></i>' . $_data->get('L_MANAGEMENT') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminFilesUrlBuilder::configuration()) . '" title="' . $_data->get('L_CONFIGURATION') . '"><i class="fa fa-cogs"></i>' . $_data->get('L_CONFIGURATION') . '</a></li>
						</ul>
					</li>
					<li>
						<a href="' . $_functions->relative_url(UserUrlBuilder::comments()) . '" title="' . $_data->get('L_COMMENTS') . '"><i class="fa fa-fw fa-comment-o"></i>' . $_data->get('L_COMMENTS') . '</a>
						<ul class="level-2">
							<li><a href="' . $_functions->relative_url(UserUrlBuilder::comments()) . '" title="' . $_data->get('L_MANAGEMENT') . '"><i class="fa fa-fw fa-cog"></i>' . $_data->get('L_MANAGEMENT') . '</a></li>
							<li><a href="' . $_data->get('PATH_TO_ROOT') . '/admin/content/?url=/comments/config/" title="' . $_data->get('L_CONFIGURATION') . '"><i class="fa fa-fw fa-cogs"></i>' . $_data->get('L_CONFIGURATION') . '</a></li>
						</ul>
					</li>
					<li>
						<a href="' . $_functions->relative_url(AdminSmileysUrlBuilder::management()) . '" title="' . $_data->get('L_SMILEY') . '"><i class="fa fa-fw fa-smile-o"></i>' . $_data->get('L_SMILEY') . '</a>
						<ul class="level-2">
							<li><a href="' . $_functions->relative_url(AdminSmileysUrlBuilder::management()) . '" title="' . $_data->get('L_MANAGEMENT') . '"><i class="fa fa-fw fa-cog"></i>' . $_data->get('L_MANAGEMENT') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminSmileysUrlBuilder::add()) . '" title="' . $_data->get('L_ADD') . '"><i class="fa fa-fw fa-plus"></i>' . $_data->get('L_ADD') . '</a></li>
						</ul>
					</li>
					';if ($_data->is_true($_data->get('C_ADMIN_LINKS_5'))){$_result.='
						';foreach($_data->get_block('admin_links_5') as $_tmp_admin_links_5){$_result.='
							';$_subtpl=$_data->get_from_list('MODULE_MENU', $_tmp_admin_links_5);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
						';}$_result.='
					';}$_result.='
				</ul>
			</div>
		</li>
		<li class="admin-li">
			<a href="#openmodule-' . $_data->get('L_MODULES') . '" title="' . $_data->get('L_MODULES') . '"><i class="fa fa-fw fa-cube"></i><span>' . $_data->get('L_MODULES') . '</span></a>
			<div id="openmodule-' . $_data->get('L_MODULES') . '" class="cssmenu-modal">
				<a href="#closemodal" title="' . LangLoader::get_message('close_menu', 'admin') . '" class="close"><span>x</span></a>
				<div class="next-menu">
					<a class="float-left" href="#openmodal-' . $_data->get('L_CONTENT') . '" title="' . $_data->get('L_CONTENT') . '">
						<i class="fa fa-arrow-left"></i>
						' . $_data->get('L_CONTENT') . '
					</a>
					<a class="float-right" href="#openmodal-' . $_data->get('L_ADMINISTRATION') . '" title="' . $_data->get('L_ADMINISTRATION') . '">
						' . $_data->get('L_ADMINISTRATION') . '
						<i class="fa fa-arrow-right"></i>
					</a>
				</div>
				<ul class="submenu">
					<li>
						<a href="' . $_functions->relative_url(AdminModulesUrlBuilder::list_installed_modules()) . '" title="' . $_data->get('L_MODULES') . '"><i class="fa fa-fw fa-cube"></i>' . $_data->get('L_MODULES') . '</a>
						<ul class="level-2"> 
							<li><a href="' . $_functions->relative_url(AdminModulesUrlBuilder::list_installed_modules()) . '" title="' . $_data->get('L_MANAGEMENT') . '"><i class="fa fa-fw fa-cog"></i>' . $_data->get('L_MANAGEMENT') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminModulesUrlBuilder::add_module()) . '" title="' . $_data->get('L_ADD') . '"><i class="fa fa-fw fa-plus"></i>' . $_data->get('L_ADD') . '</a></li>
							<li><a href="' . $_functions->relative_url(AdminModulesUrlBuilder::update_module()) . '" title="' . $_data->get('L_UPDATES') . '"><i class="fa fa-fw fa-level-up"></i>' . $_data->get('L_UPDATES') . '</a></li>
						</ul>
					</li>
					';if ($_data->is_true($_data->get('C_ADMIN_LINKS_6'))){$_result.='
						';foreach($_data->get_block('admin_links_6') as $_tmp_admin_links_6){$_result.='
							';$_subtpl=$_data->get_from_list('MODULE_MENU', $_tmp_admin_links_6);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
						';}$_result.='
					';}$_result.='
				</ul>
			</div>
		</li>
	</ul>
</nav>'; ?>