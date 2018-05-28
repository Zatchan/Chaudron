<?php $_result='<script>
<!--
	var path = \'' . $_data->get('PICTURES_DATA_PATH') . '\';
	var selected_cat = ' . $_data->get('SELECTED_CAT') . ';
-->
</script>
<script src="' . $_data->get('PATH_TO_ROOT') . '/pages/templates/js/pages.js"></script>

<section id="module-pages">
	<header>
		<h1>' . $_data->get('TITLE') . '</h1>
	</header>
	<div class="content">
		' . $_data->get('L_EXPLAIN_PAGES') . '
		<hr />
		<div class="explorer">
			<div class="cats">
				<h2>' . $_data->get('L_EXPLORER') . '</h2>
				<div class="content">
					<ul>
						<li><a id="class-0" class="' . $_data->get('CAT_0') . '" href="javascript:open_cat(0);"><i class="fa fa-folder"></i>' . $_data->get('L_ROOT') . '</a>
							<ul>
								';foreach($_data->get_block('list') as $_tmp_list){$_result.='
									<li class="sub">
										';if ($_data->is_true($_data->get_from_list('C_SUB_CAT', $_tmp_list))){$_result.='
											<a class="parent" href="javascript:show_pages_cat_contents(' . $_data->get_from_list('ID', $_tmp_list) . ', 0);" title="' . LangLoader::get_message('display', 'common') . '">
												<i class="fa fa-plus-square-o" id="img-subfolder-' . $_data->get_from_list('ID', $_tmp_list) . '"></i>
												<i class="fa fa-folder" id ="img-folder-' . $_data->get_from_list('ID', $_tmp_list) . '"></i>
											</a>
											<a id="class-' . $_data->get_from_list('ID', $_tmp_list) . '" href="javascript:open_cat(' . $_data->get_from_list('ID', $_tmp_list) . ');">' . $_data->get_from_list('TITLE', $_tmp_list) . '</a>
										';}else{$_result.='
											<a id="class-' . $_data->get_from_list('ID', $_tmp_list) . '" href="javascript:open_cat(' . $_data->get_from_list('ID', $_tmp_list) . ');"><i class="fa fa-folder"></i>' . $_data->get_from_list('TITLE', $_tmp_list) . '</a>
										';}$_result.='
										<span id="cat-' . $_data->get_from_list('ID', $_tmp_list) . '"></span>
									</li>
								';}$_result.='
								' . $_data->get('CAT_LIST') . '
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div class="files">
				<h2>' . $_data->get('L_CATS') . '</h2>
				<div class="content" id="cat-contents">
					<ul>
						' . $_data->get('ROOT_CONTENTS') . '
					</ul>
				</div>
			</div>
		</div>
	</div>
	<footer></footer>
</section>
'; ?>