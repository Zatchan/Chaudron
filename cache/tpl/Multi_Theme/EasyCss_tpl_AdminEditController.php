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
		
                ';$_subtpl=$_data->get('MSG');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
                        
		<div id="admin-contents">
                    <fieldset>
                        <legend>' . $_data->get('FIELDSET_LEGEND') . '</legend>
                        ';foreach($_data->get_block('errors') as $_tmp_errors){$_result.='  
                        <div class="error">
                            ';$_subtpl=$_data->get_from_list('SUBTEMPLATE', $_tmp_errors);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.=' 
                        </div>
                        ';}$_result.='
                        
                        <div class="fieldset-inset">
                            <p class="fieldset-description">' . $_functions->i18n('edit_description') . '</p>


                            <form id="AdminEasyCssEditController" method="post" class="fieldset-content">
                                ';foreach($_data->get_block('elements') as $_tmp_elements){$_result.='  
                                    ';$_subtpl=$_data->get_from_list('SUBTEMPLATE', $_tmp_elements);if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.=' 
                                ';}$_result.='


                                <input id="AdminEasyCssEditController_elements_fields" name="AdminEasyCssEditController_elements_fields" value="' . $_data->get('ELEMENTS_FIELDS') . '" type="hidden">
                                <input id="AdminEasyCssEditController_token" name="token" value="' . $_data->get('TOKEN') . '" type="hidden">
                                <fieldset id="AdminEasyCssEditController_fbuttons" class="fieldset-submit">
                                    <div class="fieldset-inset">
                                        <button type="submit" name="AdminEasyCssEditController_submit" class="submit" onclick="" value="true">Envoyer</button>
                                        <button type="reset" value="true">Défaut</button>
                                    </div>
                                </fieldset>
                            </form>


                            ';$_subtpl=$_data->get('FORM');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
                        </div>
                    </fieldset>
                </div>
                    
'; ?>