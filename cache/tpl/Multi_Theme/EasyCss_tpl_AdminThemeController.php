<?php $_result='		<nav id="admin-quick-menu">
                    <a href="" class="js-menu-button" onclick="open_submenu(\'admin-quick-menu\');return false;" title="' . $_functions->i18n('module_title') . '">
                        <i class="fa fa-bars"></i> ' . $_functions->i18n('module_title') . '
                    </a>
                    <ul>
                        <li>
                            <a href="' . $_functions->relative_url(EasyCssUrlBuilder::theme_choice()) . '" class="quick-link">' . $_functions->i18n('theme_choice') . '</a>
                        </li>
                    </ul>	
		</nav>
		
		<div id="admin-contents">
                    ' . $_functions->i18n('module_title') . '
                    <ul class="tabs">	
                    ';foreach($_data->get_block('themes') as $_tmp_themes){$_result.='
                        <li class="';if ($_data->is_true($_data->get_from_list('DEFAULT', $_tmp_themes))){$_result.=' current ';}$_result.='" data-tab="tab-' . $_data->get_from_list('NAME', $_tmp_themes) . '">' . $_data->get_from_list('NAME', $_tmp_themes) . '</li>                    
                    ';}$_result.='
                    </ul>
                    	
                    ';foreach($_data->get_block('themes') as $_tmp_themes){$_result.='
                    <div id="tab-' . $_data->get_from_list('NAME', $_tmp_themes) . '" class="tab-content ';if ($_data->is_true($_data->get_from_list('DEFAULT', $_tmp_themes))){$_result.=' current ';}$_result.='">
                    ';foreach($_data->get_block_from_list('css', $_tmp_themes) as $_tmp_themes_css){$_result.='
                        <a href="' . $_data->get_from_list('URL', $_tmp_themes_css) . '">' . $_data->get_from_list('NAME', $_tmp_themes_css) . '</a></br>
                    ';}$_result.='
                    </div>
                    ';}$_result.='
                </div>
                    
                <script>
                    $(document).ready(function(){
                        $(\'ul.tabs li\').click(function(){
                            var tab_id = $(this).attr(\'data-tab\');
                                $(\'ul.tabs li\').removeClass(\'current\');
                                $(\'.tab-content\').removeClass(\'current\');
                                $(this).addClass(\'current\');
                                $("#"+tab_id).addClass(\'current\');
                        });
                    });
                </script>'; ?>