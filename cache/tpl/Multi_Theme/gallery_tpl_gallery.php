<?php $_result='		<script>
		<!--
		var pics_displayed = 0;
		function display_pics(id, path)
		{
			if( pics_displayed != id )
			{
				document.getElementById(\'pics_max\').innerHTML = \'<img src="\' + path + \'" alt="\' + path + \'" />\';
				pics_displayed = id;
			}
			else
			{
				document.getElementById(\'pics_max\').innerHTML = \'\';
				pics_displayed = 0;
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
				var xhr_object = xmlhttprequest_init(\'' . $_data->get('PATH_TO_ROOT') . '/gallery/xmlhttprequest.php?token=' . $_data->get('TOKEN') . '&rename_pics=1\');
				xhr_object.onreadystatechange = function()
				{
					if( xhr_object.readyState == 4 && xhr_object.status == 200 && xhr_object.responseText != \'0\' )
					{
						document.getElementById(\'fi\' + id_file).style.display = \'none\';
						document.getElementById(\'fi_\' + id_file).style.display = \'inline\';
						document.getElementById(\'fi_\' + id_file).innerHTML = xhr_object.responseText;

						html_protected_name = name.replace(/\\\'/g, "\\\\\\\'").replace(/\\"/g, "&quot;");
						html_protected_name2 = xhr_object.responseText.replace(/\\\'/g, "\\\\\\\'").replace(/\\"/g, "&quot;");

						document.getElementById(\'fihref\' + id_file).innerHTML = \'<a href="javascript:display_rename_file(\\\'\' + id_file + \'\\\', \\\'\' + html_protected_name + \'\\\', \\\'\' + html_protected_name2 + \'\\\');" class="basic-button" title="' . $_data->get('L_EDIT') . '"><i class="fa fa-edit"></i></a>\';
						document.getElementById(\'img\' + id_file).innerHTML = \'\';
					}
					else if( xhr_object.readyState == 4 && xhr_object.responseText == \'0\' )
						document.getElementById(\'img\' + id_file).innerHTML = \'\';
				}
				xmlhttprequest_sender(xhr_object, data);
			}
		}
		function pics_aprob(id_file, aprob)
		{
			document.getElementById(\'img\' + id_file).innerHTML = \'<i class="fa fa-spinner fa-spin"></i>\';

			data = \'id_file=\' + id_file;
			var xhr_object = xmlhttprequest_init(\'' . $_data->get('PATH_TO_ROOT') . '/gallery/xmlhttprequest.php?token=' . $_data->get('TOKEN') . '&aprob_pics=1\');
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

		var delay = 2000; //Délai après lequel le bloc est automatiquement masqué après le départ de la souris.
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
						document.getElementById(\'thumb\' + i).innerHTML = \'<a href="\' + array_pics[key_left][\'link\'] + \'"><img src="' . $_data->get('PATH_TO_ROOT') . '/gallery/pics/thumbnails/\' + array_pics[key_left][\'path\'] + \'" alt="\' + array_pics[key_left][\'path\'] + \'" /></a>\';
						j++;
					}
					else if( direction == \'right\' && array_pics[key_right] )
					{
						document.getElementById(\'thumb\' + i).innerHTML = \'<a href="\' + array_pics[key_right][\'link\'] + \'"><img src="' . $_data->get('PATH_TO_ROOT') . '/gallery/pics/thumbnails/\' + array_pics[key_right][\'path\'] + \'" alt="\' + array_pics[key_right][\'path\'] + \'" /></a>\';
						j++;
					}
				}
			}
		}
		//incrément le nombre de vues d\'une image.
		var already_view = false;
		var incr_pics_displayed = 0;
		function increment_view(idpics)
		{
			if (\'' . $_data->get('DISPLAY_MODE') . '\' == \'resize\' && incr_pics_displayed == idpics)
				incr_pics_displayed = 0;
			else
			{
				if (document.getElementById(\'gv\' + idpics))
				{
					if (already_view && (\'' . $_data->get('DISPLAY_MODE') . '\' == \'full_screen\' || \'' . $_data->get('DISPLAY_MODE') . '\' == \'resize\'))
					{
						data = \'\';
						var xhr_object = xmlhttprequest_init(\'' . $_data->get('PATH_TO_ROOT') . '/gallery/xmlhttprequest.php?token=' . $_data->get('TOKEN') . '&id=\' + idpics + \'&cat=' . $_data->get('CAT_ID') . '&increment_view=1\');
						xmlhttprequest_sender(xhr_object, data);
					}

					var views = 0;
					views = document.getElementById(\'gv\' + idpics).innerHTML;
					views++;
					document.getElementById(\'gv\' + idpics).innerHTML = views;
					document.getElementById(\'gvl\' + idpics).innerHTML = (views > 1) ? "' . $_data->get('L_VIEWS') . '" : "' . $_data->get('L_VIEW') . '";

					already_view = true;
					incr_pics_displayed = idpics;
				}
			}
		}
		-->
		</script>

		';$_subtpl=$_data->get('message_helper');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
		<div class="spacer"></div>

		<section id="module-gallery">
			<header>
				<nav id="cssmenu-galleryfilter" class="cssmenu cssmenu-right cssmenu-actionslinks cssmenu-tools">
					<ul class="level-0 hidden">
						<li><a class="cssmenu-title"><i class="fa fa-eye"></i> ' . $_data->get('L_DISPLAY') . '</a>
							<ul class="level-1">
								<li><a href="' . $_data->get('U_BEST_VIEWS') . '" class="cssmenu-title"><i class="fa fa-eye"></i> ' . $_data->get('L_BEST_VIEWS') . '</a></li>
								';if ($_data->is_true($_data->get('C_NOTATION_ENABLED'))){$_result.='<li><a href="' . $_data->get('U_BEST_NOTES') . '" class="cssmenu-title"><i class="fa fa-star-half-empty"></i> ' . $_data->get('L_BEST_NOTES') . '</a></li>';}$_result.='
							</ul>
						</li>
						<li><a class="cssmenu-title"><i class="fa fa-sort"></i> ' . $_data->get('L_ORDER_BY') . '</a>
							<ul class="level-1">
								<li><a href="' . $_data->get('U_ORDER_BY_NAME') . '" class="cssmenu-title"><i class="fa fa-tag"></i> ' . $_data->get('L_NAME') . '</a></li>
								<li><a href="' . $_data->get('U_ORDER_BY_DATE') . '" class="cssmenu-title"><i class="fa fa-clock-o"></i> ' . $_data->get('L_DATE') . '</a></li>
								<li><a href="' . $_data->get('U_ORDER_BY_VIEWS') . '" class="cssmenu-title"><i class="fa fa-eye"></i> ' . $_data->get('L_VIEWS') . '</a></li>
								';if ($_data->is_true($_data->get('C_NOTATION_ENABLED'))){$_result.='
								<li><a href="' . $_data->get('U_ORDER_BY_NOTES') . '" class="cssmenu-title"><i class="fa fa-star-half-empty"></i> ' . $_data->get('L_NOTES') . '</a></li>
								';}$_result.='
								';if ($_data->is_true($_data->get('C_COMMENTS_ENABLED'))){$_result.='
								<li><a href="' . $_data->get('U_ORDER_BY_COM') . '" class="cssmenu-title"><i class="fa fa-comments-o"></i> ' . $_data->get('L_COM') . '</a></li>';}$_result.='
							</ul>
						</li>
						<li><a class="cssmenu-title"><i class="fa fa-sort-alpha-asc"></i> ' . $_data->get('L_DIRECTION') . '</a>
							<ul class="level-1">
								<li><a href="' . $_data->get('U_ASC') . '" class="cssmenu-title"><i class="fa fa-sort-amount-asc"></i> ' . $_data->get('L_ASC') . '</a></li>
								<li><a href="' . $_data->get('U_DESC') . '" class="cssmenu-title"><i class="fa fa-sort-amount-desc"></i> ' . $_data->get('L_DESC') . '</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<script>
					jQuery("#cssmenu-galleryfilter").menumaker({
						title: "' . LangLoader::get_message('sort_options', 'common') . '",
						format: "multitoggle",
						breakpoint: 768
					});
					jQuery(document).ready(function() {
						jQuery("#cssmenu-galleryfilter ul").removeClass(\'hidden\');
					});
				</script>
				<h1>
					<a href="' . $_functions->relative_url(SyndicationUrlBuilder::rss('gallery', $_data->get('CAT_ID'))) . '" class="fa fa-syndication" title="' . LangLoader::get_message('syndication', 'common') . '"></a>
					' . $_data->get('GALLERY') . ' ';if ($_data->is_true($_data->get('IS_ADMIN'))){$_result.='<a href="' . $_data->get('U_EDIT_CATEGORY') . '" title="' . LangLoader::get_message('edit', 'common') . '"><i class="fa fa-edit smaller"></i></a>';}$_result.='
				</h1>

				';if ($_data->is_true($_data->get('C_CATEGORY_DESCRIPTION'))){$_result.='
					<div class="cat-description">
						' . $_data->get('CATEGORY_DESCRIPTION') . '
					</div>
				';}$_result.='
			</header>

			';if ($_data->is_true($_data->get('C_SUB_CATEGORIES'))){$_result.='
			<div class="subcat-container elements-container';if ($_data->is_true($_data->get('C_SEVERAL_CATS_COLUMNS'))){$_result.=' columns-' . $_data->get('COLUMNS_NUMBER') . '';}$_result.='">
				';foreach($_data->get_block('sub_categories_list') as $_tmp_sub_categories_list){$_result.='
				<div class="subcat-element block">
					<div class="subcat-content">
						';if ($_data->is_true($_data->get_from_list('C_CATEGORY_IMAGE', $_tmp_sub_categories_list))){$_result.='<a itemprop="about" href="' . $_data->get_from_list('U_CATEGORY', $_tmp_sub_categories_list) . '"><img itemprop="thumbnailUrl" src="' . $_data->get_from_list('CATEGORY_IMAGE', $_tmp_sub_categories_list) . '" alt="' . $_data->get_from_list('CATEGORY_NAME', $_tmp_sub_categories_list) . '" /></a>';}$_result.='
						<br />
						<a itemprop="about" href="' . $_data->get_from_list('U_CATEGORY', $_tmp_sub_categories_list) . '">' . $_data->get_from_list('CATEGORY_NAME', $_tmp_sub_categories_list) . '</a>
						<br />
						<span class="small">' . $_data->get_from_list('PICTURES_NUMBER', $_tmp_sub_categories_list) . '</span>
					</div>
				</div>
				';}$_result.='
				<div class="spacer"></div>
			</div>
			';if ($_data->is_true($_data->get('C_SUBCATEGORIES_PAGINATION'))){$_result.='<span class="center">';$_subtpl=$_data->get('SUBCATEGORIES_PAGINATION');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='</span>';}$_result.='
			';}else{$_result.='
				<div class="spacer"></div>
			';}$_result.='

			<div class="content">
				';if ($_data->is_true($_data->get('C_GALLERY_PICS'))){$_result.='
				<article id="article-gallery-' . $_data->get('ID') . '" class="article-gallery article-several block">
					<header>
						<h2>' . LangLoader::get_message('image', 'main') . '</h2>
					</header>
					<div class="content">
						<p class="center" id="pics_max"></p>

						';if ($_data->is_true($_data->get('C_GALLERY_PICS_MAX'))){$_result.='
							<p class="pics-max"><a href="' . $_data->get('U_IMG_MAX') . '" data-lightbox="formatter"><img src="' . $_data->get('U_IMG_MAX') . '" title="' . $_data->get('NAME') . '" alt="" /></a></p>
							<div class="options">
								<h6>' . $_data->get('L_INFORMATIONS') . '</h6>
								';if ($_data->is_true($_data->get('C_TITLE_ENABLED'))){$_result.='
									<span class="text-strong">' . $_data->get('L_NAME') . ' : </span><span><span id="fi_' . $_data->get('ID') . '">' . $_data->get('NAME') . '</span> <span id="fi' . $_data->get('ID') . '"></span></span><br/>
								';}$_result.='
								';if ($_data->is_true($_data->get('C_AUTHOR_DISPLAYED'))){$_result.='
									<span class="text-strong">' . $_data->get('L_POSTOR') . ' : </span><span>';if ($_data->is_true($_data->get('C_POSTOR_EXIST'))){$_result.='<a class="small ' . $_data->get('POSTOR_LEVEL_CLASS') . '"';if ($_data->is_true($_data->get('C_POSTOR_GROUP_COLOR'))){$_result.=' style="color:' . $_data->get('POSTOR_GROUP_COLOR') . '"';}$_result.=' href="' . $_data->get('U_POSTOR_PROFILE') . '">' . $_data->get('POSTOR') . '</a>';}else{$_result.='' . LangLoader::get_message('guest', 'main') . '';}$_result.='</span><br/>
								';}$_result.='
								';if ($_data->is_true($_data->get('C_VIEWS_COUNTER_ENABLED'))){$_result.='
									<span class="text-strong">' . $_data->get('L_VIEWS') . ' : </span><span>' . $_data->get('VIEWS') . '</span><br/>
								';}$_result.='
								<span class="text-strong">' . $_data->get('L_ADD_ON') . ' : </span><span>' . $_data->get('DATE') . '</span><br/>
								<span class="text-strong">' . $_data->get('L_DIMENSION') . ' : </span><span>' . $_data->get('DIMENSION') . '</span><br/>
								<span class="text-strong">' . $_data->get('L_SIZE') . ' : </span><span>' . $_data->get('SIZE') . ' ' . $_data->get('L_KB') . '</span><br/>
								';if ($_data->is_true($_data->get('C_COMMENTS_ENABLED'))){$_result.='
									<a href="' . $_data->get('U_COMMENTS') . '">' . $_data->get('L_COMMENTS') . '</a><br />
								';}$_result.='
								<div class="center">
									';if ($_data->is_true($_data->get('C_NOTATION_ENABLED'))){$_result.='
										<div class="text-strong">' . $_data->get('KERNEL_NOTATION') . '</div><br/>
									';}$_result.='
									';if ($_data->is_true($_data->get('C_GALLERY_PICS_MODO'))){$_result.='
									<span id="fihref' . $_data->get('ID') . '"><a href="javascript:display_rename_file(\'' . $_data->get('ID') . '\', \'' . $_data->get('RENAME') . '\', \'' . $_data->get('RENAME_CUT') . '\');" class="basic-button" title="' . $_data->get('L_EDIT') . '"><i class="fa fa-edit"></i></a></span>

									<div id="move' . $_data->get('ID') . '" class="move-pics-container">
										<div class="bbcode-block move-pics-block" onmouseover="pics_hide_block(' . $_data->get('ID') . ', 1);" onmouseout="pics_hide_block(' . $_data->get('ID') . ', 0);">
											<div>' . $_data->get('L_MOVETO') . ' :</div>
											<select class="valign-middle" name="' . $_data->get('ID') . 'cat" onchange="document.location = \'' . $_data->get('U_MOVE') . '">
												' . $_data->get('CAT') . '
											</select>
										</div>
									</div>
									<a href="javascript:pics_display_block(' . $_data->get('ID') . ');" onmouseover="pics_hide_block(' . $_data->get('ID') . ', 1);" onmouseout="pics_hide_block(' . $_data->get('ID') . ', 0);" class="basic-button" title="' . $_data->get('L_MOVETO') . '"><i class="fa fa-move"></i></a>

									<a href="javascript:pics_aprob(' . $_data->get('ID') . ');" class="basic-button" title="' . $_data->get('L_APROB_IMG') . '"><i id="img_aprob' . $_data->get('ID') . '" class="' . $_data->get('IMG_APROB') . '"></i></a>
									<span id="img' . $_data->get('ID') . '"></span>
									<a href="' . $_data->get('U_DEL') . '" title="' . $_data->get('L_DELETE') . '" class="basic-button alt" data-confirmation="delete-element"><i class="fa fa-delete"></i></a>
									';}$_result.='
								</div>
							</div>
							<div class="link-to-other-pics-container">
								<span class="float-left">&nbsp;&nbsp;&nbsp;<a href="' . $_data->get('U_PREVIOUS') . '#pics_max" title =""><i class="fa fa-arrow-left fa-2x"></i> ' . LangLoader::get_message('previous', 'main') . '</a></span>
								<span class="float-right"><a href="' . $_data->get('U_NEXT') . '#pics_max" title="">' . LangLoader::get_message('next', 'main') . ' <i class="fa fa-arrow-right fa-2x"></i></a>&nbsp;&nbsp;&nbsp;</span>
							</div>
							<br /><br />
							<table class="pics-max-thumbnails">
								<thead>
									<tr>
										<th colspan="' . $_data->get('COLSPAN') . '">
											' . $_data->get('L_THUMBNAILS') . '
										</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<span id="display_left">';if ($_data->is_true($_data->get('C_LEFT_THUMBNAILS'))){$_result.='<a href="javascript:display_thumbnails(\'left\')"><i class="fa fa-arrow-left fa-2x"></i></a>';}$_result.='</span>
										</td>

										';foreach($_data->get_block('list_preview_pics') as $_tmp_list_preview_pics){$_result.='
											<td class="center" style="height:' . $_data->get_from_list('HEIGHT', $_tmp_list_preview_pics) . 'px"><span id="thumb' . $_data->get_from_list('ID', $_tmp_list_preview_pics) . '"><a href="' . $_data->get_from_list('URL', $_tmp_list_preview_pics) . '" title="' . $_data->get_from_list('NAME', $_tmp_list_preview_pics) . '"><img src="pics/thumbnails/' . $_data->get_from_list('PATH', $_tmp_list_preview_pics) . '" alt="' . $_data->get_from_list('NAME', $_tmp_list_preview_pics) . '" /></a></span></td>
										';}$_result.='

										<td>
											<span id="display_right">';if ($_data->is_true($_data->get('C_RIGHT_THUMBNAILS'))){$_result.='<a href="javascript:display_thumbnails(\'right\')"><i class="fa fa-arrow-right fa-2x"></i></a>';}$_result.='</span>
										</td>
									</tr>
								</tbody>
							</table>
							' . $_data->get('COMMENTS') . '
						';}$_result.='

						<table class="table-pics">
							';if ($_data->is_true($_data->get('C_PAGINATION'))){$_result.='
							<tfoot>
								<tr>
									<td colspan="' . $_data->get('COLUMNS_NUMBER') . '">
									';$_subtpl=$_data->get('PAGINATION');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
									</td>
								</tr>
							</foot>
							';}$_result.='
							<tbody>
							';foreach($_data->get_block('pics_list') as $_tmp_pics_list){$_result.='
								';if ($_data->is_true($_data->get_from_list('C_OPEN_TR', $_tmp_pics_list))){$_result.='<tr>';}$_result.='
								<td class="valign-bottom';if ($_data->is_true($_data->get_from_list('C_NEW_CONTENT', $_tmp_pics_list))){$_result.=' new-content';}$_result.='" style="width:' . $_data->get('COLUMN_WIDTH_PICS') . '%;">
									<div id="pics' . $_data->get_from_list('ID', $_tmp_pics_list) . '" class="thumbnails-list-container">
										<a class="small" href="' . $_data->get_from_list('U_DISPLAY', $_tmp_pics_list) . '" title="' . $_data->get_from_list('NAME', $_tmp_pics_list) . '" onclick="' . $_data->get_from_list('ONCLICK', $_tmp_pics_list) . '" ';if (!$_data->is_true($_data->get_from_list('ONCLICK', $_tmp_pics_list))){$_result.=' data-lightbox="formatter"';}$_result.='><img src="' . $_data->get_from_list('U_PICTURE', $_tmp_pics_list) . '" alt="" class="gallery-img" /></a>
									</div>

									<div class="spacer"></div>

									<div class="smaller">
										';if ($_data->is_true($_data->get('C_PICTURE_NAME_DISPLAYED'))){$_result.='<a class="small" href="' . $_data->get_from_list('U_PICTURE_LINK', $_tmp_pics_list) . '"><span id="fi_' . $_data->get_from_list('ID', $_tmp_pics_list) . '">' . $_data->get_from_list('NAME', $_tmp_pics_list) . '</span></a>';}else{$_result.='<span id="fi_' . $_data->get_from_list('ID', $_tmp_pics_list) . '"></span>';}$_result.=' <span id="fi' . $_data->get_from_list('ID', $_tmp_pics_list) . '"></span>
										';if ($_data->is_true($_data->get('C_AUTHOR_DISPLAYED'))){$_result.='
										<br />
										' . $_data->get('L_BY') . ' ';if ($_data->is_true($_data->get_from_list('C_POSTOR_EXIST', $_tmp_pics_list))){$_result.='<a class="small ' . $_data->get_from_list('POSTOR_LEVEL_CLASS', $_tmp_pics_list) . '"';if ($_data->is_true($_data->get_from_list('C_POSTOR_GROUP_COLOR', $_tmp_pics_list))){$_result.=' style="color:' . $_data->get_from_list('POSTOR_GROUP_COLOR', $_tmp_pics_list) . '"';}$_result.=' href="' . $_data->get_from_list('U_POSTOR_PROFILE', $_tmp_pics_list) . '">' . $_data->get_from_list('POSTOR', $_tmp_pics_list) . '</a>';}else{$_result.='' . LangLoader::get_message('guest', 'main') . '';}$_result.='
										';}$_result.='
										';if ($_data->is_true($_data->get('C_VIEWS_COUNTER_ENABLED'))){$_result.='
										<br />
										<span id="gv' . $_data->get_from_list('ID', $_tmp_pics_list) . '">' . $_data->get_from_list('VIEWS', $_tmp_pics_list) . '</span> <span id="gvl' . $_data->get_from_list('ID', $_tmp_pics_list) . '">' . $_data->get_from_list('L_VIEWS', $_tmp_pics_list) . '</span>
										';}$_result.='
										';if ($_data->is_true($_data->get('C_COMMENTS_ENABLED'))){$_result.='
										<br />
										<a href="' . $_data->get_from_list('U_COMMENTS', $_tmp_pics_list) . '">' . $_data->get_from_list('L_COMMENTS', $_tmp_pics_list) . '</a>
										';}$_result.='
										';if ($_data->is_true($_data->get('C_NOTATION_ENABLED'))){$_result.='
										<br />
										' . $_data->get_from_list('KERNEL_NOTATION', $_tmp_pics_list) . '
										';}$_result.='
									</div>

									<div class="actions-container">
										';if ($_data->is_true($_data->get('C_GALLERY_MODO'))){$_result.='
										<span id="fihref' . $_data->get_from_list('ID', $_tmp_pics_list) . '"><a href="javascript:display_rename_file(\'' . $_data->get_from_list('ID', $_tmp_pics_list) . '\', \'' . $_data->get_from_list('RENAME', $_tmp_pics_list) . '\', \'' . $_data->get_from_list('RENAME_CUT', $_tmp_pics_list) . '\');" title="' . $_data->get('L_EDIT') . '" class="fa fa-edit"></a></span>
										<a href="' . $_data->get_from_list('U_DEL', $_tmp_pics_list) . '" title="' . $_data->get('L_DELETE') . '" class="fa fa-delete" data-confirmation="delete-element"></a>
										<div id="move' . $_data->get_from_list('ID', $_tmp_pics_list) . '" class="move-pics-container">
											<div class="bbcode-block move-pics-block" onmouseover="pics_hide_block(' . $_data->get_from_list('ID', $_tmp_pics_list) . ', 1);" onmouseout="pics_hide_block(' . $_data->get_from_list('ID', $_tmp_pics_list) . ', 0);">
												<div>' . $_data->get('L_MOVETO') . ' :</div>
												<select class="valign-middle" name="' . $_data->get_from_list('ID', $_tmp_pics_list) . 'cat" onchange="document.location = \'' . $_data->get_from_list('U_MOVE', $_tmp_pics_list) . '">
													' . $_data->get_from_list('CAT', $_tmp_pics_list) . '
												</select>
											</div>
										</div>
										<a href="javascript:pics_display_block(' . $_data->get_from_list('ID', $_tmp_pics_list) . ');" onmouseover="pics_hide_block(' . $_data->get_from_list('ID', $_tmp_pics_list) . ', 1);" onmouseout="pics_hide_block(' . $_data->get_from_list('ID', $_tmp_pics_list) . ', 0);" class="fa fa-move" title="' . $_data->get('L_MOVETO') . '"></a>

										<a id="img_aprob' . $_data->get_from_list('ID', $_tmp_pics_list) . '" href="javascript:pics_aprob(' . $_data->get_from_list('ID', $_tmp_pics_list) . ');" class="';if ($_data->is_true($_data->get_from_list('C_IMG_APROB', $_tmp_pics_list))){$_result.='fa fa-eye-slash';}else{$_result.='fa fa-eye';}$_result.='" title="' . $_data->get_from_list('L_APROB_IMG', $_tmp_pics_list) . '"></a>
										&nbsp;<span id="img' . $_data->get('ID') . '"></span>
										';}$_result.='
										<span id="img' . $_data->get_from_list('ID', $_tmp_pics_list) . '"></span>
									</div>
								</td>
								';if ($_data->is_true($_data->get_from_list('C_CLOSE_TR', $_tmp_pics_list))){$_result.='</tr>';}$_result.='
							';}$_result.='

							';foreach($_data->get_block('end_table') as $_tmp_end_table){$_result.='
								<td class="td-end" style="width:' . $_data->get_from_list('COLUMN_WIDTH_PICS', $_tmp_end_table) . '%">&nbsp;</td>

							';if ($_data->is_true($_data->get_from_list('C_DISPLAY_TR_END', $_tmp_end_table))){$_result.='</tr>';}$_result.='
							';}$_result.='
							</tbody>
						</table>
					</div>
					<footer></footer>
				</article>
				';}$_result.='

				<p class="nbr-total-pics smaller">' . $_data->get('L_TOTAL_IMG') . '</p>
			</div>
			<footer>
			</footer>
		</section>
'; ?>