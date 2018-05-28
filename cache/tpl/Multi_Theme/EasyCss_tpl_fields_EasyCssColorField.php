<?php $_result='<div class="easycss-element">
    <label for="' . $_functions->escape($_data->get('NAME')) . '">' . $_data->get('LABEL') . '</label>
    <input type="color" name="' . $_functions->escape($_data->get('NAME')) . '" id="' . $_functions->escape($_data->get('HTML_ID')) . '" class="form-field-color"
       value="' . $_functions->escape($_data->get('VALUE')) . '" pattern="#[A-Fa-f0-9]{3,6}" placeholder="#000000" />
</div>'; ?>