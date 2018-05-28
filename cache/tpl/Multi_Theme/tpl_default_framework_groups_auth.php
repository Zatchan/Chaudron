<?php $_result='<div class="advanced-auth-group">
	<select id="groups_auth' . $_data->get('IDSELECT') . '" name="groups_auth' . $_data->get('IDSELECT') . '[]" size="8" multiple="multiple" onclick="' . $_data->get('DISABLED_SELECT') . ' document.getElementById(\'id' . $_data->get('IDSELECT') . 'r2\').selected = true;">
		<optgroup label="' . $_data->get('L_RANKS') . '">
		';foreach($_data->get_block('ranks_list') as $_tmp_ranks_list){$_result.='
			<option ' . $_data->get_from_list('DISABLED', $_tmp_ranks_list) . ' value="r' . $_data->get_from_list('IDRANK', $_tmp_ranks_list) . '" id="id' . $_data->get('IDSELECT') . 'r' . $_data->get_from_list('ID', $_tmp_ranks_list) . '" ' . $_data->get_from_list('SELECTED', $_tmp_ranks_list) . ' onclick="check_select_multiple_ranks(\'id' . $_data->get('IDSELECT') . 'r\', ' . $_data->get_from_list('ID', $_tmp_ranks_list) . ')">' . $_data->get_from_list('RANK_NAME', $_tmp_ranks_list) . '</option>
		';}$_result.='
		</optgroup>

		<optgroup label="' . $_data->get('L_GROUPS') . '">
		';foreach($_data->get_block('groups_list') as $_tmp_groups_list){$_result.='
			<option ' . $_data->get_from_list('DISABLED', $_tmp_groups_list) . ' value="' . $_data->get_from_list('IDGROUP', $_tmp_groups_list) . '" ' . $_data->get_from_list('SELECTED', $_tmp_groups_list) . '>' . $_data->get_from_list('GROUP_NAME', $_tmp_groups_list) . '</option>
		';}$_result.='
		</optgroup>
	</select>
</div>

';if ($_data->is_true($_data->get('C_NO_ADVANCED_AUTH'))){$_result.='
<div class="spacer"></div>
';}$_result.='

';if ($_data->is_true($_data->get('C_ADVANCED_AUTH'))){$_result.='
<div id="advanced_authb' . $_data->get('IDSELECT') . '" class="advanced-auth-select" style="' . $_data->get('ADVANCED_AUTH_STYLE') . '">
	<select id="members_auth' . $_data->get('IDSELECT') . '" name="members_auth' . $_data->get('IDSELECT') . '[]" size="8" multiple="multiple">
		<optgroup label="' . $_data->get('L_USERS') . '" id="advanced_auth3' . $_data->get('IDSELECT') . '">
			';foreach($_data->get_block('members_list') as $_tmp_members_list){$_result.='
			<option value="' . $_data->get_from_list('USER_ID', $_tmp_members_list) . '" selected="selected">' . $_data->get_from_list('LOGIN', $_tmp_members_list) . '</option>
			';}$_result.='
		</optgroup>
	</select>
</div>

<div id="advanced_auth' . $_data->get('IDSELECT') . '" class="advanced-auth-input" style="' . $_data->get('ADVANCED_AUTH_STYLE') . '">
	<strong>' . $_data->get('L_ADD_USER') . '</strong>
	<br />
	<input type="text" size="14" value="" id="login' . $_data->get('IDSELECT') . '" name="login' . $_data->get('IDSELECT') . '">
	<button onclick="XMLHttpRequest_search_members(\'' . $_data->get('IDSELECT') . '\', \'' . $_data->get('THEME') . '\', \'add_member_auth\', \'' . $_data->get('L_REQUIRE_PSEUDO') . '\');" type="button" name="valid" class="small">' . $_data->get('L_GO') . '</button>
	<br />
	<span id="search_img' . $_data->get('IDSELECT') . '"></span>
	<div id="xmlhttprequest-result-search' . $_data->get('IDSELECT') . '" class="xmlhttprequest-result-search advanced-auth-input-result" style="display: none;"></div>
</div>
';}$_result.='

<div class="spacer"></div>
<a class="small" href="javascript:open_advanced_auth(\'' . $_data->get('IDSELECT') . '\');">
	';if ($_data->is_true($_data->get('C_ADVANCED_AUTH_OPEN'))){$_result.='
	<i id="advanced_auth_plus' . $_data->get('IDSELECT') . '" class="fa fa-minus-square-o"></i>
	';}else{$_result.='
	<i id="advanced_auth_plus' . $_data->get('IDSELECT') . '" class="fa fa-plus-square-o"></i>
	';}$_result.='
	' . $_data->get('L_ADVANCED_AUTHORIZATION') . '
</a>
<br />
<a class="small" href="javascript:check_select_multiple(\'' . $_data->get('IDSELECT') . '\', true);">' . $_data->get('L_SELECT_ALL') . '</a>/<a class="small" href="javascript:check_select_multiple(\'' . $_data->get('IDSELECT') . '\', false);">' . $_data->get('L_SELECT_NONE') . '</a>
<br />
<span class="smaller">(' . $_data->get('L_EXPLAIN_SELECT_MULTIPLE') . ')</span>
<script>
<!--
function check_select_multiple(id, status)
{
	var i;

	//Sélection des groupes.
	var selectidgroups = jQuery(\'#groups_auth\' + id)[0];
	for(i = 0; i < selectidgroups.length; i++)
	{
		if (selectidgroups[i])
			selectidgroups[i].selected = status;
	}
	
	//Sélection des membres.
	var selectidmember = jQuery(\'#members_auth\' + id)[0];
	for(i = 0; i < selectidmember.length; i++)
	{	
		if (selectidmember[i])
			selectidmember[i].selected = status;
	}	
}

function check_select_multiple_ranks(id, start)
{
	var i;			
	for(i = start; i <= 2; i++)
	{	
		if (jQuery(\'#\' + id + i))
			jQuery(\'#\' + id + i)[0].selected = true;
	}
}

//Fonction d\'ajout de membre dans les autorisations.
function XMLHttpRequest_add_member_auth(searchid, user_id, login, alert_already_auth)
{
    var selectid = jQuery(\'#members_auth\' + searchid)[0];
    for(var i = 0; i < selectid.length; i++) //Vérifie que le membre n\'est pas déjà dans la liste.
    {
        if (selectid[i].value == user_id)
        {
            alert(alert_already_auth);
            return;
        }
    }
    var oOption = new Option(login, user_id);
    oOption.id = searchid + \'m\' + (selectid.length - 1);
        oOption.selected = true;

    if (jQuery(\'#members_auth\' + searchid)) //Ajout du membre.
        jQuery(\'#members_auth\' + searchid)[0].options[selectid.length] = oOption;
}

function open_advanced_auth(id) {
	jQuery(\'#advanced_auth\' + id).fadeToggle(300, function(){
		if (jQuery(this).css(\'display\') == \'block\'){
			jQuery(\'#advanced_auth_plus\' + id)[0].className = \'fa fa-minus-square-o\';
		}
		else{
			jQuery(\'#advanced_auth_plus\' + id)[0].className = \'fa fa-plus-square-o\';
			
		}
	});
	jQuery(\'#advanced_authb\' + id).fadeToggle();
}
-->
</script>
'; ?>