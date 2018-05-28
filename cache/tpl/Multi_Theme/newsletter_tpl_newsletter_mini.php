<?php $_result='';if ($_data->is_true($_data->get('C_VERTICAL'))){$_result.='
<form action="' . $_data->get('PATH_TO_ROOT') . '/newsletter/?url=/subscribe/" method="post">
	<p>
		<input type="text" name="mail_newsletter" maxlength="50" value="' . $_data->get('USER_MAIL') . '" placeholder="' . LangLoader::get_message('email', 'user-common') . '">
	</p>
	<p>
		<label><input type="radio" name="subscribe" value="subscribe" checked="checked"> ' . $_functions->i18n('newsletter.subscribe_newsletters') . '</label>
		<br />
		<label><input type="radio" name="subscribe" value="unsubscribe"> ' . $_functions->i18n('newsletter.unsubscribe_newsletters') . '</label>
	</p>
	<p>
		<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
		<button type="submit" name="" value="true"><i class="fa fa-envelope-o"></i></button>
	</p>
	<p class="newsletter-link">
		<a href="' . $_functions->relative_url(NewsletterUrlBuilder::archives()) . '" class="small">' . $_functions->i18n('newsletter.archives') . '</a>
	</p>
</form>
';}else{$_result.='
<div id="newsletter"';if ($_data->is_true($_data->get('C_HIDDEN_WITH_SMALL_SCREENS'))){$_result.=' class="hidden-small-screens"';}$_result.='>
	<form action="' . $_data->get('PATH_TO_ROOT') . '/newsletter/?url=/subscribe/" method="post">
		<div class="newsletter-form input-element-button">
			<span class="newsletter-title">' . $_functions->i18n('newsletter') . '</span> 
			<input type="text" name="mail_newsletter" maxlength="50" value="' . $_data->get('USER_MAIL') . '" placeholder="' . LangLoader::get_message('email', 'user-common') . '">
			<input type="hidden" name="subscribe" value="subscribe">
			<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
			<button type="submit" class="newsletter-submit"><i class="fa fa-envelope-o"></i></button>
		</div>
	</form>
</div>
';}$_result.=''; ?>