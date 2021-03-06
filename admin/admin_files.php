<?php
/*##################################################
 *                               admin_files.php
 *                            -------------------
 *   begin                : March 06, 2007
 *   copyright            : (C) 2007 Viarre Régis
 *   email                : crowkait@gmail.com
 *
 *
 ###################################################
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 ###################################################*/

require_once('../admin/admin_begin.php');
define('TITLE', $LANG['administration']);
require_once('../admin/admin_header.php');

$request = AppContext::get_request();

$folder = $request->get_getint('f', 0);
$folder_member = $request->get_getint('fm', 0);
$parent_folder = $request->get_getint('fup', 0);
$home_folder = $request->get_getvalue('root', false);
$del_folder = $request->get_getint('delf', 0);
$empty_folder = $request->get_getint('eptf', 0);
$del_file = $request->get_getint('del', 0);
$get_error = $request->get_getvalue('error', '');
$get_l_error = $request->get_getvalue('erroru', '');
$show_member = $request->get_getvalue('showm', false);
$move_folder = $request->get_getint('movefd', 0);
$move_file = $request->get_getint('movefi', 0);
$to = retrieve(POST, 'new_cat', -1);

if ($parent_folder) //Changement de dossier
{
	try {
		$parent_folder = PersistenceContext::get_querier()->select_single_row(PREFIX . 'upload_cat', array('id_parent', 'user_id'), 'WHERE id=:id', array('id' => $parent_folder));
	} catch (RowNotFoundException $e) {
		$error_controller = PHPBoostErrors::unexisting_page();
		DispatchManager::redirect($error_controller);
	}
	
	if (!empty($folder_member)) 
		AppContext::get_response()->redirect('/admin/admin_files.php?showm=1');
	elseif ($parent_folder['user_id'] != -1 && empty($parent_folder['id_parent']))
		AppContext::get_response()->redirect('/admin/admin_files.php?fm=' . $parent_folder['user_id']);
	else
		AppContext::get_response()->redirect('/admin/admin_files.php?f=' . $parent_folder['id_parent']);
}
elseif ($home_folder) //Retour à la racine.
	AppContext::get_response()->redirect('/admin/admin_files.php');
elseif (!empty($_FILES['upload_file']['name'])) //Ajout d'un fichier.
{
	//Si le dossier n'est pas en écriture on tente un CHMOD 777
	@clearstatcache();
	$dir = PATH_TO_ROOT . '/upload/';
	if (!is_writable($dir))
		$is_writable = (@chmod($dir, 0777));
	
	@clearstatcache();
	$error = '';
	if (is_writable($dir)) //Dossier en écriture, upload possible
	{
		$Upload = new Upload($dir);
		$Upload->file('upload_file', '`([a-z0-9()_-])+\.(' . implode('|', array_map('preg_quote', FileUploadConfig::load()->get_authorized_extensions())) . ')+$`i', Upload::UNIQ_NAME);
		
		if ($Upload->get_error() != '') //Erreur, on arrête ici
			AppContext::get_response()->redirect('/admin/admin_files.php?f=' . $folder . '&erroru=' . $Upload->get_error() . '#message_helper');
		else //Insertion dans la bdd
		{
			$check_user_folder = 0;
			try {
				$check_user_folder = PersistenceContext::get_querier()->get_column_value(DB_TABLE_UPLOAD_CAT, 'user_id', 'WHERE id=:id', array('id' => $folder));
			} catch (RowNotFoundException $e) {}
			
			$user_id = ($check_user_folder <= 0) ? -1 : AppContext::get_current_user()->get_id();
			$user_id = max($user_id, $folder_member);
			
			$result = PersistenceContext::get_querier()->insert(DB_TABLE_UPLOAD, array('idcat' => $folder, 'name' => $Upload->get_original_filename(), 'path' => $Upload->get_filename(), 'user_id' => $user_id, 'size' => $Upload->get_human_readable_size(), 'type' => $Upload->get_extension(), 'timestamp' => time()));
			$id_file = $result->get_last_inserted_id();
		}
	}
	else
		$error = 'e_upload_failed_unwritable';
	
	$anchor = !empty($error) ? '&error=' . $error . '#message_helper' : (!empty($id_file) ? '#fi1' . $id_file : '');
	AppContext::get_response()->redirect('/admin/admin_files.php?f=' . $folder . ($folder_member > 0 ? '&fm=' . $folder_member : '') . $anchor);
}
elseif (!empty($del_folder)) //Supprime un dossier.
{
	AppContext::get_session()->csrf_get_protect(); //Protection csrf
	
	//Suppression du dossier et de tout le contenu	
	Uploads::Del_folder($del_folder);
	
	if (!empty($folder_member))
		AppContext::get_response()->redirect('/admin/admin_files.php?fm=' . $folder_member);
	else
		AppContext::get_response()->redirect('/admin/admin_files.php?f=' . $folder);
}
elseif (!empty($empty_folder)) //Vide un dossier membre.
{
	AppContext::get_session()->csrf_get_protect(); //Protection csrf.
	
	//Suppression de tout les dossiers enfants.
	Uploads::Empty_folder_member($empty_folder);

	AppContext::get_response()->redirect('/admin/admin_files.php?showm=1');
}
elseif (!empty($del_file)) //Suppression d'un fichier
{
	AppContext::get_session()->csrf_get_protect(); //Protection csrf
	
	//Suppression d'un fichier.
	Uploads::Del_file($del_file, -1, Uploads::ADMIN_NO_CHECK);
	
	AppContext::get_response()->redirect('/admin/admin_files.php?f=' . $folder . ($folder_member > 0 ? '&fm=' . $folder_member : ''));
}
elseif (!empty($move_folder) && $to != -1) //Déplacement d'un dossier
{
	AppContext::get_session()->csrf_get_protect(); //Protection csrf
	
	$user_id = 0;
	try {
		$user_id = PersistenceContext::get_querier()->get_column_value(DB_TABLE_UPLOAD_CAT, 'user_id', 'WHERE id=:id', array('id' => $move_folder));
	} catch (RowNotFoundException $e) {}
	
	$move_list_parent = array();
	
	if ($user_id)
	{
		$result = PersistenceContext::get_querier()->select("SELECT id, id_parent, name
		FROM " . PREFIX . "upload_cat
		WHERE user_id = :user_id
		ORDER BY id", array(
			'user_id' => $user_id
		));
		while ($row = $result->fetch())
			$move_list_parent[$row['id']] = $row['id_parent'];
		
		$result->dispose();
	}
	
	$array_child_folder = array();
	Uploads::Find_subfolder($move_list_parent, $move_folder, $array_child_folder);
	$array_child_folder[] = $move_folder;
	if (!in_array($to, $array_child_folder)) //Dossier de destination non sous-dossier du dossier source.
		Uploads::Move_folder($move_folder, $to, AppContext::get_current_user()->get_id(), Uploads::ADMIN_NO_CHECK);
	else
		AppContext::get_response()->redirect('/admin/admin_files.php?movefd=' . $move_folder . '&f=0&error=folder_contains_folder');
			
	AppContext::get_response()->redirect('/admin/admin_files.php?f=' . $to);
}
elseif (!empty($move_file) && $to != -1) //Déplacement d'un fichier
{
	AppContext::get_session()->csrf_get_protect(); //Protection csrf
	
	Uploads::Move_file($move_file, $to, AppContext::get_current_user()->get_id(), Uploads::ADMIN_NO_CHECK);
	
	AppContext::get_response()->redirect('/admin/admin_files.php?f=' . $to);
}
elseif (!empty($move_folder) || !empty($move_file))
{
	$template = new FileTemplate('admin/admin_files_move.tpl');
	
	if (!empty($folder_member))
	{
		$result = PersistenceContext::get_querier()->select("SELECT uc.user_id, m.display_name
			FROM " . DB_TABLE_UPLOAD_CAT . " uc
			LEFT JOIN " . DB_TABLE_MEMBER . " m ON m.user_id = uc.user_id
			WHERE uc.user_id = :user_id
			UNION
			SELECT u.user_id, m.display_name
			FROM " . DB_TABLE_UPLOAD . " u
			LEFT JOIN " . DB_TABLE_MEMBER . " m ON m.user_id = u.user_id
			WHERE u.user_id = :user_id", array(
				'user_id' => $folder_member
		));
	}
	else
	{
		$result = PersistenceContext::get_querier()->select("SELECT uc.user_id, m.display_name
			FROM " . DB_TABLE_UPLOAD_CAT . " uc
			LEFT JOIN " . DB_TABLE_MEMBER . " m ON m.user_id = uc.user_id
			WHERE uc.id = :id", array(
				'id' => $folder
		));
	}
	
	$folder_info = $result->fetch();
	$result->dispose();
	
	if ($show_member)
		$url = Uploads::get_admin_url($folder, '/<a href="admin_files.php?showm=1">' . $LANG['member_s'] . '</a>');
	elseif (!empty($folder_member) || !empty($folder_info['user_id']))
		$url = Uploads::get_admin_url($folder, '', '<a href="admin_files.php?showm=1">' . $LANG['member_s'] . '</a>/<a href="admin_files.php?fm=' . $folder_info['user_id'] . '">' . $folder_info['display_name'] . '</a>/');
	elseif (empty($folder))
		$url = '/';	
	else
		$url = Uploads::get_admin_url($folder, '');
		
	$template->put_all(array(
		'FOLDER_ID' => !empty($folder) ? $folder : '0',
		'URL' => $url,
		'L_FILES_MANAGEMENT' => $LANG['files_management'],
		'L_FILES_ACTION' => $LANG['files_management'],
		'L_CONFIG_FILES' => $LANG['files_config'],
		'L_MOVE_TO' => $LANG['moveto'],
		'L_ROOT' => $LANG['root'],
		'L_URL' => $LANG['url'],
		'L_SUBMIT' => $LANG['submit']
	));
	
	if ($get_error == 'folder_contains_folder')
		$template->put('message_helper', MessageHelper::display($LANG['upload_folder_contains_folder'], MessageHelper::WARNING));
	
	//liste des fichiers disponibles
	include_once(PATH_TO_ROOT .'/user/upload_functions.php');
	$cats = array();
	
	if (empty($folder_member))
		$folder_member = -1;
	
	$is_folder = !empty($move_folder);
	//Affichage du dossier/fichier à déplacer
	if ($is_folder)
	{
		try {
			$folder_info = PersistenceContext::get_querier()->select_single_row(PREFIX . 'upload_cat', array('name', 'id_parent'), 'WHERE id=:id', array('id' => $move_folder));
		} catch (RowNotFoundException $e) {
			$error_controller = PHPBoostErrors::unexisting_element();
			DispatchManager::redirect($error_controller);
		}
		
		$name = $folder_info['name'];
		$id_cat = $folder_info['id_parent'];
		$template->assign_block_vars('folder', array(
			'NAME' => $name
		));
		$template->put_all(array(
			'SELECTED_CAT' => $id_cat,
			'ID_FILE' => $move_folder,
			'TARGET' => url('admin_files.php?movefd=' . $move_folder . '&amp;f=0&amp;token=' . AppContext::get_session()->get_token())
		));
		$cat_explorer = display_cat_explorer($id_cat, $cats, 1, $folder_member);
	}
	else
	{
		try {
			$info_move = PersistenceContext::get_querier()->select_single_row(PREFIX . 'upload', array('path', 'name', 'type', 'size', 'idcat'), 'WHERE id=:id', array('id' => $move_file));
		} catch (RowNotFoundException $e) {
			$error_controller = PHPBoostErrors::unexisting_element();
			DispatchManager::redirect($error_controller);
		}
		
		$get_img_mimetype = Uploads::get_img_mimetype($info_move['type']);
		$size_img = '';
		$display_real_img = false;
		switch ($info_move['type'])
		{
			//Images
			case 'jpg':
			case 'png':
			case 'gif':
			case 'bmp':
			list($width_source, $height_source) = @getimagesize(PATH_TO_ROOT .'/upload/' . $info_move['path']);
			$size_img = ' (' . $width_source . 'x' . $height_source . ')';
			
			//On affiche l'image réelle si elle n'est pas trop grande.
			if ($width_source < 350 && $height_source < 350) 
			{
				$display_real_img = true;
			}
		}
		
		$cat_explorer = display_cat_explorer($info_move['idcat'], $cats, 1, $folder_member);
		
		$template->assign_block_vars('file', array(
			'C_DISPLAY_REAL_IMG' => $display_real_img,
			'NAME' => $info_move['name'],
			'FILETYPE' => $get_img_mimetype['filetype'] . $size_img,
			'SIZE' => ($info_move['size'] > 1024) ? NumberHelper::round($info_move['size']/1024, 2) . ' ' . LangLoader::get_message('unit.megabytes', 'common') : NumberHelper::round($info_move['size'], 0) . ' ' . LangLoader::get_message('unit.kilobytes', 'common'),
			'FILE_ICON' => $display_real_img ? $info_move['path'] : $get_img_mimetype['img']
		));
		$template->put_all(array(
			'SELECTED_CAT' => $info_move['idcat'],
			'TARGET' => url('admin_files.php?movefi=' . $move_file . '&amp;f=0&amp;token=' . AppContext::get_session()->get_token())
		));
	}
	
	$template->put_all(array(
		'FOLDERS' => $cat_explorer,
		'ID_FILE' => $move_file
	));
	
	$template->display();
}
else
{
	$template = new FileTemplate('admin/admin_files_management.tpl');
	
	if (!empty($folder_member))
	{
		$result = PersistenceContext::get_querier()->select("SELECT uc.user_id, m.display_name
			FROM " . DB_TABLE_UPLOAD_CAT . " uc
			LEFT JOIN " . DB_TABLE_MEMBER . " m ON m.user_id = uc.user_id
			WHERE uc.user_id = :user_id
			UNION
			SELECT u.user_id, m.display_name
			FROM " . DB_TABLE_UPLOAD . " u
			LEFT JOIN " . DB_TABLE_MEMBER . " m ON m.user_id = u.user_id
			WHERE u.user_id = :user_id", array(
				'user_id' => $folder_member
		));
	}
	else
	{
		$result = PersistenceContext::get_querier()->select("SELECT uc.user_id, m.display_name
			FROM " . DB_TABLE_UPLOAD_CAT . " uc
			LEFT JOIN " . DB_TABLE_MEMBER . " m ON m.user_id = uc.user_id
			WHERE uc.id = :id", array(
				'id' => $folder
		));
	}
	
	$folder_info = $result->fetch();
	$result->dispose();
	
	//Gestion des erreurs.
	$array_error = array('e_upload_invalid_format', 'e_upload_max_weight', 'e_upload_error', 'e_upload_failed_unwritable', 'e_unlink_disabled');
	if (in_array($get_error, $array_error))
		$template->put('message_helper', MessageHelper::display($LANG[$get_error], MessageHelper::WARNING));
	if ($get_error == 'incomplete')
		$template->put('message_helper', MessageHelper::display($LANG['e_incomplete'], MessageHelper::NOTICE));  

	if (isset($LANG[$get_l_error]))
		$template->put('message_helper', MessageHelper::display($LANG[$get_l_error], MessageHelper::WARNING));  

	if ($show_member)
		$url = Uploads::get_admin_url($folder, '/<a href="admin_files.php?showm=1">' . $LANG['member_s'] . '</a>');
	elseif (!empty($folder_member) || !empty($folder_info['user_id']))
		$url = Uploads::get_admin_url($folder, '', '<a href="admin_files.php?showm=1">' . $LANG['member_s'] . '</a>/<a href="admin_files.php?fm=' . $folder_info['user_id'] . '">' . $folder_info['display_name'] . '</a>/');
	elseif (empty($folder))
		$url = '/';	
	else
		$url = Uploads::get_admin_url($folder, '');
		
	$template->put_all(array(
		'FOLDER_ID' => !empty($folder) ? $folder : '0',
		'FOLDERM_ID' => !empty($folder_member) ? '&amp;fm=' . $folder_member : '',
		'USER_ID' => !empty($folder_info['user_id']) ? $folder_info['user_id'] : '-1',
		'URL' => $url,
		'L_CONFIRM_DEL_FILE' => $LANG['confim_del_file'],
		'L_CONFIRM_DEL_FOLDER' => $LANG['confirm_del_folder'],
		'L_CONFIRM_EMPTY_FOLDER' => $LANG['confirm_empty_folder'],
		'L_FOLDER_ALREADY_EXIST' => LangLoader::get_message('element.already_exists', 'status-messages-common'),
		'L_FOLDER_FORBIDDEN_CHARS' => $LANG['folder_forbidden_chars'],
		'L_FILES_MANAGEMENT' => $LANG['files_management'],
		'L_FILES_ACTION' => $LANG['files_management'],
		'L_CONFIG_FILES' => $LANG['files_config'],
		'L_ADD_FILES' => $LANG['file_add'],
		'L_NAME' => $LANG['name'],
		'L_SIZE' => $LANG['size'],
		'L_MOVETO' => $LANG['moveto'],
		'L_DATA' => $LANG['data'],
		'L_FOLDER_SIZE' => $LANG['folder_size'],
		'L_FOLDERS' => $LANG['folders'],
		'L_ROOT' => $LANG['root'],
		'L_FOLDER_NEW' => $LANG['folder_new'],
		'L_FOLDER_CONTENT' => $LANG['folder_content'],
		'L_FOLDER_UP' => $LANG['folders_up'],
		'L_FILES' => $LANG['files'],
		'L_DELETE' => LangLoader::get_message('delete', 'common'),
		'L_EMPTY' => $LANG['empty'],
		'L_UPLOAD' => $LANG['upload'],
		'L_URL' => $LANG['url']
	));

	if ($folder == 0 && !$show_member && empty($folder_member))
	{
		$template->assign_block_vars('folder', array(
			'C_MEMBERS_FOLDER' => true,
			'C_MEMBER_FOLDER' => true,
			'NAME' => '<a class="com" href="admin_files.php?showm=1">' . $LANG['member_s'] . '</a>',
			'U_FOLDER' => '?showm=1',
			'L_TYPE_DEL_FOLDER' => $LANG['empty_member_folder']
		));
	}
	
	$total_folder_size = $total_files = $total_directories = 0;

	if ($show_member)
	{
		$result = PersistenceContext::get_querier()->select("SELECT uc.user_id as id, uc.user_id, m.display_name as name, 0 as id_parent
			FROM " . DB_TABLE_UPLOAD_CAT . " uc
			LEFT JOIN " . DB_TABLE_MEMBER . " m ON m.user_id = uc.user_id
			WHERE uc.id_parent = :id AND uc.user_id <> -1 
			UNION
			SELECT u.user_id as id, u.user_id, m.display_name as name, 0 as id_parent
			FROM " . DB_TABLE_UPLOAD . " u
			LEFT JOIN " . DB_TABLE_MEMBER . " m ON m.user_id = u.user_id
			WHERE u.user_id <> -1
			ORDER BY name", array(
				'id' => $folder
		));
	}
	elseif (!empty($folder_member) && empty($folder))
	{
		$result = PersistenceContext::get_querier()->select("SELECT id, name, id_parent, user_id
			FROM " . DB_TABLE_UPLOAD_CAT . " 
			WHERE id_parent = 0 AND user_id = :user_id
			ORDER BY name", array(
				'user_id' => $folder_member
		));
	}
	else
	{
		$result = PersistenceContext::get_querier()->select("SELECT id, name, id_parent, user_id
			FROM " . DB_TABLE_UPLOAD_CAT . " 
			WHERE id_parent = :id" . ((empty($folder) || $folder_info['user_id'] <= 0) ? ' AND user_id = -1' : ' AND user_id <> -1') . "
			ORDER BY name", array(
				'id' => $folder
		));
	}
	
	//Affichage des dossiers
	while ($row = $result->fetch())
	{
		$name_cut = (TextHelper::strlen(TextHelper::html_entity_decode($row['name'])) > 22) ? TextHelper::htmlspecialchars(TextHelper::substr(TextHelper::html_entity_decode($row['name']), 0, 22)) . '...' : $row['name'];
		
		$template->assign_block_vars('folder', array(
			'C_MEMBER_FOLDER' => $show_member,
			'ID' => $row['id'],
			'NAME' => $name_cut,
			'RENAME_FOLDER' => !$show_member ? '<span id="fhref' . $row['id'] . '"><a href="javascript:display_rename_folder(\'' . $row['id'] . '\', \'' . addslashes($row['name']) . '\', \'' . addslashes($name_cut) . '\');" title="' . LangLoader::get_message('edit', 'common') . '" class="fa fa-edit"></a></span>' : '',
			'DEL_TYPE' => $show_member ? 'eptf' : 'delf',
			'C_TYPEFOLDER' => !$show_member,
			'MOVE' => !$show_member ? '<a href="javascript:upload_display_block(' . $row['id'] . ');" onmouseover="upload_hide_block(' . $row['id'] . ', 1);" onmouseout="upload_hide_block(' . $row['id'] . ', 0);" class="fa fa-move" title="' . $LANG['moveto'] . '"></a>' : '',
			'U_ONCHANGE_FOLDER' => "'admin_files" . url(".php?movef=" . $row['id'] . "&amp;to=' + this.options[this.selectedIndex].value + '") . "'",
			'L_TYPE_DEL_FOLDER' => $LANG['del_folder'],
			'U_FOLDER' => '?' . ($show_member ? 'fm=' . $row['user_id'] : 'f=' . $row['id']),
			'U_MOVE' => '.php?movefd=' . $row['id'] . '&amp;f=' . $folder . ($row['user_id'] > 0 ? '&amp;fm=' . $row['user_id'] : '')
		));
		$total_directories++;
	}
	$result->dispose();
	
	if (!$show_member) //Dossier membres.
	{
		$now = new Date();
		if (!empty($folder_member) && empty($folder))
		{
			$result = PersistenceContext::get_querier()->select("SELECT up.id, up.name, up.path, up.size, up.type, up.timestamp, m.user_id, m.display_name
			FROM " . DB_TABLE_UPLOAD . " up
			LEFT JOIN " . DB_TABLE_MEMBER . " m ON m.user_id = up.user_id
			WHERE up.idcat = 0 AND up.user_id = :user_id", array(
				'user_id' => $folder_member
			));
		}
		else
		{
			$result = PersistenceContext::get_querier()->select("SELECT up.id, up.name, up.path, up.size, up.type, up.timestamp, m.user_id, m.display_name
			FROM " . DB_TABLE_UPLOAD . " up
			LEFT JOIN " . DB_TABLE_MEMBER . " m ON m.user_id = up.user_id
			WHERE idcat = :id" . ((empty($folder) || $folder_info['user_id'] <= 0) ? ' AND up.user_id = -1' : ' AND up.user_id != -1'), array(
				'id' => $folder
			));
		}
		//Affichage des fichiers contenu dans le dossier
		while ($row = $result->fetch())
		{
			$name_cut = (TextHelper::strlen(TextHelper::html_entity_decode($row['name'])) > 22) ? TextHelper::htmlspecialchars(TextHelper::substr(TextHelper::html_entity_decode($row['name']), 0, 22)) . '...' : $row['name'];
		
			$get_img_mimetype = Uploads::get_img_mimetype($row['type']);
			$size_img = '';
			switch ($row['type'])
			{
				//Images
				case 'jpg':
				case 'png':
				case 'gif':
				case 'bmp':
				list($width_source, $height_source) = @getimagesize(PATH_TO_ROOT . '/upload/' . $row['path']);
				$size_img = ' (' . $width_source . 'x' . $height_source . ')';
				$width_source = !empty($width_source) ? $width_source + 30 : 0;
				$height_source = !empty($height_source) ? $height_source + 30 : 0;
				$bbcode = '[img]/upload/' . $row['path'] . '[/img]';
				$link = PATH_TO_ROOT . '/upload/' . $row['path'];
				break;
				//Image svg
				case 'svg':
				$bbcode = '[img]/upload/' . $row['path'] . '[/img]';
				$link = 'javascript:popup_upload(\'' . Url::to_rel('/upload/' . $row['path']) . '\', 0, 0, \'no\')';
				break;
				//Sons
				case 'mp3':
				$bbcode = '[sound]/upload/' . $row['path'] . '[/sound]';
				$link = 'javascript:popup_upload(\'' . Url::to_rel('/upload/' . $row['path']) . '\', 220, 10, \'no\')';
				break;
				default:
				$bbcode = '[url=/upload/' . $row['path'] . ']' . $row['name'] . '[/url]';				
				$link = PATH_TO_ROOT . '/upload/' . $row['path'];
			}
			
			$template->assign_block_vars('files', array(
				'C_IMG' => $get_img_mimetype['img'] == 'fa-upload-picture fa-2x' && FileUploadConfig::load()->get_display_file_thumbnail(),
				'C_RECENT_FILE' => $row['timestamp'] > ($now->get_timestamp() - (2 * 60)),  // Ficher ajouté il y a moins de 2 minutes
				'ID' => $row['id'],
				'IMG' => $get_img_mimetype['img'],
				'URL' => $link,
				'NAME' => $name_cut,
				'RENAME_FILE' => '<span id="fihref' . $row['id'] . '"><a href="javascript:display_rename_file(\'' . $row['id'] . '\', \'' . addslashes($row['name']) . '\', \'' . addslashes($name_cut) . '\');" title="' . LangLoader::get_message('edit', 'common') . '" class="fa fa-edit"></a></span>',
				'FILETYPE' => $get_img_mimetype['filetype'] . $size_img,
				'BBCODE' => '<input readonly="readonly" type="text" onclick="select_div(\'text_' . $row['id'] . '\');" id="text_' . $row['id'] . '" style="margin-top:2px;cursor:pointer;" value="' . $bbcode . '">',
				'SIZE' => ($row['size'] > 1024) ? NumberHelper::round($row['size']/1024, 2) . ' ' . LangLoader::get_message('unit.megabytes', 'common') : NumberHelper::round($row['size'], 0) . ' ' . LangLoader::get_message('unit.kilobytes', 'common'),
				'LIGHTBOX' => !empty($size_img) ? ' data-lightbox="1" data-rel="lightcase:collection"' : '',
				'U_MOVE' => '.php?movefi=' . $row['id'] . '&amp;f=' . $folder . '&amp;fm=' . $row['user_id']
				
			));
			
			$total_folder_size += $row['size'];
			$total_files++;
		}
		$result->dispose();
	}
	

	$total_size = 0;
	try {
	$total_size = PersistenceContext::get_querier()->get_column_value(DB_TABLE_UPLOAD, 'SUM(size)', '');
	} catch (RowNotFoundException $e) {}
	
	$template->put_all(array(
		'TOTAL_SIZE' => ($total_size > 1024) ? NumberHelper::round($total_size/1024, 2) . ' ' . LangLoader::get_message('unit.megabytes', 'common') : NumberHelper::round($total_size, 0) . ' ' . LangLoader::get_message('unit.kilobytes', 'common'),
		'TOTAL_FOLDER_SIZE' => ($total_folder_size > 1024) ? NumberHelper::round($total_folder_size/1024, 2) . ' ' . LangLoader::get_message('unit.megabytes', 'common') : NumberHelper::round($total_folder_size, 0) . ' ' . LangLoader::get_message('unit.kilobytes', 'common'),
		'TOTAL_FOLDERS' => $total_directories,
		'TOTAL_FILES' => $total_files
	));

	if ($total_directories == 0 && $total_files == 0 && (!empty($folder) || !empty($show_member)))
		$template->put_all(array(
			'C_EMPTY_FOLDER' => true,
			'L_EMPTY_FOLDER' => LangLoader::get_message('no_item_now', 'common')
		));
		
	$template->display();
}
	
require_once('../admin/admin_footer.php');
?>