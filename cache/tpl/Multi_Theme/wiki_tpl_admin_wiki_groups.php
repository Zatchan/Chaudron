<?php $_result='<nav id="admin-quick-menu">
		<a href="" class="js-menu-button" onclick="open_submenu(\'admin-quick-menu\');return false;" title="' . $_data->get('L_WIKI_MANAGEMENT') . '">
				<i class="fa fa-bars"></i> ' . $_data->get('L_WIKI_MANAGEMENT') . '
		</a>
		<ul>
			<li>
				<a href="' . Url::to_rel('/wiki') . '" class="quick-link">' . LangLoader::get_message('home', 'main') . '</a>
			</li>
			<li>
				<a href="admin_wiki.php" class="quick-link">' . $_data->get('L_CONFIG_WIKI') . '</a>
			</li>
			<li>
				<a href="admin_wiki_groups.php" class="quick-link">' . $_data->get('L_WIKI_GROUPS') . '</a>
			</li>
			<li>
			<a href="' . $_functions->relative_url(WikiUrlBuilder::documentation()) . '" class="quick-link">' . LangLoader::get_message('module.documentation', 'admin-modules-common') . '</a>
			</li>
		</ul>
</nav>

<div id="admin-contents">
	<form action="admin_wiki_groups.php" method="post">
		<fieldset>
			<legend>' . $_data->get('L_WIKI_GROUPS') . '</legend>
			<div class="fieldset-inset">
				' . $_data->get('EXPLAIN_WIKI_GROUPS') . '

				<div class="form-element">
					<label>' . $_data->get('L_CREATE_ARTICLE') . '</label>

					<div class="form-field">
						' . $_data->get('SELECT_CREATE_ARTICLE') . '
					</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_CREATE_CAT') . '</label>

					<div class="form-field">
						' . $_data->get('SELECT_CREATE_CAT') . '
					</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_RESTORE_ARCHIVE') . '</label>

					<div class="form-field">
						' . $_data->get('SELECT_RESTORE_ARCHIVE') . '
					</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_DELETE_ARCHIVE') . '</label>

					<div class="form-field">
						' . $_data->get('SELECT_DELETE_ARCHIVE') . '
					</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_EDIT') . '</label>

					<div class="form-field">
						' . $_data->get('SELECT_EDIT') . '
					</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_DELETE') . '</label>

					<div class="form-field">
						' . $_data->get('SELECT_DELETE') . '
					</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_RENAME') . '</label>

					<div class="form-field">
						' . $_data->get('SELECT_RENAME') . '
					</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_REDIRECT') . '</label>

					<div class="form-field">
						' . $_data->get('SELECT_REDIRECT') . '
					</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_MOVE') . '</label>

					<div class="form-field">
						' . $_data->get('SELECT_MOVE') . '
					</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_STATUS') . '</label>

					<div class="form-field">
						' . $_data->get('SELECT_STATUS') . '
					</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_COM') . '</label>

					<div class="form-field">
						' . $_data->get('SELECT_COM') . '
					</div>
				</div>
				<div class="form-element">
					<label>' . $_data->get('L_RESTRICTION') . '</label>

					<div class="form-field">
						' . $_data->get('SELECT_RESTRICTION') . '
					</div>
				</div>
			</div>
		</fieldset>

		<fieldset class="fieldset-submit">
			<legend>' . $_data->get('L_UPDATE') . '</legend>
			<div class="fieldset-inset">
				<button type="submit" name="valid" value="true" class="submit">' . $_data->get('L_UPDATE') . '</button>
				<button type="reset" value="true">' . $_data->get('L_RESET') . '</button>
				<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
			</div>
		</fieldset>
	</form>
</div>
'; ?>