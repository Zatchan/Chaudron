<?php $_result='<span>' . $_data->get('QUESTION') . '</span>
<div class="spacer"></div>
<input type="text" class="field-large" name="' . $_data->get('HTML_ID') . '" id="' . $_data->get('HTML_ID') . '" />
<input type="hidden" name="' . $_data->get('HTML_ID') . '_question_id" value="' . $_data->get('QUESTION_ID') . '" />
'; ?>