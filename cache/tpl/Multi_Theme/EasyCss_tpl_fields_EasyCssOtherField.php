<?php $_result='<div class="easycss-element">
    <label for="' . $_functions->escape($_data->get('NAME')) . '">' . $_data->get('LABEL') . '</label>
    <input type="text" name="' . $_functions->escape($_data->get('NAME')) . '" 
       id="' . $_functions->escape($_data->get('HTML_ID')) . '" value="' . $_data->get('VALUE') . '" class="form-field-text" />
</div>'; ?>