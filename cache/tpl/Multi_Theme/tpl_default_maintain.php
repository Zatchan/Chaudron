<?php $_result='';if ($_data->is_true($_data->get('C_MAINTAIN_DELAY'))){$_result.='
	';if ($_data->is_true($_data->get('C_ALERT_MAINTAIN'))){$_result.='
	<div id="message-maintain">
		<div class="warning message-helper-small">
			' . $_data->get('L_MAINTAIN_DELAY') . '
			<div id="release">' . $_data->get('L_LOADING') . '...</div>	
		</div>
	</div>
	';}$_result.='
	
	<script>
	<!--
		var release_timeout_seconds = 0;
		function release(year, month, day, hour, minute, second)
		{
			if (document.getElementById(\'release\'))
			{
				var sp_day = 86400;
				var sp_hour = 3600;
				var sp_minute = 60;
				
				now = new Date(' . $_data->get('MAINTAIN_NOW_FORMAT') . '+release_timeout_seconds++);
				end = new Date(year, month, day, hour, minute, second);
				release_time = (end.getTime() - now.getTime())/1000;
				
				if( release_time <= 0 )
				{
					document.location.reload();
					release_time = \'0\';
				}
				else
					timeout = setTimeout(\'release(\'+year+\', \'+month+\', \'+day+\', \'+hour+\', \'+minute+\', \'+second+\')\', 1000);
				
				release_days = Math.floor(release_time/sp_day);
				release_time -= (release_days * sp_day);
				
				release_hours = Math.floor(release_time/sp_hour);
				release_time -= (release_hours * sp_hour);
		
				release_minutes = Math.floor(release_time/sp_minute);
				release_time -= (release_minutes * sp_minute);
		
				release_seconds = Math.floor(release_time);
				release_seconds = (release_seconds < 10) ? \'0\' + release_seconds : release_seconds;
				
				document.getElementById(\'release\').innerHTML = \'<strong>\' + release_days + \'</strong> ' . $_data->get('L_DAYS') . ' <strong>\' + release_hours + \'</strong> ' . $_data->get('L_HOURS') . ' <strong>\' + release_minutes + \'</strong> ' . $_data->get('L_MIN') . ' <strong>\' + release_seconds + \'</strong> ' . $_data->get('L_SEC') . '\';
			}
		}
		if (' . $_data->get('UNSPECIFIED') . ')
			release(' . $_data->get('MAINTAIN_RELEASE_FORMAT') . ');
		else
		{
			if (document.getElementById(\'release\'))
				document.getElementById(\'release\').innerHTML = \'<strong>' . $_data->get('DELAY') . '</strong>\';
		}
	-->
	</script>
';}$_result.=''; ?>