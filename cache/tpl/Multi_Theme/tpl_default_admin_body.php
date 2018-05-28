<?php $_result='
	<header id="header-admin">
		<nav class="admin-index">
			<ul>
				<li>
					<a href="' . $_data->get('PATH_TO_ROOT') . '/" title="' . $_data->get('L_INDEX_SITE') . '">
						<i class="fa fa-fw fa-home"></i> <span>' . $_data->get('L_INDEX_SITE') . '</span>
					</a>
				</li>
				<li>
					<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/admin_index.php" title="' . $_data->get('L_ADMINISTRATION') . '">
						<i class="fa fa-fw fa-cogs"></i> <span>' . $_data->get('L_ADMINISTRATION') . '</span>
					</a>
				</li>
				<li>
					<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/admin_extend.php" title="' . $_data->get('L_EXTEND_MENU') . '">
						<i class="fa fa-fw fa-th"></i> <span>' . $_data->get('L_EXTEND_MENU') . '</span>
					</a>
				</li>
				<li>
					<a href="' . $_functions->relative_url(UserUrlBuilder::disconnect()) . '" title="' . $_data->get('L_DISCONNECT') . '">
						<i class="fa fa-fw fa-sign-out"></i> <span>' . $_data->get('L_DISCONNECT') . '</span>
					</a>
				</li>
			</ul>
		</nav>
		<div class="header-admin-container">
			<div id="top-header-admin">
				<div id="site-name-container">
					<a id="site-name" href="' . $_data->get('PATH_TO_ROOT') . '/" title="' . $_data->get('SITE_NAME') . '">' . $_data->get('SITE_NAME') . '</a>
				</div>
			</div>
			<div id="sub-header-admin">
				<div id="admin-link">
					<h3 class="menu-title">
						<div class="site-logo" ';if ($_data->is_true($_data->get('C_HEADER_LOGO'))){$_result.='style="background-image: url(' . $_data->get('HEADER_LOGO') . ');"';}$_result.='></div>
						<span>' . $_data->get('L_ADMIN_MAIN_MENU') . '</span>
					</h3>
					';$_subtpl=$_data->get('subheader_menu');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
				</div>	

				<div id="support-pbt">
					<nav>
						<h3 class="menu-title">
							<div class="pbt-logo"></div>
							<span>' . $_data->get('L_NEED_HELP') . '</span>
						</h3>
						<ul>
							<li>
								<a href="http://www.phpboost.com/forum" title="' . $_data->get('L_INDEX_SUPPORT') . '">
									<i class="fa fa-fw fa-globe"></i> ' . $_data->get('L_INDEX_SUPPORT') . '
								</a>
							</li>
							<li>
								<a href="http://www.phpboost.com/faq" title="' . $_data->get('L_INDEX_FAQ') . '">
									<i class="fa fa-fw fa-question-circle"></i> ' . $_data->get('L_INDEX_FAQ') . '
								</a>
							</li>
							<li>
								<a href="http://www.phpboost.com/wiki" title="' . $_data->get('L_INDEX_DOCUMENTATION') . '">
									<i class="fa fa-fw fa-book"></i> ' . $_data->get('L_INDEX_DOCUMENTATION') . '
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</header>
	
	<div id="global">
		
		<div id="admin-main">
			';$_subtpl=$_data->get('KERNEL_MESSAGE');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
			' . $_data->get('CONTENT') . '
		</div>
		
		<footer id="footer">
			<span>
				' . $_data->get('L_POWERED_BY') . ' <a class="powered-by" href="http://www.phpboost.com" title="PHPBoost">PHPBoost</a> ' . $_data->get('L_PHPBOOST_RIGHT') . '
			</span>	
			';if ($_data->is_true($_data->get('C_DISPLAY_BENCH'))){$_result.='
				<span>
				' . $_data->get('L_ACHIEVED') . ' ' . $_data->get('BENCH') . '' . $_data->get('L_UNIT_SECOND') . ' - ' . $_data->get('REQ') . ' ' . $_data->get('L_REQ') . ' - ' . $_data->get('MEMORY_USED') . '
				</span>	
			';}$_result.='
			';if ($_data->is_true($_data->get('C_DISPLAY_AUTHOR_THEME'))){$_result.='
				<span>
				| ' . $_data->get('L_THEME') . ' ' . $_data->get('L_THEME_NAME') . ' ' . $_data->get('L_BY') . ' <a href="' . $_data->get('U_THEME_AUTHOR_LINK') . '">' . $_data->get('L_THEME_AUTHOR') . '</a>
				</span>
			';}$_result.='
		</footer>
		
	</div>
'; ?>