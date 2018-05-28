<?php $_result='	';$_subtpl=$_data->get('MAINTAIN');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
	<script src="' . $_data->get('PATH_TO_ROOT') . '/templates/' . $_data->get('THEME') . '/js/flaunt.js"></script>	
	<script src="' . $_data->get('PATH_TO_ROOT') . '/templates/' . $_data->get('THEME') . '/js/scroll-to.js"></script>


	
	<div id="top_page"></div>	
	<div id="contenu">	
	<header id="header">
		<div id="header-gsm">
			<a id="site-name-gsm" href="' . $_data->get('PATH_TO_ROOT') . '/">' . $_data->get('SITE_NAME') . '</a>
		</div>
		<div id="top-header">
			<div id="visit-counter">
				';if ($_data->is_true($_data->get('C_VISIT_COUNTER'))){$_result.='
				 ::&nbsp;<span>' . $_data->get('L_VISIT') . ' : ' . $_data->get('VISIT_COUNTER_TOTAL') . '&nbsp;-&nbsp;' . $_data->get('L_TODAY') . ' : ' . $_data->get('VISIT_COUNTER_DAY') . '</span>&nbsp;:: &nbsp; Bienvenue sur <a id="welcome-name" href="' . $_data->get('PATH_TO_ROOT') . '/">' . $_data->get('SITE_NAME') . '</a> !
				';}$_result.='
			</div>
			
			<div id="site-infos">
				<div id="site-logo"';if ($_data->is_true($_data->get('C_HEADER_LOGO'))){$_result.=' style="background: url(' . $_data->get('HEADER_LOGO') . ') no-repeat;"';}$_result.='></div>
				<div id="site-name-container">
					<a id="site-name" href="' . $_data->get('PATH_TO_ROOT') . '/">' . $_data->get('SITE_NAME') . '</a>
					<span id="site-slogan">' . $_data->get('SITE_SLOGAN') . '</span>
				</div>
			</div>
			<div id="top-header-content">
			';if ($_data->is_true($_data->get('C_MENUS_HEADER_CONTENT'))){$_result.='
				';foreach($_data->get_block('menus_header') as $_tmp_menus_header){$_result.='
				' . $_data->get_from_list('MENU', $_tmp_menus_header) . '
				';}$_result.='
			';}$_result.='
			</div>
			
			<section id="slider" class="demo">
				 <a href="#" class="next"><i class="fa fa-chevron-right fa-2"></i></a>
				 <a href="#" class="prev"><i class="fa fa-chevron-left fa-2"></i></a>
				<div class="container">
					<div style="display: inline-block;"><a href="index.php"><img src="' . $_data->get('PATH_TO_ROOT') . '/templates/' . $_data->get('THEME') . '/theme/images/slide/1.jpg"/></a></div>
					<div><a href="index.php"><img src="' . $_data->get('PATH_TO_ROOT') . '/templates/' . $_data->get('THEME') . '/theme/images/slide/2.jpg"/></a></div>
					<div><a href="index.php"><img src="' . $_data->get('PATH_TO_ROOT') . '/templates/' . $_data->get('THEME') . '/theme/images/slide/3.jpg"/></a></div>
					<div><a href="index.php"><img src="' . $_data->get('PATH_TO_ROOT') . '/templates/' . $_data->get('THEME') . '/theme/images/slide/4.jpg"/></a></div>
					<div><a href="index.php"><img src="' . $_data->get('PATH_TO_ROOT') . '/templates/' . $_data->get('THEME') . '/theme/images/slide/5.jpg"/></a></div>
					<div><a href="index.php"><img src="' . $_data->get('PATH_TO_ROOT') . '/templates/' . $_data->get('THEME') . '/theme/images/slide/6.jpg"/></a></div>
				</div>
			</section>

			<div class="spacer"></div>
			<div id="prim-nav">
				<section id="navbook">
					<div id="menu-title">Menu principal</div>		
					<nav  class="MNnav">
							<ul id="MNnav" class="MNnav-list">
								<li class="MNnav-item">
									<a href="?=about"><i class="fa fa-home"></i> Accueil</a>
								</li>	
								<li class="MNnav-item">
									<a href="?=home"><i class="fa fa-newspaper-o"></i> Promenades</a>
									<ul  class="MNnav-submenu">
										<li class="MNnav-submenu-item">
											<a href="?=submenu-1">Trajets 1</a>
										</li>
										<li class="MNnav-submenu-item">
											<a href="?=submenu-2">Trajets 2</a>
										</li>
										<li class="MNnav-submenu-item">
											<a href="?=submenu-3">Trajets 3</a>
										</li>
										<li class="MNnav-submenu-item">
											<a href="?=submenu-4">Trajets 3</a>
										</li>
									</ul>
								</li>
								<li class="MNnav-item">
									<a href="?=portfolio"><i class="fa fa-bars"></i> Les sites</a>
									<ul  class="MNnav-submenu">
										<li class="MNnav-submenu-item">
											<a href="?=submenu-1">Site 1</a>
										</li>
										<li class="MNnav-submenu-item">
											<a href="?=submenu-2">Site 2</a>
										</li>
										<li class="MNnav-submenu-item">
											<a href="?=submenu-3">Site 3</a>
										</li>
										<li class="MNnav-submenu-item">
											<a href="?=submenu-4">Site 3</a>
										</li>
									</ul>
								</li>
								<li class="MNnav-item">
									<a href="?=about"><i class="fa fa-rss"></i> Blog</a>
								</li>
								<li class="MNnav-item">
									<a href="?=about"><i class="fa fa-medkit"></i> F.A.Q</a>
								</li>						
								<li class="MNnav-item">
									<a href="?=about"><i class="fa fa-newspaper-o"></i> News</a>
								</li>
								<li class="MNnav-item">
									<a href="?=testimonials"><i class="fa fa-desktop"></i> Photos</a>
								</li>
								<li class="MNnav-item">
									<a href="?=contact"><i class="fa fa-envelope"></i> Contact</a>
								</li>
							</ul>
					</nav>
				</section>
			</div>
		</div>
		<div id="sub-header">
			';if ($_data->is_true($_data->get('C_MENUS_SUB_HEADER_CONTENT'))){$_result.='
				';foreach($_data->get_block('menus_sub_header') as $_tmp_menus_sub_header){$_result.='
				' . $_data->get_from_list('MENU', $_tmp_menus_sub_header) . '
				';}$_result.='
			';}$_result.='
		</div>
		<div class="spacer"></div>
	</header>
	
	<div id="menugo">
		<div id="gotop" style="display: block;">
			<a class="js-scrollTo" href="#top_page"><i class="fa fa-chevron-up"></i></a>
		</div>
		<div id="gobottom" style="display: block;">
			<a class="js-scrollTo" href="#bottom_page"><i class="fa fa-chevron-down"></i></a>
		</div>
	</div>		
	
	<div id="global">
		<div id="sous-global">

			';if ($_data->is_true($_data->get('C_MENUS_LEFT_CONTENT'))){$_result.='
			<aside id="menu-left">
				';foreach($_data->get_block('menus_left') as $_tmp_menus_left){$_result.='
				' . $_data->get_from_list('MENU', $_tmp_menus_left) . '
				';}$_result.='
			</aside>
			';}$_result.='

			<div id="main" class="';if ($_data->is_true($_data->get('C_MENUS_LEFT_CONTENT'))){$_result.='main-with-left';}$_result.='';if ($_data->is_true($_data->get('C_MENUS_RIGHT_CONTENT'))){$_result.=' main-with-right';}$_result.='" role="main">
				';if ($_data->is_true($_data->get('C_MENUS_TOPCENTRAL_CONTENT'))){$_result.='
				<div id="top-content">
					';foreach($_data->get_block('menus_top_central') as $_tmp_menus_top_central){$_result.='
					' . $_data->get_from_list('MENU', $_tmp_menus_top_central) . '
					';}$_result.='
				</div>
				<div class="spacer"></div>
				';}$_result.='

				<div id="main-content" itemprop="mainContentOfPage">
					';$_subtpl=$_data->get('ACTIONS_MENU');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
					<nav id="breadcrumb" itemprop="breadcrumb">
						<ol>
							<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
								<a href="' . $_data->get('START_PAGE') . '" title="' . $_data->get('L_INDEX') . '" itemprop="url">
									<span itemprop="title">' . $_data->get('L_INDEX') . '</span>
								</a>
							</li>						
							';foreach($_data->get_block('link_bread_crumb') as $_tmp_link_bread_crumb){$_result.='
							<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb" ';if ($_data->is_true($_data->get_from_list('C_CURRENT', $_tmp_link_bread_crumb))){$_result.=' class="current" ';}$_result.='>
								<a href="' . $_data->get_from_list('URL', $_tmp_link_bread_crumb) . '" title="' . $_data->get_from_list('TITLE', $_tmp_link_bread_crumb) . '" itemprop="url">
									<span itemprop="title">' . $_data->get_from_list('TITLE', $_tmp_link_bread_crumb) . '</span>
								</a>
							</li>
							';}$_result.='
						</ol>
					</nav>
					';$_subtpl=$_data->get('KERNEL_MESSAGE');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
					' . $_data->get('CONTENT') . '
				</div>

				';if ($_data->is_true($_data->get('C_MENUS_BOTTOM_CENTRAL_CONTENT'))){$_result.='
				<div id="bottom-content">
					';foreach($_data->get_block('menus_bottom_central') as $_tmp_menus_bottom_central){$_result.='
					' . $_data->get_from_list('MENU', $_tmp_menus_bottom_central) . '
					';}$_result.='
				</div>
				';}$_result.='
			</div>

			';if ($_data->is_true($_data->get('C_MENUS_RIGHT_CONTENT'))){$_result.='
			<aside id="menu-right">
				';foreach($_data->get_block('menus_right') as $_tmp_menus_right){$_result.='
				' . $_data->get_from_list('MENU', $_tmp_menus_right) . '
				';}$_result.='
			</aside>
			';}$_result.='

			';if ($_data->is_true($_data->get('C_MENUS_TOP_FOOTER_CONTENT'))){$_result.='
			<div id="top-footer">
				';foreach($_data->get_block('menus_top_footer') as $_tmp_menus_top_footer){$_result.='
				' . $_data->get_from_list('MENU', $_tmp_menus_top_footer) . '
				';}$_result.='
				<div class="spacer"></div>
			</div>
			';}$_result.='

			<div class="spacer"></div>
		</div>
	</div>
	
	</div><!-- fermeture du "Id:contenu"-->
	
	<footer id="footer">

		';if ($_data->is_true($_data->get('C_MENUS_FOOTER_CONTENT'))){$_result.='
		<div class="footer-content">
			';foreach($_data->get_block('menus_footer') as $_tmp_menus_footer){$_result.='
			' . $_data->get_from_list('MENU', $_tmp_menus_footer) . '
			';}$_result.='
		</div>
		';}$_result.='

		<div class="footer-infos">
			<span class="cms">
				' . $_data->get('L_POWERED_BY') . ' <a href="http://www.phpboost.com" title="' . $_data->get('L_PHPBOOST_LINK') . '">PHPBoost</a> ' . $_data->get('L_PHPBOOST_RIGHT') . '
			</span>
			';if ($_data->is_true($_data->get('C_DISPLAY_BENCH'))){$_result.='
			<span class="requete">
			<span class="footer-infos-separator"> | </span>' . $_data->get('L_ACHIEVED') . ' ' . $_data->get('BENCH') . '' . $_data->get('L_UNIT_SECOND') . ' - ' . $_data->get('REQ') . ' ' . $_data->get('L_REQ') . ' - ' . $_data->get('MEMORY_USED') . '
			</span>
			';}$_result.='
			';if ($_data->is_true($_data->get('C_DISPLAY_AUTHOR_THEME'))){$_result.='
			<span class="author">
			<span class="footer-infos-separator"> | </span>' . $_data->get('L_THEME') . ' ' . $_data->get('L_THEME_NAME') . ' ' . $_data->get('L_BY') . '
				<a href="' . $_data->get('U_THEME_AUTHOR_LINK') . '">' . $_data->get('L_THEME_AUTHOR') . '</a>
			</span>
			';}$_result.='
		</div>

	</footer>
	

	<div id="bottom_page"></div>
'; ?>