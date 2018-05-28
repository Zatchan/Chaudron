<?php $_result='<p>
	' . $_data->get('L_USER_REGISTERED') . '
</p>
<p>
	' . $_data->get('L_LAST_REGISTERED_USER') . ':
	<br /> 
	' . $_data->get('U_LINK_LAST_USER') . '
</p>
<a href="' . $_data->get('PATH_TO_ROOT') . '/stats/stats.php" class="small">' . $_data->get('L_MORE_STAT') . '</a>
'; ?>