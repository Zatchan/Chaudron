# IF C_ANY_MESSAGE_GUESTBOOK #
<p># IF C_HORIZONTAL #{CONTENTS}# ELSE #{SHORT_CONTENTS}# IF C_MORE_CONTENTS #... <a href="{U_MESSAGE}" class="small">[${LangLoader::get_message('read-more', 'common')}]</a># ENDIF ## ENDIF #</p>
<p class="small">${LangLoader::get_message('by', 'common')} # IF C_VISITOR #<span class="text-italic"># IF USER_PSEUDO #{USER_PSEUDO}# ELSE #${LangLoader::get_message('visitor', 'user-common')}# ENDIF #</span># ELSE #<a href="{U_PROFILE}" class="{USER_LEVEL_CLASS}" # IF C_USER_GROUP_COLOR # style="color:{USER_GROUP_COLOR}" # ENDIF #>{USER_PSEUDO}</a># ENDIF #</p>
# ELSE #
<p>${LangLoader::get_message('no_item_now', 'common')}</p>
# ENDIF #
<a class="small" href="{U_GUESTBOOK}">{@module_title}</a>
