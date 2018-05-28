<?php $_result='<div id="admin-contents">
	<form action="auth.php" method="post" class="fieldset-content">
		<fieldset> 
			<legend>' . $_data->get('L_ACTION_MENUS') . '</legend>
			<div class="form-element">
				<label>' . $_data->get('L_NAME') . '</label>
				<div class="form-field"><label>' . $_data->get('NAME') . '</label></div>
			</div>
			<div class="form-element">
				<label for="location">' . $_data->get('L_LOCATION') . '</label>
				<div class="form-field"><select name="location" id="location">' . $_data->get('LOCATIONS') . '</select></div>
			</div>
			<div class="form-element">
				<label for="activ">' . $_data->get('L_STATUS') . '</label>
				<div class="form-field"><label>
					<select name="activ" id="activ">
						<option value="1"';if ($_data->is_true($_data->get('C_ENABLED'))){$_result.=' selected="selected"';}$_result.='>' . $_data->get('L_ENABLED') . '</option>
						<option value="0"';if (!$_data->is_true($_data->get('C_ENABLED'))){$_result.=' selected="selected"';}$_result.='>' . $_data->get('L_DISABLED') . '</option>
					</select>
				</label></div>
			</div>
			<div class="form-element">
				<label for="hidden_with_small_screens">' . $_data->get('L_HIDDEN_WITH_SMALL_SCREENS') . '</label>
				<div class="form-field">
					<div class="form-field-checkbox">
						<input type="checkbox" name="hidden_with_small_screens" id="hidden_with_small_screens"';if ($_data->is_true($_data->get('C_MENU_HIDDEN_WITH_SMALL_SCREENS'))){$_result.=' checked="checked"';}$_result.=' />
						<label for="hidden_with_small_screens"></label>
					</div>
				</div>
			</div>
			<div class="form-element">
				<label for="auth">' . $_data->get('L_AUTHS') . '</label>
				<div class="form-field"><label>' . $_data->get('AUTH_MENUS') . '</label></div>
			</div>
		</fieldset>   
		
		';$_subtpl=$_data->get('filters');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='  

		<fieldset class="fieldset-submit">
			<legend>' . $_data->get('L_ACTION') . '</legend>
			<input type="hidden" name="action" value="' . $_data->get('ACTION') . '">
			<input type="hidden" name="id" value="' . $_data->get('IDMENU') . '">
			<button type="submit" class="submit" name="valid" value="true">' . $_data->get('L_ACTION') . '</button>
			<button type="reset" value="true">' . $_data->get('L_RESET') . '</button>
			<input type="hidden" name="token" value="' . $_data->get('TOKEN') . '">
		</fieldset> 
	</form>
</div>
'; ?>