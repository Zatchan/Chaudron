<?php $_result='		<script>
		<!--
		var previous_path_pics = \'\';
		function display_pics(id, path, type)
		{
			document.getElementById(\'pics_max\').innerHTML = \'\';
			if( previous_path_pics != path )
			{
				document.getElementById(\'pics_max\').innerHTML = \'<img src="\' + path + \'" alt="\' + path + \'" /></a>\';
				previous_path_pics = path;
			}
		}
		function display_pics_popup(path, width, height)
		{
			width = parseInt(width);
			height = parseInt(height);
			if( height == 0 )
				height = screen.height - 150;
			if( width == 0 )
				width = screen.width - 200;
			window.open(path, \'\', \'width=\'+(width+17)+\', height=\'+(height+17)+\', location=no, status=no, toolbar=no, scrollbars=1, resizable=yes\');
		}
		function display_rename_file(id, previous_name, previous_cut_name)
		{
			if( document.getElementById(\'fi\' + id) )
			{	
				document.getElementById(\'fi_\' + id).style.display = \'none\';
				document.getElementById(\'fi\' + id).style.display = \'inline\';
				document.getElementById(\'fi\' + id).innerHTML = \'<input type="text" name="fiinput\' + id + \'" id="fiinput\' + id + \'" value="\' + previous_name.replace(/\\"/g, "&quot;") + \'" onblur="rename_file(\\\'\' + id + \'\\\', \\\'\' + previous_cut_name.replace(/\\\'/g, "\\\\\\\'").replace(/\\"/g, "&quot;") + \'\\\');">\';
				document.getElementById(\'fiinput\' + id).focus();
			}
		}	
		function rename_file(id_file, previous_cut_name)
		{
			var name = document.getElementById("fiinput" + id_file).value;
			var regex = /\\/|\\\\|\\||\\?|<|>/;
			
			if( regex.test(name) ) //interdiction des caractères spéciaux dans le nom.
			{
				alert("' . $_data->get('L_FILE_FORBIDDEN_CHARS') . '");
				document.getElementById(\'fi_\' + id_file).style.display = \'inline\';
				document.getElementById(\'fi\' + id_file).style.display = \'none\';
			}
			else
			{
				document.getElementById(\'img\' + id_file).innerHTML = \'<i class="fa fa-spinner fa-spin"></i>\';
				data = "id_file=" + id_file + "&name=" + name.replace(/&/g, "%26") + "&previous_name=" + previous_cut_name.replace(/&/g, "%26");
				var xhr_object = xmlhttprequest_init(\'xmlhttprequest.php?rename_pics=1&token=' . $_data->get('TOKEN') . '\');
				xhr_object.onreadystatechange = function() 
				{
					if( xhr_object.readyState == 4 && xhr_object.status == 200 && xhr_object.responseText != \'0\' )
					{
						document.getElementById(\'fi\' + id_file).style.display = \'none\';
						document.getElementById(\'fi_\' + id_file).style.display = \'inline\';
						document.getElementById(\'fi_\' + id_file).innerHTML = xhr_object.responseText;
						
						html_protected_name = name.replace(/\\\'/g, "\\\\\\\'").replace(/\\"/g, "&quot;");
						html_protected_name2 = xhr_object.responseText.replace(/\\\'/g, "\\\\\\\'").replace(/\\"/g, "&quot;");
						
						document.getElementById(\'fihref\' + id_file).innerHTML = \'<a href="javascript:display_rename_file(\\\'\' + id_file + \'\\\', \\\'\' + html_protected_name + \'\\\', \\\'\' + html_protected_name2 + \'\\\');" title="' . $_data->get('L_EDIT') . '" class="fa fa-edit"></a>\';
						document.getElementById(\'img\' + id_file).innerHTML = \'\';
					}
					else if( xhr_object.readyState == 4 && xhr_object.responseText == \'0\' )
						document.getElementById(\'img\' + id_file).innerHTML = \'\';
				}
				xmlhttprequest_sender(xhr_object, data);
			}
		}
		function pics_aprob(id_file)
		{
			var regex = /\\/|\\\\|\\||\\?|<|>|\\"/;
			
			document.getElementById(\'img\' + id_file).innerHTML = \'<i class="fa fa-spinner fa-spin"></i>\';

			data = "id_file=" + id_file;
			var xhr_object = xmlhttprequest_init(\'xmlhttprequest.php?aprob_pics=1&token=' . $_data->get('TOKEN') . '\');
			xhr_object.onreadystatechange = function() 
			{
				if( xhr_object.readyState == 4 && xhr_object.status == 200 && xhr_object.responseText != \'-1\' )
				{
					var img_aprob, title_aprob;
					if( xhr_object.responseText == 0 )
					{
						img_aprob = \'fa-eye-slash\';
						title_aprob = \'' . $_data->get('L_UNAPROB') . '\';
					}
					else
					{
						img_aprob = \'fa-eye\';
						title_aprob = \'' . $_data->get('L_APROB') . '\';
					}
					
					document.getElementById(\'img\' + id_file).innerHTML = \'\';
					if( document.getElementById(\'img_aprob\' + id_file) )
					{
						if(document.getElementById(\'img_aprob\' + id_file).className == "fa fa-eye-slash"){
							document.getElementById(\'img_aprob\' + id_file).className = "fa fa-eye";
						} else {
							document.getElementById(\'img_aprob\' + id_file).className = "fa fa-eye-slash";
						}
						document.getElementById(\'img_aprob\' + id_file).title = \'\' + title_aprob;
						document.getElementById(\'img_aprob\' + id_file).alt = \'\' + title_aprob;
					}
				}
				else if( xhr_object.readyState == 4 && xhr_object.responseText == \'-1\' )
					document.getElementById(\'img\' + id_file).innerHTML = \'\';
			}
			xmlhttprequest_sender(xhr_object, data);
		}
		
		var delay = 2000; //Délai après lequel le bloc est automatiquement masqué, après le départ de la souris.
		var timeout;
		var displayed = false;
		var previous = \'\';
		var started = false;
		
		//Affiche le bloc.
		function pics_display_block(divID)
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
		function pics_hide_block(idfield, stop)
		{
			if( stop && timeout )
				clearTimeout(timeout);
			else if( started )
				timeout = setTimeout(\'pics_display_block()\', delay);
		}
		
		' . $_data->get('ARRAY_JS') . '
		var start_thumb = ' . $_data->get('START_THUMB') . ';
		//Miniatures défilantes.
		function display_thumbnails(direction)
		{
			if( direction == \'left\' )
			{
				if( start_thumb > 0 )
				{
					start_thumb--;
					if( start_thumb == 0 )
						document.getElementById(\'display_left\').innerHTML = \'\';
					else
						document.getElementById(\'display_left\').innerHTML = \'<a href="javascript:display_thumbnails(\\\'left\\\')"><i class="fa fa-arrow-left fa-2x"></i></a>\';
					document.getElementById(\'display_right\').innerHTML = \'<a href="javascript:display_thumbnails(\\\'right\\\')"><i class="fa fa-arrow-right fa-2x"></i></a>\';
				}
				else
					return;
			}
			else if( direction == \'right\' )
			{
				if( start_thumb <= ' . $_data->get('MAX_START') . ' )
				{
					start_thumb++;
					if( start_thumb == (' . $_data->get('MAX_START') . ' + 1) )
						document.getElementById(\'display_right\').innerHTML = \'\';
					else
						document.getElementById(\'display_right\').innerHTML = \'<a href="javascript:display_thumbnails(\\\'right\\\')"><i class="fa fa-arrow-right fa-2x"></i></a>\';
					document.getElementById(\'display_left\').innerHTML = \'<a href="javascript:display_thumbnails(\\\'left\\\')"><i class="fa fa-arrow-left fa-2x"></i></a>\';
				}
				else
					return;
			}	
			
			var j = 0;
			for(var i = 0; i <= ' . $_data->get('NBR_PICS') . '; i++)
			{
				if( document.getElementById(\'thumb\' + i) ) 
				{
					var key_left = start_thumb + j;
					var key_right = start_thumb + j;
					if( direction == \'left\' && array_pics[key_left] )
					{
						document.getElementById(\'thumb\' + i).innerHTML = \'<a href="admin_gallery\' + array_pics[key_left][\'link\'] + \'"><img src="pics/thumbnails/\' + array_pics[key_left][\'path\'] + \'" alt="\' + array_pics[key_left][\'path\'] + \'" /></a>\';
						j++;
					}
					else if( direction == \'right\' && array_pics[key_right] ) 
					{
						document.getElementById(\'thumb\' + i).innerHTML = \'<a href="admin_gallery\' + array_pics[key_right][\'link\'] + \'"><img src="pics/thumbnails/\' + array_pics[key_right][\'path\'] + \'" alt="\' + array_pics[key_right][\'path\'] + \'" /></a>\';
						j++;
					}
				}
			}
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
			';$_subtpl=$_data->get('message_helper');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
			
			';foreach($_data->get_block('pics') as $_tmp_pics){$_result.='
			<fieldset>
				<legend>
					' . $_data->get('GALLERY') . ' ';if ($_data->is_true($_data->get_from_list('C_EDIT', $_tmp_pics))){$_result.='<a href="' . $_data->get_from_list('U_EDIT_CATEGORY', $_tmp_pics) . '" title="' . LangLoader::get_message('edit', 'common') . '" class="fa fa-edit"></a>';}$_result.='
					';if ($_data->is_true($_data->get('C_PAGINATION'))){$_result.='
					<p class="center">
						';$_subtpl=$_data->get('PAGINATION');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
					</p>
					';}$_result.='
				</legend>
				<div class="fieldset-inset">
					
					';foreach($_data->get_block('cat') as $_tmp_cat){$_result.='
					<table id="table" class="table-cat">
						<thead>
							<tr>
								<th colspan="' . $_data->get('COLSPAN') . '">
									' . $_data->get('L_CATEGORIES') . '
								</th>
							</tr>
						</thead>
						';if ($_data->is_true($_data->get('C_PAGINATION'))){$_result.='
						<thead>
							<tr>
								<th colspan="' . $_data->get('COLSPAN') . '">
									';$_subtpl=$_data->get('PAGINATION');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
								</th>
							</tr>
						</thead>
						';}$_result.='
						<tbody>
						';foreach($_data->get_block_from_list('list', $_tmp_cat) as $_tmp_cat_list){$_result.='
						';if ($_data->is_true($_data->get_from_list('C_DISPLAY_TR_START', $_tmp_cat_list))){$_result.='<tr>';}$_result.='
							<td class="valign-bottom" style="width:' . $_data->get('COLUMN_WIDTH_CATS') . '%;">
								<a href="admin_gallery.php?cat=' . $_data->get_from_list('IDCAT', $_tmp_cat_list) . '">';if ($_data->is_true($_data->get_from_list('C_IMG', $_tmp_cat_list))){$_result.='<img itemprop="thumbnailUrl" src="' . $_data->get_from_list('IMG', $_tmp_cat_list) . '" alt="' . $_data->get_from_list('CAT', $_tmp_cat_list) . '" />';}$_result.='</a>
								
								<br />
								<a href="admin_gallery.php?cat=' . $_data->get_from_list('IDCAT', $_tmp_cat_list) . '">' . $_data->get_from_list('CAT', $_tmp_cat_list) . '</a>
								<br />
								<span class="smaller">' . $_data->get_from_list('L_NBR_PICS', $_tmp_cat_list) . '</span> 
							</td>
						';if ($_data->is_true($_data->get_from_list('C_DISPLAY_TR_END', $_tmp_cat_list))){$_result.='</tr>';}$_result.='
						';}$_result.='
						
						';foreach($_data->get_block_from_list('end_td', $_tmp_cat) as $_tmp_cat_end_td){$_result.='
							<td style="width:' . $_data->get_from_list('COLUMN_WIDTH_PICS', $_tmp_cat_end_td) . '%;padding:0">&nbsp;</td>
						';if ($_data->is_true($_data->get_from_list('C_DISPLAY_TR_END', $_tmp_cat_end_td))){$_result.='</tr>';}$_result.='
						';}$_result.='
						</tbody>
					</table>
					<div class="spacer"></div>
					';if ($_data->is_true($_data->get('C_SUBCATEGORIES_PAGINATION'))){$_result.='<span class="center">';$_subtpl=$_data->get('SUBCATEGORIES_PAGINATION');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='</span>';}$_result.='
					';}$_result.='
					
					';foreach($_data->get_block_from_list('pics_max', $_tmp_pics) as $_tmp_pics_pics_max){$_result.='
						<table id="table" class="table-pics">
							<thead>
								<tr>
									<th colspan="' . $_data->get_from_list('COLSPAN_PICTURE', $_tmp_pics_pics_max) . '">
										' . $_data->get_from_list('PICTURE_NAME', $_tmp_pics_pics_max) . '
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td id="pics_max" colspan="' . $_data->get_from_list('COLSPAN_PICTURE', $_tmp_pics_pics_max) . '">
										<img src="show_pics.php?id=' . $_data->get_from_list('ID', $_tmp_pics) . '&amp;cat=' . $_data->get_from_list('IDCAT', $_tmp_pics) . '" alt="' . $_data->get_from_list('CATNAME', $_tmp_pics) . '" />
									</td>
								</tr>
								<tr>
									';if ($_data->is_true($_data->get_from_list('C_PREVIOUS', $_tmp_pics_pics_max))){$_result.='
									<td class="left no-separator">
										<a href="admin_gallery.php?cat=' . $_data->get_from_list('ID_CATEGORY', $_tmp_pics_pics_max) . '&amp;id=' . $_data->get_from_list('ID_PREVIOUS', $_tmp_pics_pics_max) . '#pics_max" class="fa fa-arrow-left fa-2x"></a> <a href="admin_gallery.php?cat=' . $_data->get_from_list('ID_CATEGORY', $_tmp_pics_pics_max) . '&amp;id=' . $_data->get_from_list('ID_PREVIOUS', $_tmp_pics_pics_max) . '#pics_max">' . $_data->get('L_PREVIOUS') . '</a>
									</td>
									';}$_result.='
									';if ($_data->is_true($_data->get_from_list('C_NEXT', $_tmp_pics_pics_max))){$_result.='
									<td class="right no-separator">
										<a href="admin_gallery.php?cat=' . $_data->get_from_list('ID_CATEGORY', $_tmp_pics_pics_max) . '&amp;id=' . $_data->get_from_list('ID_NEXT', $_tmp_pics_pics_max) . '#pics_max">' . $_data->get('L_NEXT') . '</a> <a href="admin_gallery.php?cat=' . $_data->get_from_list('ID_CATEGORY', $_tmp_pics_pics_max) . '&amp;id=' . $_data->get_from_list('ID_NEXT', $_tmp_pics_pics_max) . '#pics_max" class="fa fa-arrow-right fa-2x"></a>
									</td>
									';}$_result.='
								</tr>
							</tbody>
						</table>
						
						<div class="spacer"></div>
						
						<table id="table2">
							<thead>
								<tr>
									<th colspan="2">
										' . $_data->get('L_INFORMATIONS') . '
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="smaller">
										<strong>' . $_data->get('L_NAME') . ':</strong> <span id="fi_' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . '">' . $_data->get_from_list('PICTURE_NAME', $_tmp_pics_pics_max) . '</span> <span id="fi' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . '"></span>
									</td>
									<td class="smaller">
										<strong>' . $_data->get('L_POSTOR') . ':</strong> ';if ($_data->is_true($_data->get_from_list('C_POSTOR_EXIST', $_tmp_pics_pics_max))){$_result.='<a class="small ' . $_data->get_from_list('POSTOR_LEVEL_CLASS', $_tmp_pics_pics_max) . '"';if ($_data->is_true($_data->get_from_list('C_POSTOR_GROUP_COLOR', $_tmp_pics_pics_max))){$_result.=' style="color:' . $_data->get_from_list('POSTOR_GROUP_COLOR', $_tmp_pics_pics_max) . '"';}$_result.=' href="' . $_data->get_from_list('U_POSTOR_PROFILE', $_tmp_pics_pics_max) . '">' . $_data->get_from_list('POSTOR', $_tmp_pics_pics_max) . '</a>';}else{$_result.='' . LangLoader::get_message('guest', 'main') . '';}$_result.='
									</td>
								</tr>
								<tr>
									<td class="smaller">
										<strong>' . $_data->get('L_VIEWS') . ':</strong> ' . $_data->get_from_list('VIEWS', $_tmp_pics_pics_max) . '
									</td>
									<td class="smaller">
										<strong>' . $_data->get('L_ADD_ON') . ':</strong> ' . $_data->get_from_list('DATE', $_tmp_pics_pics_max) . '
									</td>
								</tr>
								<tr>
									<td class="smaller">
										<strong>' . $_data->get('L_DIMENSION') . ':</strong> ' . $_data->get_from_list('DIMENSION', $_tmp_pics_pics_max) . '
									</td>
									<td class="smaller">
										<strong>' . $_data->get('L_SIZE') . ':</strong> ' . $_data->get_from_list('SIZE', $_tmp_pics_pics_max) . ' Ko
									</td>
								</tr>
								<tr>
									<td colspan="2" class="small">
										&nbsp;&nbsp;&nbsp;<span id="fihref' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . '"><a href="javascript:display_rename_file(\'' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . '\', \'' . $_data->get_from_list('RENAME', $_tmp_pics_pics_max) . '\', \'' . $_data->get_from_list('RENAME_CUT', $_tmp_pics_pics_max) . '\');" title="' . $_data->get('L_EDIT') . '" class="fa fa-edit"></a>
										
										<a href="gallery.php?del=' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . '&amp;cat=' . $_data->get_from_list('ID_CATEGORY', $_tmp_pics_pics_max) . '&amp;token=' . $_data->get_from_list('TOKEN', $_tmp_pics_pics_max) . '" title="' . $_data->get('L_DELETE') . '" class="fa fa-delete" data-confirmation="delete-element"></a> 
							
										<div id="move' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . '" class="move-pics-container">
											<div class="bbcode-block move-pics-block" onmouseover="pics_hide_block(' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . ', 1);" onmouseout="pics_hide_block(' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . ', 0);">
												<div>' . $_data->get('L_MOVETO') . ' :</div>
												<select class="valign-middle" name="' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . 'cat" onchange="document.location = \'gallery.php?id=' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . '&amp;token=' . $_data->get_from_list('TOKEN', $_tmp_pics_pics_max) . '&amp;move=\' + this.options[this.selectedIndex].value">
													' . $_data->get_from_list('CAT', $_tmp_pics_pics_max) . '
												</select>
												<br /><br />
											</div>
										</div>
										<a href="javascript:pics_display_block(' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . ');" onmouseover="pics_hide_block(' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . ', 1);" onmouseout="pics_hide_block(' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . ', 0);" class="fa fa-move" title="' . $_data->get('L_MOVETO') . '"></a>
										
										
										<a id="img_aprob' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . '" href="javascript:pics_aprob(' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . ');" ';if ($_data->is_true($_data->get_from_list('C_APPROVED', $_tmp_pics_pics_max))){$_result.='title="' . $_data->get('L_APROB') . '" class="fa fa-eye"';}else{$_result.='title="' . $_data->get('L_UNAPROB') . '" class="fa fa-eye-slash"';}$_result.='></a>
										&nbsp;<span id="img' . $_data->get_from_list('ID', $_tmp_pics_pics_max) . '"></span>
									</td>
								</tr>
							</tbody>
						</table>
						
						<div class="spacer"></div>
						
						<table id="table3">
							<thead>
								<tr>
									<th colspan="' . $_data->get_from_list('COLSPAN', $_tmp_pics_pics_max) . '">
										' . $_data->get('L_THUMBNAILS') . '
									</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="width:50px;">
										<span id="display_left">
										';if ($_data->is_true($_data->get_from_list('C_LEFT_THUMBNAILS', $_tmp_pics_pics_max))){$_result.='
										<a href="javascript:display_thumbnails(\'left\')" class="fa fa-arrow-left fa-2x"></a>
										';}$_result.='
										</span>
									</td>
									
									';foreach($_data->get_block_from_list('list_preview_pics', $_tmp_pics_pics_max) as $_tmp_pics_pics_max_list_preview_pics){$_result.='
										<td class="center" style="height:' . $_data->get_from_list('HEIGHT', $_tmp_pics_pics_max_list_preview_pics) . 'px"><span id="thumb' . $_data->get_from_list('ID', $_tmp_pics_pics_max_list_preview_pics) . '"><a href="' . $_data->get_from_list('URL', $_tmp_pics_pics_max_list_preview_pics) . '" title="' . $_data->get_from_list('NAME', $_tmp_pics_pics_max_list_preview_pics) . '"><img src="pics/thumbnails/' . $_data->get_from_list('PATH', $_tmp_pics_pics_max_list_preview_pics) . '" alt="' . $_data->get_from_list('NAME', $_tmp_pics_pics_max_list_preview_pics) . '" /></a></span></td>
									';}$_result.='
									
									
									<td style="width:50px;">
										<span id="display_right">
										';if ($_data->is_true($_data->get_from_list('C_RIGHT_THUMBNAILS', $_tmp_pics_pics_max))){$_result.='
										<a href="javascript:display_thumbnails(\'right\')" class="fa fa-arrow-right fa-2x"></a>
										';}$_result.='
										</span>
									</td>
								</tr>
							</tbody>
						</table>
						';}$_result.='
						
						';if (!$_data->is_true($_data->get_from_list('C_PICS_MAX', $_tmp_pics))){$_result.='
						<table id="table" class="table-pics">
							<thead>
								<tr>
									<th colspan="' . $_data->get('COLSPAN') . '">
										' . $_data->get('GALLERY') . ' ';if ($_data->is_true($_data->get_from_list('C_EDIT', $_tmp_pics))){$_result.='<a href="' . $_data->get_from_list('U_EDIT_CATEGORY', $_tmp_pics) . '" title="' . LangLoader::get_message('edit', 'common') . '" class="fa fa-edit"></a>';}$_result.='
									</th>
								</tr>
							</thead>
							<tbody>
								';foreach($_data->get_block_from_list('list', $_tmp_pics) as $_tmp_pics_list){$_result.='
								';if ($_data->is_true($_data->get_from_list('C_DISPLAY_TR_START', $_tmp_pics_list))){$_result.='<tr>';}$_result.='
									<td class="valign-bottom" style="width:' . $_data->get('COLUMN_WIDTH_PICS') . '%;">
										<div id="pics' . $_data->get_from_list('ID', $_tmp_pics_list) . '" class="pics-list-element" style="height:' . $_data->get('HEIGHT_MAX') . 'px;">
											<a class="small" href="' . $_data->get_from_list('U_DISPLAY', $_tmp_pics_list) . '" title="' . $_data->get_from_list('TITLE', $_tmp_pics_list) . '" data-lightbox="2"><img src="pics/thumbnails/' . $_data->get_from_list('PATH', $_tmp_pics_list) . '" alt="' . $_data->get_from_list('ALT_NAME', $_tmp_pics_list) . '" /></a></div>
										<div class="smaller">
											<a class="com" href="' . $_data->get_from_list('U_DISPLAY', $_tmp_pics_list) . '" title="' . $_data->get_from_list('TITLE', $_tmp_pics_list) . '"><span id="fi_' . $_data->get_from_list('ID', $_tmp_pics_list) . '">' . $_data->get_from_list('NAME', $_tmp_pics_list) . '</span></a> <span id="fi' . $_data->get_from_list('ID', $_tmp_pics_list) . '"></span>
											<br />
											' . $_data->get('L_BY') . ' ';if ($_data->is_true($_data->get_from_list('C_POSTOR_EXIST', $_tmp_pics_list))){$_result.='<a class="small ' . $_data->get_from_list('POSTOR_LEVEL_CLASS', $_tmp_pics_list) . '"';if ($_data->is_true($_data->get_from_list('C_POSTOR_GROUP_COLOR', $_tmp_pics_list))){$_result.=' style="color:' . $_data->get_from_list('POSTOR_GROUP_COLOR', $_tmp_pics_list) . '"';}$_result.=' href="' . $_data->get_from_list('U_POSTOR_PROFILE', $_tmp_pics_list) . '">' . $_data->get_from_list('POSTOR', $_tmp_pics_list) . '</a>';}else{$_result.='' . LangLoader::get_message('guest', 'main') . '';}$_result.='
										</div>
											
										<div class="actions-container">
											<span id="fihref' . $_data->get_from_list('ID', $_tmp_pics_list) . '"><a href="javascript:display_rename_file(\'' . $_data->get_from_list('ID', $_tmp_pics_list) . '\', \'' . $_data->get_from_list('PROTECTED_TITLE', $_tmp_pics_list) . '\', \'' . $_data->get_from_list('PROTECTED_NAME', $_tmp_pics_list) . '\');" title="' . LangLoader::get_message('edit', 'common') . '" class="fa fa-edit"></a></span>
											
											<a href="admin_gallery.php?del=' . $_data->get_from_list('ID', $_tmp_pics_list) . '&amp;token=' . $_data->get('TOKEN') . '&amp;cat=' . $_data->get('CAT_ID') . '" title="' . $_data->get('L_DELETE') . '" class="fa fa-delete" data-confirmation="delete-element"></a>
								
											<div id="move' . $_data->get_from_list('ID', $_tmp_pics_list) . '" class="move-pics-container">
												<div class="bbcode-block move-pics-block" onmouseover="pics_hide_block(' . $_data->get_from_list('ID', $_tmp_pics_list) . ', 1);" onmouseout="pics_hide_block(' . $_data->get_from_list('ID', $_tmp_pics_list) . ', 0);">
													<div>' . $_data->get('L_MOVETO') . ' :</div>
													<select class="valign-middle" name="' . $_data->get_from_list('ID', $_tmp_pics_list) . 'cat" onchange="document.location = \'admin_gallery.php?id=' . $_data->get_from_list('ID', $_tmp_pics_list) . '&amp;token=' . $_data->get('TOKEN') . '&amp;move=\' + this.options[this.selectedIndex].value">
														' . $_data->get_from_list('CAT', $_tmp_pics_list) . '
													</select>
													<br /><br />
												</div>
											</div>
											<a href="javascript:pics_display_block(' . $_data->get_from_list('ID', $_tmp_pics_list) . ');" onmouseover="pics_hide_block(' . $_data->get_from_list('ID', $_tmp_pics_list) . ', 1);" onmouseout="pics_hide_block(' . $_data->get_from_list('ID', $_tmp_pics_list) . ', 0);" class="fa fa-move" title="' . $_data->get('L_MOVETO') . '"></a>
											
											<a id="img_aprob' . $_data->get_from_list('ID', $_tmp_pics_list) . '" href="javascript:pics_aprob(' . $_data->get_from_list('ID', $_tmp_pics_list) . ');" ';if ($_data->is_true($_data->get_from_list('C_APPROVED', $_tmp_pics_list))){$_result.='title="' . $_data->get('L_APROB') . '" class="fa fa-eye"';}else{$_result.='title="' . $_data->get('L_UNAPROB') . '" class="fa fa-eye-slash"';}$_result.='></a>
											&nbsp;<span id="img' . $_data->get_from_list('ID', $_tmp_pics_list) . '"></span>
										</div>
									</td>
								';if ($_data->is_true($_data->get_from_list('C_DISPLAY_TR_END', $_tmp_pics_list))){$_result.='</tr>';}$_result.='
								';}$_result.='
								
								';foreach($_data->get_block_from_list('end_td_pics', $_tmp_pics) as $_tmp_pics_end_td_pics){$_result.='
									<td style="width:' . $_data->get_from_list('COLUMN_WIDTH_PICS', $_tmp_pics_end_td_pics) . '%;padding:0">&nbsp;</td>
								';if ($_data->is_true($_data->get_from_list('C_DISPLAY_TR_END', $_tmp_pics_end_td_pics))){$_result.='</tr>';}$_result.='
								';}$_result.='
								
							</tbody>
						</table>
						';}$_result.='
						
						';if ($_data->is_true($_data->get('C_DISPLAY_NO_PICTURES_MESSAGE'))){$_result.='
							';if (!$_data->is_true($_data->get('C_PICTURES'))){$_result.='
							<div class="notice">
								' . $_data->get('L_TOTAL_IMG') . '
							</div>
							';}else{$_result.='
							<p class="nbr-total-pics smaller">
								' . $_data->get('L_TOTAL_IMG') . '
							</p>
							';}$_result.='
						';}$_result.='
					</div>
					';if ($_data->is_true($_data->get('C_PAGINATION'))){$_result.='
					<p class="center">
						';$_subtpl=$_data->get('PAGINATION');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
					</p>
					';}$_result.='
				</div>
			</fielset>
			';}$_result.='
		</div>
		
'; ?>