<?php $_result='<div class="easycss-element">
    <label for="' . $_functions->escape($_data->get('NAME')) . '">' . $_data->get('LABEL') . '</label>
    <input type="checkbox" name="' . $_functions->escape($_data->get('NAME')) . '" 
       id="' . $_functions->escape($_data->get('HTML_ID')) . '" class="form-field-checkbox-mini" ' . $_data->get('CHECKED') . ' />
</div>'; ?>