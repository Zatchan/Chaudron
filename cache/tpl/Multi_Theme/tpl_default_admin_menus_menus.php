<?php $_result='<script>
<!--
var delay = 1200; //Délai après lequel le bloc est automatiquement masqué, après le départ de la souris.
var timeout;
var displayed = false;
var previous = \'\';
var started = false;

//Affiche le bloc.
function menu_display_block(divID)
{
	if( timeout )
		clearTimeout(timeout);
	
	if( document.getElementById(previous) )
	{		
		document.getElementById(previous).style.display = \'none\';
		started = false
	}	

	if( document.getElementById(\'move\' + divID) )
	{			
		document.getElementById(\'move\' + divID).style.display = \'block\';
		previous = \'move\' + divID;
		started = true;
	}
}
//Cache le bloc.
function menu_hide_block(idfield, stop)
{
	if( stop && timeout )
		clearTimeout(timeout);
	else if( started )
		timeout = setTimeout(\'menu_display_block()\', delay);
}
function minimize_container(input, containerName) 
{
	var container = document.getElementById(\'mod_\' + containerName);
	
	if (!container)
		return;

	if(input.checked == false)
	{
		container.style.opacity = 0.5;
		container.style.filter=\'alpha(opacity=50)\';
	}
	else
	{
		container.style.opacity = 1;
		container.style.filter=\'alpha(opacity=100)\';
	}
}

//Drag\'n drop
var menusContainerList = new Array(
	\'mod_header\',
	\'mod_subheader\',
	\'mod_left\',
	\'mod_right\',
	\'mod_topcentral\',
	\'mod_central\',
	\'mod_bottomcentral\',
	\'mod_topfooter\',
	\'mod_footer\'
);
function build_menu_tree() 
{
	var containerListLength = menusContainerList.length;
	for(var i = 0; i < containerListLength; i++)
	{
		var sequence = jQuery(\'#\' + menusContainerList[i]).sortable("serialize").get();
		jQuery(\'<input/>\').attr({
			type: \'hidden\',
			name: \'menu_tree_\' + menusContainerList[i],
			value: JSON.stringify(sequence[0])
		}).appendTo(\'#form_menus\');
	}
}
function createSortableMenu() 
{
	var containerListLength = menusContainerList.length;
	for(var i = 0; i < containerListLength; i++)
	{
		jQuery(\'#\' + menusContainerList[i]).sortable({
			handle: \'.fa-arrows\',
			group: \'menus\',
			placeholder: \'<div class="dropzone">\' + ' . $_functions->escapejs(LangLoader::get_message('position.drop_here', 'common')) . ' + \'</div>\',
			containerSelector: \'#mod_header, #mod_subheader, #mod_left, #mod_right, #mod_topcentral, #mod_central, #mod_bottomcentral, #mod_topfooter, #mod_footer\',
			itemSelector: \'div.menus-block-container\'
		});
	}
}
-->
</script>



	<form id="form_menus" action="menus.php?action=save" method="post" onsubmit="build_menu_tree();">
		
		<div class="themesmanagement">
			<div>
				<strong>' . $_data->get('L_THEME_MANAGEMENT') . ' :</strong> 
				<select name="switchtheme" onchange="document.location = \'?token=' . $_data->get('TOKEN') . '&amp;theme=\' + this.options[this.selectedIndex].value;">
					';foreach($_data->get_block('themes') as $_tmp_themes){$_result.='
						<option value="' . $_data->get_from_list('IDNAME', $_tmp_themes) . '" ' . $_data->get_from_list('SELECTED', $_tmp_themes) . ' >' . $_data->get_from_list('NAME', $_tmp_themes) . '</option>
					';}$_result.='
				</select>
			</div>
		</div>
		<div id="admin-contents admin-contents-no-column">		
			<div class="menusmanagement">
				<div>
					<div id="container-header">
						<div class="container-block">
							<div>
								<div class="container-block-absolute" id="moveaddmenu1">
									<div onmouseover="menu_hide_block(\'addmenu1\', 1);" onmouseout="menu_hide_block(\'addmenu1\', 0);">
										<p class="menus-block-add menus-block-add-links">
											<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/links.php?s=1" class="small">' . $_data->get('L_ADD_LINKS_MENUS') . '</a>
										</p>
										<p class="menus-block-add menus-block-add-links">
											<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/content.php?s=1" class="small">' . $_data->get('L_ADD_CONTENT_MENUS') . '</a>
										</p>
										<p class="menus-block-add menus-block-add-links">
											<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/feed.php?s=1" class="small">' . $_data->get('L_ADD_FEED_MENUS') . '</a>
										</p>
									</div>
								</div>
								<p class="menu-block-libelle">
									<span class="form-field-checkbox-mini">
										<input id="header_enabled" onclick="minimize_container(this, \'header\')" type="checkbox" name="header_enabled" ' . $_data->get('CHECKED_HEADER_COLUMN') . ' />
										<label for="header_enabled"></label>
									</span>
									' . $_data->get('L_HEADER') . '
								</p>
								<p class="menus-block-add" onclick="menu_display_block(\'addmenu1\');" onmouseover="menu_hide_block(\'addmenu1\', 1);" onmouseout="menu_hide_block(\'addmenu1\', 0);">
									<i class="fa fa-plus"></i> ' . $_data->get('L_ADD_MENU') . '
								</p>
							</div>
						</div>
						<div id="mod_header">
							';foreach($_data->get_block('mod_header') as $_tmp_mod_header){$_result.='
								' . $_data->get_from_list('MENU', $_tmp_mod_header) . '
							';}$_result.='
							<div id="menu-spacer1" class="menu-spacer"></div>
						</div>
					</div>
				</div><!-- container-header -->
				<div>
					<div id="container-subheader">
						<div class="container-block">
							<div>
								<div class="container-block-absolute" id="moveaddmenu2">
									<div onmouseover="menu_hide_block(\'addmenu2\', 1);" onmouseout="menu_hide_block(\'addmenu2\', 0);">
										<p class="menus-block-add menus-block-add-links">
											<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/links.php?s=2" class="small">' . $_data->get('L_ADD_LINKS_MENUS') . '</a>
										</p>
										<p class="menus-block-add menus-block-add-links">
											<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/content.php?s=2" class="small">' . $_data->get('L_ADD_CONTENT_MENUS') . '</a>
										</p>
										<p class="menus-block-add menus-block-add-links">
											<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/feed.php?s=2" class="small">' . $_data->get('L_ADD_FEED_MENUS') . '</a>
										</p>
									</div>
								</div>
								<p class="menu-block-libelle">
									<span class="form-field-checkbox-mini">
										<input id="sub_header_enabled" onclick="minimize_container(this, \'subheader\')" type="checkbox" name="sub_header_enabled" ' . $_data->get('CHECKED_SUB_HEADER_COLUMN') . ' />
										<label for="sub_header_enabled"></label>
									</span>
									' . $_data->get('L_SUB_HEADER') . '
								</p>
								<p class="menus-block-add" onclick="menu_display_block(\'addmenu2\');" onmouseover="menu_hide_block(\'addmenu2\', 1);" onmouseout="menu_hide_block(\'addmenu2\', 0);">
									<i class="fa fa-plus"></i> ' . $_data->get('L_ADD_MENU') . '
								</p>
							</div>
						</div>
						<div id="mod_subheader">
							';foreach($_data->get_block('mod_subheader') as $_tmp_mod_subheader){$_result.='
								' . $_data->get_from_list('MENU', $_tmp_mod_subheader) . '
							';}$_result.='
							<div id="menu-spacer2" class="menu-spacer"></div>
						</div>
					</div>
				</div><!-- container-subheader -->
				<div class="menus-management-column">
					<div>
						<div id="container-leftmenu">
							<div class="container-block">
								<div>
									<div class="container-block-absolute" id="moveaddmenu3">
										<div onmouseover="menu_hide_block(\'addmenu3\', 1);" onmouseout="menu_hide_block(\'addmenu3\', 0);">
											<p class="menus-block-add menus-block-add-links">
												<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/links.php?s=7" class="small">' . $_data->get('L_ADD_LINKS_MENUS') . '</a>
											</p>
											<p class="menus-block-add menus-block-add-links">
												<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/content.php?s=7" class="small">' . $_data->get('L_ADD_CONTENT_MENUS') . '</a>
											</p>
											<p class="menus-block-add menus-block-add-links">
												<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/feed.php?s=7" class="small">' . $_data->get('L_ADD_FEED_MENUS') . '</a>
											</p>
										</div>
									</div>									
									<p class="menu-block-libelle">
										<span class="form-field-checkbox-mini">
											<input id="left_column_enabled" onclick="minimize_container(this, \'left\')" type="checkbox" name="left_column_enabled" ' . $_data->get('CHECKED_LEFT_COLUMN') . ' />
											<label for="left_column_enabled"></label>
										</span>
										' . $_data->get('L_LEFT_MENU') . '
									</p><p class="menus-block-add" onclick="menu_display_block(\'addmenu3\');" onmouseover="menu_hide_block(\'addmenu3\', 1);" onmouseout="menu_hide_block(\'addmenu3\', 0);">
										<i class="fa fa-plus"></i> ' . $_data->get('L_ADD_MENU') . '
									</p>
								</div>
							</div>
							<div id="mod_left">
								<hr />
								';foreach($_data->get_block('mod_left') as $_tmp_mod_left){$_result.='
									' . $_data->get_from_list('MENU', $_tmp_mod_left) . '
								';}$_result.='
								<div id="menu-spacer3" class="menu-spacer"></div>
							</div>
						</div>
					</div><!-- container-left-menu -->
					<div class="menus-management-central">
						<div>
							<div id="container-topcentral">
								<div class="container-block">
									<div>
										<div class="container-block-absolute" id="moveaddmenu4">
											<div onmouseover="menu_hide_block(\'addmenu4\', 1);" onmouseout="menu_hide_block(\'addmenu4\', 0);">
												<p class="menus-block-add menus-block-add-links">
													<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/links.php?s=3" class="small">' . $_data->get('L_ADD_LINKS_MENUS') . '</a>
												</p>
												<p class="menus-block-add menus-block-add-links">
													<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/content.php?s=3" class="small">' . $_data->get('L_ADD_CONTENT_MENUS') . '</a>
												</p>
												<p class="menus-block-add menus-block-add-links">
													<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/feed.php?s=3" class="small">' . $_data->get('L_ADD_FEED_MENUS') . '</a>
												</p>
											</div>
										</div>																			
										<p class="menu-block-libelle">
											<span class="form-field-checkbox-mini">
												<input id="top_central_enabled" onclick="minimize_container(this, \'topcentral\')" type="checkbox" name="top_central_enabled" ' . $_data->get('CHECKED_TOP_CENTRAL_COLUMN') . ' />
												<label for="top_central_enabled"></label>
											</span>
											' . $_data->get('L_TOP_CENTRAL_MENU') . '
										</p>
										<p class="menus-block-add" onclick="menu_display_block(\'addmenu4\');" onmouseover="menu_hide_block(\'addmenu4\', 1);" onmouseout="menu_hide_block(\'addmenu4\', 0);">
											<i class="fa fa-plus"></i> ' . $_data->get('L_ADD_MENU') . '
										</p>
									</div>
								</div>
								<div id="mod_topcentral">
									';foreach($_data->get_block('mod_topcentral') as $_tmp_mod_topcentral){$_result.='
										' . $_data->get_from_list('MENU', $_tmp_mod_topcentral) . '
									';}$_result.='
									<div id="menu-spacer4" class="menu-spacer"></div>
								</div>
							</div>
						</div><!-- container-topcentral -->
						<div>
							<div id="container-central">
								<div class="container-block">
									<div>
										<p class="menu-block-libelle">' . $_data->get('L_MENUS_AVAILABLE') . '</p>
										<p class="menus-block-add"></p>
									</div>
								</div>
								
								<div id="mod_central">
									';foreach($_data->get_block('mod_central') as $_tmp_mod_central){$_result.='
										' . $_data->get_from_list('MENU', $_tmp_mod_central) . '
									';}$_result.='
									<div id="menu-spacer5" class="menu-spacer"></div>
								</div>
							</div>
						</div> <!-- container-central -->
						<div>
							<div id="container-bottomcentral">
								<div class="container-block">
									<div>
										<div class="container-block-absolute" id="moveaddmenu5">
											<div onmouseover="menu_hide_block(\'addmenu5\', 1);" onmouseout="menu_hide_block(\'addmenu5\', 0);">
												<p class="menus-block-add menus-block-add-links">
													<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/links.php?s=4" class="small">' . $_data->get('L_ADD_LINKS_MENUS') . '</a>
												</p>
												<p class="menus-block-add menus-block-add-links">
													<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/content.php?s=4" class="small">' . $_data->get('L_ADD_CONTENT_MENUS') . '</a>
												</p>
												<p class="menus-block-add menus-block-add-links">
													<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/feed.php?s=4" class="small">' . $_data->get('L_ADD_FEED_MENUS') . '</a>
												</p>
											</div>
										</div>																		
										<p class="menu-block-libelle">
											<span class="form-field-checkbox-mini">
												<input id="bottom_central_enabled" onclick="minimize_container(this, \'bottomcentral\')" type="checkbox" name="bottom_central_enabled" ' . $_data->get('CHECKED_BOTTOM_CENTRAL_COLUMN') . ' />
												<label for="bottom_central_enabled"></label>
											</span>
											' . $_data->get('L_BOTTOM_CENTRAL_MENU') . '
										</p>
										<p class="menus-block-add" onclick="menu_display_block(\'addmenu5\');" onmouseover="menu_hide_block(\'addmenu5\', 1);" onmouseout="menu_hide_block(\'addmenu5\', 0);">
											<i class="fa fa-plus"></i> ' . $_data->get('L_ADD_MENU') . '
										</p>
									</div>
								</div>
								<div id="mod_bottomcentral">
									';foreach($_data->get_block('mod_bottomcentral') as $_tmp_mod_bottomcentral){$_result.='
										' . $_data->get_from_list('MENU', $_tmp_mod_bottomcentral) . '
									';}$_result.='
									<div id="menu-spacer6" class="menu-spacer"></div>
								</div>
							</div>
						</div> <!-- container-bottom-central -->
					</div><!-- MenusManagementCentral -->
					<div>
						<div id="container-rightmenu">
							<div class="container-block">
								<div>
									<div class="container-block-absolute" id="moveaddmenu6">
										<div onmouseover="menu_hide_block(\'addmenu6\', 1);" onmouseout="menu_hide_block(\'addmenu6\', 0);">
											<p class="menus-block-add menus-block-add-links">
												<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/links.php?s=8" class="small">' . $_data->get('L_ADD_LINKS_MENUS') . '</a>
											</p>
											<p class="menus-block-add menus-block-add-links">
												<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/content.php?s=8" class="small">' . $_data->get('L_ADD_CONTENT_MENUS') . '</a>
											</p>
											<p class="menus-block-add menus-block-add-links">
												<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/feed.php?s=8" class="small">' . $_data->get('L_ADD_FEED_MENUS') . '</a>
											</p>
										</div>
									</div>																	
									<p class="menu-block-libelle">
										<span class="form-field-checkbox-mini">
											<input id="right_column_enabled" onclick="minimize_container(this, \'right\')" type="checkbox" name="right_column_enabled" ' . $_data->get('CHECKED_RIGHT_COLUMN') . ' />
											<label for="right_column_enabled"></label>
										</span>
										' . $_data->get('L_RIGHT_MENU') . '
									</p>
									<p class="menus-block-add" onclick="menu_display_block(\'addmenu6\');" onmouseover="menu_hide_block(\'addmenu6\', 1);" onmouseout="menu_hide_block(\'addmenu6\', 0);">
										<i class="fa fa-plus"></i> ' . $_data->get('L_ADD_MENU') . '
									</p>
								</div>
							</div>
							<div id="mod_right">
								<hr />
								';foreach($_data->get_block('mod_right') as $_tmp_mod_right){$_result.='
									' . $_data->get_from_list('MENU', $_tmp_mod_right) . '
								';}$_result.='
								<div id="menu-spacer7" class="menu-spacer"></div>
							</div>
						</div> 
					</div><!-- container-right -->
				</div> <!-- MenusManagementColumn -->
			
				<div>
					<div id="container-topfooter">
						<div class="container-block">
							<div>
								<div class="container-block-absolute" id="moveaddmenu7">
									<div onmouseover="menu_hide_block(\'addmenu7\', 1);" onmouseout="menu_hide_block(\'addmenu7\', 0);">
										<p class="menus-block-add menus-block-add-links">
											<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/links.php?s=5" class="small">' . $_data->get('L_ADD_LINKS_MENUS') . '</a>
										</p>
										<p class="menus-block-add menus-block-add-links">
											<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/content.php?s=5" class="small">' . $_data->get('L_ADD_CONTENT_MENUS') . '</a>
										</p>
										<p class="menus-block-add menus-block-add-links">
											<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/feed.php?s=5" class="small">' . $_data->get('L_ADD_FEED_MENUS') . '</a>
										</p>
									</div>
								</div>																
								<p class="menu-block-libelle">
									<span class="form-field-checkbox-mini">
										<input id="top_footer_enabled" onclick="minimize_container(this, \'topfooter\')" type="checkbox" name="top_footer_enabled" ' . $_data->get('CHECKED_TOP_FOOTER_COLUMN') . ' />
										<label for="top_footer_enabled"></label>
									</span>
									' . $_data->get('L_TOP_FOOTER') . '
								</p>
								<p class="menus-block-add" onclick="menu_display_block(\'addmenu7\');" onmouseover="menu_hide_block(\'addmenu7\', 1);" onmouseout="menu_hide_block(\'addmenu7\', 0);">
									<i class="fa fa-plus"></i> ' . $_data->get('L_ADD_MENU') . '
								</p>
							</div>
						</div>
						<div id="mod_topfooter">
							';foreach($_data->get_block('mod_topfooter') as $_tmp_mod_topfooter){$_result.='
								' . $_data->get_from_list('MENU', $_tmp_mod_topfooter) . '
							';}$_result.='
							<div id="menu-spacer8" class="menu-spacer"></div>
						</div>
					</div>
				</div> <!-- container-top-footer -->
				<div>
					<div id="container-footer">
						<div class="container-block">
							<div>
								<div class="container-block-absolute" id="moveaddmenu8">
									<div onmouseover="menu_hide_block(\'addmenu8\', 1);" onmouseout="menu_hide_block(\'addmenu8\', 0);">
										<p class="menus-block-add menus-block-add-links">
											<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/links.php?s=6" class="small">' . $_data->get('L_ADD_LINKS_MENUS') . '</a>
										</p>
										<p class="menus-block-add menus-block-add-links">
											<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/content.php?s=6" class="small">' . $_data->get('L_ADD_CONTENT_MENUS') . '</a>
										</p>
										<p class="menus-block-add menus-block-add-links">
											<a href="' . $_data->get('PATH_TO_ROOT') . '/admin/menus/feed.php?s=6" class="small">' . $_data->get('L_ADD_FEED_MENUS') . '</a>
										</p>
									</div>
								</div>																
								<p class="menu-block-libelle">
									<span class="form-field-checkbox-mini">
										<input id="footer_enabled" onclick="minimize_container(this, \'footer\')" type="checkbox" name="footer_enabled" ' . $_data->get('CHECKED_FOOTER_COLUMN') . ' />
										<label for="footer_enabled"></label>
									</span>
									' . $_data->get('L_FOOTER') . '
								</p>
								<p class="menus-block-add" onclick="menu_display_block(\'addmenu8\');" onmouseover="menu_hide_block(\'addmenu8\', 1);" onmouseout="menu_hide_block(\'addmenu8\', 0);">
									<i class="fa fa-plus"></i> ' . $_data->get('L_ADD_MENU') . '
								</p>
							</div>
						</div>
						<div id="mod_footer">
							';foreach($_data->get_block('mod_footer') as $_tmp_mod_footer){$_result.='
								' . $_data->get_from_list('MENU', $_tmp_mod_footer) . '
							';}$_result.='
							<div id="menu-spacer9" class="menu-spacer"></div>
						</div>
					</div>
				</div> <!-- container-footer -->	
			</div> <!-- MenuManagment -->
		
			<div id="valid-position-menus">
				<button type="submit" class="submit" name="valid" value="true">' . $_data->get('L_VALID_POSTIONS') . '</button>
				<input type="hidden" name="theme" value="' . $_data->get('NAME_THEME') . '">
				<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
			</div>
		</div> <!-- admin-contents -->
		
		<script>
		<!--
		jQuery(document).ready(function() {
			createSortableMenu();
		});
		-->
		</script>
	</form>

		'; ?>