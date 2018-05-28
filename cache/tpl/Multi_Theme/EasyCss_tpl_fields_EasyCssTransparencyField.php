<?php $_result='<div class="easycss-element">
    <label for="' . $_functions->escape($_data->get('NAME')) . '">' . $_data->get('LABEL') . '</label>
    <input type="number" min="0" max="1" step="0.05" name="' . $_functions->escape($_data->get('NAME')) . '" 
       id="' . $_functions->escape($_data->get('HTML_ID')) . '" value="' . $_data->get('VALUE') . '" class="form-field-decimal" />
</div>'; ?>