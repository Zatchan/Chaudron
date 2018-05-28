<?php $_result='		<div class="wiki-tools-container">
			<nav id="cssmenu-wikitools" class="cssmenu cssmenu-right cssmenu-actionslinks cssmenu-tools">
				<ul class="level-0 hidden">
					';if ($_data->is_true($_data->get('C_ACTIV_COM'))){$_result.='
						<li>
							<a href="' . $_data->get('U_COM') . '" class="cssmenu-title"><i class="fa fa-comments-o"></i> ' . $_data->get('L_COM') . '</a>
						</li>
					';}$_result.='
					<li><a href="' . $_data->get('U_HISTORY') . '" title="' . $_data->get('L_HISTORY') . '" class="cssmenu-title">
						<i class="fa fa-reply"></i> ' . $_data->get('L_HISTORY') . '
					</a></li>
					';if ($_data->is_true($_data->get('C_INDEX_PAGE'))){$_result.='
						';if ($_data->is_true($_data->get('IS_ADMIN'))){$_result.='
							<li><a href="' . $_data->get('U_EDIT_INDEX') . '" title="' . $_data->get('L_EDIT_INDEX') . '" class="cssmenu-title">
								<i class="fa fa-edit"></i> ' . $_data->get('L_EDIT_INDEX') . '
							</a></li>
						';}$_result.='
					';}$_result.='
					';if (!$_data->is_true($_data->get('C_INDEX_PAGE'))){$_result.='
						';if ($_data->is_true($_data->get('C_EDIT'))){$_result.='
						<li><a href="' . $_data->get('U_EDIT') . '" title="' . $_data->get('L_EDIT') . '" class="cssmenu-title">
							<i class="fa fa-edit"></i> ' . $_data->get('L_EDIT') . '
						</a></li>
						';}$_result.='
						';if ($_data->is_true($_data->get('C_DELETE'))){$_result.='
						<li><a href="' . $_data->get('U_DELETE') . '" title="' . $_data->get('L_DELETE') . '" data-confirmation="delete-element" class="cssmenu-title">
							<i class="fa fa-delete"></i> ' . $_data->get('L_DELETE') . '
						</a></li>
						';}$_result.='
						';if ($_data->is_true($_data->get('C_RENAME'))){$_result.='
						<li><a href="' . $_data->get('U_RENAME') . '" title="' . $_data->get('L_RENAME') . '" class="cssmenu-title">
							<i class="fa fa-magic"></i> ' . $_data->get('L_RENAME') . '
						</a></li>
						';}$_result.='
						';if ($_data->is_true($_data->get('C_REDIRECT'))){$_result.='
						<li><a href="' . $_data->get('U_REDIRECT') . '" title="' . $_data->get('L_REDIRECT') . '" class="cssmenu-title">
							<i class="fa fa-fast-forward"></i> ' . $_data->get('L_REDIRECT') . '
						</a></li>
						';}$_result.='
						';if ($_data->is_true($_data->get('C_MOVE'))){$_result.='
						<li><a href="' . $_data->get('U_MOVE') . '" title="' . $_data->get('L_MOVE') . '" class="cssmenu-title">
							<i class="fa fa-move"></i> ' . $_data->get('L_MOVE') . '
						</a></li>
						';}$_result.='
						';if ($_data->is_true($_data->get('C_STATUS'))){$_result.='
						<li><a href="' . $_data->get('U_STATUS') . '" title="' . $_data->get('L_STATUS') . '" class="cssmenu-title">
							<i class="fa fa-tasks"></i> ' . $_data->get('L_STATUS') . '
						</a></li>
						';}$_result.='
						';if ($_data->is_true($_data->get('C_RESTRICTION'))){$_result.='
						<li><a href="' . $_data->get('U_RESTRICTION') . '" title="' . $_data->get('L_RESTRICTION') . '" class="cssmenu-title">
							<i class="fa fa-lock"></i> ' . $_data->get('L_RESTRICTION') . '
						</a></li>
						';}$_result.='
						';if ($_data->is_true($_data->get('IS_USER_CONNECTED'))){$_result.='
							<li><a href="' . $_data->get('U_WATCH') . '" title="' . $_data->get('L_WATCH') . '" class="cssmenu-title">
								<i class="fa fa-heart"></i> ' . $_data->get('L_WATCH') . '
							</a></li>
						';}$_result.='
					';}$_result.='
					';if ($_data->is_true($_data->get('C_INDEX_PAGE'))){$_result.='
						<li><a href="' . $_data->get('U_RANDOM') . '" title="' . $_data->get('L_RANDOM') . '" class="cssmenu-title">
							<i class="fa fa-random"></i> ' . $_data->get('L_RANDOM') . '
						</a></li>
					';}$_result.='
					';if (!$_data->is_true($_data->get('C_INDEX_PAGE'))){$_result.='
						<li><a href="' . $_data->get('U_PRINT') . '" title="' . $_data->get('L_PRINT') . '" class="cssmenu-title">
							<i class="fa fa-print"></i> ' . $_data->get('L_PRINT') . '
						</a></li>
					';}$_result.='
				</ul>
			</nav>
			<script>
				jQuery("#cssmenu-wikitools").menumaker({
					title: "' . $_data->get('L_OTHER_TOOLS') . '",
					format: "multitoggle",
					breakpoint: 768
				});
				jQuery(document).ready(function() {
					jQuery("#cssmenu-wikitools ul").removeClass(\'hidden\');
				});
			</script>
		</div>
		<div class="spacer"></div>
'; ?>