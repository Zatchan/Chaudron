<?php $_result='<section id="module-news">
	<!--header>
		<h1>
			<a href="' . $_functions->relative_url(SyndicationUrlBuilder::rss('news', $_data->get('ID_CAT'))) . '" title="' . LangLoader::get_message('syndication', 'common') . '"><i class="fa fa-syndication"></i></a>
			';if ($_data->is_true($_data->get('C_PENDING_NEWS'))){$_result.='' . $_functions->i18n('news.pending') . '';}else{$_result.='' . $_functions->i18n('news') . '';if (!$_data->is_true($_data->get('C_ROOT_CATEGORY'))){$_result.=' - ' . $_data->get('CATEGORY_NAME') . '';}$_result.='';}$_result.=' ';if ($_data->is_true($_data->get('C_CATEGORY'))){$_result.='';if ($_data->is_true($_data->get('IS_ADMIN'))){$_result.='<a href="' . $_data->get('U_EDIT_CATEGORY') . '" title="' . LangLoader::get_message('edit', 'common') . '"><i class="fa fa-edit smaller"></i></a>';}$_result.='';}$_result.='
		</h1>
	</header-->

	<div class="content elements-container';if ($_data->is_true($_data->get('C_SEVERAL_COLUMNS'))){$_result.=' columns-' . $_data->get('NUMBER_COLUMNS') . '';}$_result.='">
	';if ($_data->is_true($_data->get('C_NEWS_NO_AVAILABLE'))){$_result.='
		<div class="center">
			' . LangLoader::get_message('no_item_now', 'common') . '
		</div>
	';}else{$_result.='
		';foreach($_data->get_block('news') as $_tmp_news){$_result.='
			<article id="article-news-' . $_data->get_from_list('ID', $_tmp_news) . '" class="article-news article-several';if ($_data->is_true($_data->get_from_list('C_TOP_LIST', $_tmp_news))){$_result.=' top-list';}$_result.='';if ($_data->is_true($_data->get('C_DISPLAY_BLOCK_TYPE'))){$_result.=' block';}$_result.='';if ($_data->is_true($_data->get_from_list('C_NEW_CONTENT', $_tmp_news))){$_result.=' new-content';}$_result.='" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
				<header>
					<h2>
						<a href="' . $_data->get_from_list('U_LINK', $_tmp_news) . '"><span itemprop="name">' . $_data->get_from_list('NAME', $_tmp_news) . '</span></a>
						<span class="actions">
							';if ($_data->is_true($_data->get_from_list('C_EDIT', $_tmp_news))){$_result.='
								<a href="' . $_data->get_from_list('U_EDIT', $_tmp_news) . '" title="' . LangLoader::get_message('edit', 'common') . '"><i class="fa fa-edit"></i></a>
							';}$_result.='
							';if ($_data->is_true($_data->get_from_list('C_DELETE', $_tmp_news))){$_result.='
								<a href="' . $_data->get_from_list('U_DELETE', $_tmp_news) . '" title="' . LangLoader::get_message('delete', 'common') . '" data-confirmation="delete-element"><i class="fa fa-delete"></i></a>
							';}$_result.='
						</span>
					</h2>

					<div class="more">
						';if ($_data->is_true($_data->get_from_list('C_AUTHOR_DISPLAYED', $_tmp_news))){$_result.='
							' . LangLoader::get_message('by', 'common') . '
							';if ($_data->is_true($_data->get_from_list('C_AUTHOR_CUSTOM_NAME', $_tmp_news))){$_result.='
								' . $_data->get_from_list('AUTHOR_CUSTOM_NAME', $_tmp_news) . '
							';}else{$_result.='
								';if ($_data->is_true($_data->get_from_list('C_AUTHOR_EXIST', $_tmp_news))){$_result.='<a itemprop="author" class="' . $_data->get_from_list('USER_LEVEL_CLASS', $_tmp_news) . '" href="' . $_data->get_from_list('U_AUTHOR_PROFILE', $_tmp_news) . '"';if ($_data->is_true($_data->get_from_list('C_USER_GROUP_COLOR', $_tmp_news))){$_result.=' style="color:' . $_data->get_from_list('USER_GROUP_COLOR', $_tmp_news) . '"';}$_result.='>' . $_data->get_from_list('PSEUDO', $_tmp_news) . '</a>, ';}else{$_result.='' . $_data->get_from_list('PSEUDO', $_tmp_news) . '';}$_result.='
							';}$_result.='
						';}$_result.='
						' . TextHelper::lcfirst(LangLoader::get_message('the', 'common')) . ' <time datetime="';if (!$_data->is_true($_data->get_from_list('C_DIFFERED', $_tmp_news))){$_result.='' . $_data->get_from_list('DATE_ISO8601', $_tmp_news) . '';}else{$_result.='' . $_data->get_from_list('DIFFERED_START_DATE_ISO8601', $_tmp_news) . '';}$_result.='" itemprop="datePublished">';if (!$_data->is_true($_data->get_from_list('C_DIFFERED', $_tmp_news))){$_result.='' . $_data->get_from_list('DATE', $_tmp_news) . '';}else{$_result.='' . $_data->get_from_list('DIFFERED_START_DATE', $_tmp_news) . '';}$_result.='</time>
						' . TextHelper::lcfirst(LangLoader::get_message('in', 'common')) . ' <a itemprop="about" href="' . $_data->get_from_list('U_CATEGORY', $_tmp_news) . '">' . $_data->get_from_list('CATEGORY_NAME', $_tmp_news) . '</a>
						';if ($_data->is_true($_data->get('C_COMMENTS_ENABLED'))){$_result.='- ';if ($_data->is_true($_data->get_from_list('C_COMMENTS', $_tmp_news))){$_result.=' ' . $_data->get_from_list('NUMBER_COMMENTS', $_tmp_news) . ' ';}$_result.=' ' . $_data->get_from_list('L_COMMENTS', $_tmp_news) . '';}$_result.='
						';if ($_data->is_true($_data->get_from_list('C_NB_VIEW_ENABLED', $_tmp_news))){$_result.='- <span title="' . $_data->get_from_list('NUMBER_VIEW', $_tmp_news) . ' ' . $_functions->i18n('news.view') . '"><i class="fa fa-eye"></i> ' . $_data->get_from_list('NUMBER_VIEW', $_tmp_news) . '</span> ';}$_result.='
					</div>

					<meta itemprop="url" content="' . $_data->get_from_list('U_LINK', $_tmp_news) . '">
					<meta itemprop="description" content="' . $_functions->escape($_data->get_from_list('DESCRIPTION', $_tmp_news)) . '"/>
					';if ($_data->is_true($_data->get('C_COMMENTS_ENABLED'))){$_result.='
					<meta itemprop="discussionUrl" content="' . $_data->get_from_list('U_COMMENTS', $_tmp_news) . '">
					<meta itemprop="interactionCount" content="' . $_data->get_from_list('NUMBER_COMMENTS', $_tmp_news) . ' UserComments">
					';}$_result.='

				</header>

				<div class="content">
					';if ($_data->is_true($_data->get_from_list('C_PICTURE', $_tmp_news))){$_result.='<a href="' . $_data->get_from_list('U_LINK', $_tmp_news) . '" class="news-picture"><img itemprop="thumbnailUrl" src="' . $_data->get_from_list('U_PICTURE', $_tmp_news) . '" alt="' . $_data->get_from_list('NAME', $_tmp_news) . '" title="' . $_data->get_from_list('NAME', $_tmp_news) . '" /> </a>';}$_result.='
					<div itemprop="text">';if ($_data->is_true($_data->get('C_DISPLAY_CONDENSED_CONTENT'))){$_result.=' ' . $_data->get_from_list('DESCRIPTION', $_tmp_news) . '';if ($_data->is_true($_data->get_from_list('C_READ_MORE', $_tmp_news))){$_result.='... <a href="' . $_data->get_from_list('U_LINK', $_tmp_news) . '">[' . LangLoader::get_message('read-more', 'common') . ']</a>';}$_result.='';}else{$_result.=' ' . $_data->get_from_list('CONTENTS', $_tmp_news) . ' ';}$_result.='</div>
				</div>
				
				';if ($_data->is_true($_data->get_from_list('C_SOURCES', $_tmp_news))){$_result.='
				<div class="spacer"></div>
				<aside>
				<div id="news-sources-container">
					<span>' . LangLoader::get_message('form.sources', 'common') . '</span> :
					';foreach($_data->get_block_from_list('sources', $_tmp_news) as $_tmp_news_sources){$_result.='
					<a itemprop="isBasedOnUrl" href="' . $_data->get_from_list('URL', $_tmp_news_sources) . '" class="small">' . $_data->get_from_list('NAME', $_tmp_news_sources) . '</a>';if ($_data->is_true($_data->get_from_list('C_SEPARATOR', $_tmp_news_sources))){$_result.=', ';}$_result.='
					';}$_result.='
				</div>
				</aside>
				';}$_result.='

				<footer></footer>
			</article>
		';}$_result.='
	';}$_result.='
	</div>
	<footer>';if ($_data->is_true($_data->get('C_PAGINATION'))){$_result.=' ';$_subtpl=$_data->get('PAGINATION');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.=' ';}$_result.='</footer>
</section>
'; ?>