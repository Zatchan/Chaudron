<?php $_result='';if ($_data->is_true($_data->get('C_USER_NOTCONNECTED'))){$_result.='
	<script>
	<!--
	function check_connect()
	{
		if( document.getElementById(\'login\').value == "" )
		{
			alert("' . $_data->get('L_REQUIRE_PSEUDO') . '");
			return false;
		}
		if( document.getElementById(\'password\').value == "" )
		{
			alert("' . $_data->get('L_REQUIRE_PASSWORD') . '");
			return false;
		}
	}
	-->
	</script>
';}$_result.='
<script>
	<!--
	function open_submenu(myid)
	{
		jQuery(\'#\' + myid).toggleClass(\'active\');
	}
	-->
</script>

<div id="module-connect" class="connect-menu';if ($_data->is_true($_data->get('C_USER_NOTCONNECTED'))){$_result.=' not-connected';}else{$_result.=' connected';}$_result.='';if ($_data->is_true($_data->get('C_VERTICAL'))){$_result.=' module-mini-container vertical';}else{$_result.=' horizontal';}$_result.='">
	';if ($_data->is_true($_data->get('C_USER_NOTCONNECTED'))){$_result.='

		';if ($_data->is_true($_data->get('C_VERTICAL'))){$_result.='
		<div class="module-mini-top">
			<div class="sub-title">' . $_functions->i18n('connection') . '</div>
		</div>
		<div class="module-mini-contents connect-contents">
		';}else{$_result.='
		<div class="connect-contents">
			<a href="" class="js-menu-button" onclick="open_submenu(\'module-connect\');return false;"><i class="fa fa-sign-in"></i><span>' . $_functions->i18n('connection') . '</span></a>
		';}$_result.='
			<div class="connect-containers">
				<div class="connect-input-container';if ($_data->is_true($_data->get('C_VERTICAL'))){$_result.=' vertical-fieldset';}else{$_result.=' horizontal-fieldset';}$_result.='" >
					<form action="' . $_data->get('U_CONNECT') . '" method="post" onsubmit="return check_connect();" class="form-element">
						<label for="login">
							<span>' . $_functions->i18n('login') . '</span>
							<input type="text" id="login" name="login" title="' . $_functions->i18n('login') . '" placeholder="' . $_functions->i18n('login') . '">
						</label>
						<label for="password">
							<span>' . $_functions->i18n('password') . '</span>
							<input type="password" id="password" name="password" title="' . $_functions->i18n('password') . '" placeholder="' . $_functions->i18n('password') . '">
						</label>
						<label for="autoconnect">
							<span>' . $_functions->i18n('autoconnect') . '</span>
							<input checked="checked" type="checkbox" id="autoconnect" name="autoconnect" title="' . $_functions->i18n('autoconnect') . '">
						</label>
						<input type="hidden" name="redirect" value="' . $_data->get('SITE_REWRITED_SCRIPT') . '">
						<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
						<button type="submit" name="authenticate" value="internal" class="submit">' . $_functions->i18n('connection') . '</button>
					</form>
				</div>
				
				';if ($_data->is_true($_data->get('C_USER_REGISTER'))){$_result.='
				<div class="connect-register-container">
					';if ($_data->is_true($_data->get('C_VERTICAL'))){$_result.='
					<a class="connect-register small" href="' . $_functions->relative_url(UserUrlBuilder::registration()) . '">
						<i class="fa fa-ticket"></i><span>' . $_functions->i18n('register') . '</span>
					</a>
					';}else{$_result.='
					<form action="' . $_functions->relative_url(UserUrlBuilder::registration()) . '" method="post">
						<button type="submit" name="register" value="true" class="submit">' . $_functions->i18n('register') . '</button>
						<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
					</form>
					';}$_result.='
					';if ($_data->is_true($_data->get('C_FB_AUTH_ENABLED'))){$_result.='
					<a class="social-connect fb" href="' . $_functions->relative_url(UserUrlBuilder::connect('fb')) . '">
						<i class="fa fa-facebook"></i><span>' . LangLoader::get_message('facebook-connect', 'user-common') . '</span>
					</a>
					';}$_result.='
					';if ($_data->is_true($_data->get('C_GOOGLE_AUTH_ENABLED'))){$_result.='
					<a class="social-connect google" href="' . $_functions->relative_url(UserUrlBuilder::connect('google')) . '">
						<i class="fa fa-google-plus"></i><span>' . LangLoader::get_message('google-connect', 'user-common') . '</span>
					</a>
					';}$_result.='
				</div>
				';}$_result.='
				<div class="forget-pass-container">
					<a class="forgot-pass small" href="' . $_functions->relative_url(UserUrlBuilder::forget_password()) . '">
						<i class="fa fa-question-circle"></i><span>' . LangLoader::get_message('forget-password', 'user-common') . '</span>
					</a>
				</div>
			</div>
		</div>
		';if ($_data->is_true($_data->get('C_VERTICAL'))){$_result.='
		<div class="module-mini-bottom">
		</div> 
		';}$_result.='

	';}else{$_result.=' <!-- User Connected -->

		';if ($_data->is_true($_data->get('C_VERTICAL'))){$_result.='
		<div class="module-mini-top">
			<div class="sub-title">' . $_data->get('L_PRIVATE_PROFIL') . '</div>
		</div>
		<div class="module-mini-contents connect-contents">
		';}else{$_result.=' 
		<div class="connect-contents">
			<a href="" class="js-menu-button" onclick="open_submenu(\'module-connect\');return false;" title="' . $_functions->i18n('dashboard') . '">
				<i class="fa fa-bars ';if ($_data->is_true($_data->get('NUMBER_TOTAL_ALERT'))){$_result.=' blink alert';}$_result.='"></i><span>' . $_data->get('L_PRIVATE_PROFIL') . '</span>
			</a>
		';}$_result.='
			<ul class="connect-elements-container">
				<li class="connect-element connect-profil">
					<a href="' . $_functions->relative_url(UserUrlBuilder::home_profile()) . '" class="small">
						<i class="fa fa-profil"></i><span>' . $_functions->i18n('dashboard') . '</span>
					</a>
				</li>
				<li class="connect-element connect-pm';if ($_data->is_true($_data->get('C_HAS_PM'))){$_result.=' connect-event';}$_result.='">
					<a href="' . $_data->get('U_USER_PM') . '" class="small">
						<i class="fa fa-envelope';if ($_data->is_true($_data->get('C_HAS_PM'))){$_result.=' blink';}$_result.='"></i><span>' . $_data->get('L_PM_PANEL') . '</span>';if ($_data->is_true($_data->get('C_HAS_PM'))){$_result.='<span class="blink">(' . $_data->get('NUMBER_PM') . ')</span>';}$_result.='
					</a>
				</li>
				';if ($_data->is_true($_data->get('C_ADMIN_AUTH'))){$_result.='
				<li class="connect-element connect-admin';if ($_data->is_true($_data->get('C_UNREAD_ALERT'))){$_result.=' connect-event';}$_result.='">
					<a href="' . $_functions->relative_url(UserUrlBuilder::administration()) . '" class="small">
						<i class="fa fa-wrench';if ($_data->is_true($_data->get('C_UNREAD_ALERT'))){$_result.=' blink';}$_result.='"></i><span>' . $_data->get('L_ADMIN_PANEL') . '</span>';if ($_data->is_true($_data->get('C_UNREAD_ALERT'))){$_result.='<span class="blink">(' . $_data->get('NUMBER_UNREAD_ALERTS') . ')</span>';}$_result.='
					</a>
				</li>
				';}$_result.='
				';if ($_data->is_true($_data->get('C_MODERATOR_AUTH'))){$_result.='
				<li class="connect-element connect-modo">
					<a href="' . $_functions->relative_url(UserUrlBuilder::moderation_panel()) . '" class="small">
						<i class="fa fa-legal"></i><span>' . $_data->get('L_MODO_PANEL') . '</span>
					</a>
				</li>
				';}$_result.='
				<li class="connect-element connect-contribution';if ($_data->is_true($_data->get('C_UNREAD_CONTRIBUTION'))){$_result.=' connect-event';}$_result.='">
					<a href="' . $_functions->relative_url(UserUrlBuilder::contribution_panel()) . '" class="small">
						<i class="fa fa-file-text';if ($_data->is_true($_data->get('C_UNREAD_CONTRIBUTION'))){$_result.=' blink';}$_result.='"></i><span>' . $_data->get('L_CONTRIBUTION_PANEL') . '</span>';if ($_data->is_true($_data->get('C_UNREAD_CONTRIBUTION'))){$_result.='<span class="blink">(' . $_data->get('NUMBER_UNREAD_CONTRIBUTIONS') . ')</span>';}$_result.='
					</a>
				</li>
				<li class="connect-element connect-disconnect">
					<a href="' . $_functions->relative_url(UserUrlBuilder::disconnect()) . '" class="small">
						<i class="fa fa-sign-out"></i><span>' . $_functions->i18n('disconnect') . '</span>
					</a>
				</li>
			</ul>
		</div>
		';if ($_data->is_true($_data->get('C_VERTICAL'))){$_result.='
		<div class="module-mini-bottom">
		</div>
		';}$_result.='
	';}$_result.='
</div>
'; ?>