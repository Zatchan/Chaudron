<?php $_result='<section id="module-articles">
	<header>
		<h1>
			<a href="' . $_functions->relative_url(SyndicationUrlBuilder::rss('articles', $_data->get('ID_CAT'))) . '" title="' . LangLoader::get_message('syndication', 'common') . '"><i class="fa fa-syndication"></i></a>
			';if ($_data->is_true($_data->get('C_PENDING'))){$_result.='' . $_functions->i18n('articles.pending_articles') . '';}else{$_result.='' . $_functions->i18n('articles') . '';if (!$_data->is_true($_data->get('C_ROOT_CATEGORY'))){$_result.=' - ' . $_data->get('CATEGORY_NAME') . '';}$_result.='';}$_result.=' ';if ($_data->is_true($_data->get('C_CATEGORY'))){$_result.='';if ($_data->is_true($_data->get('IS_ADMIN'))){$_result.='<a href="' . $_data->get('U_EDIT_CATEGORY') . '" title="' . LangLoader::get_message('edit', 'common') . '"><i class="fa fa-edit smaller"></i></a>';}$_result.='';}$_result.='
		</h1>
		';if ($_data->is_true($_data->get('C_CATEGORY_DESCRIPTION'))){$_result.='
			<div class="cat-description">
				' . $_data->get('CATEGORY_DESCRIPTION') . '
			</div>
		';}$_result.='
	</header>
	
	';if ($_data->is_true($_data->get('C_SUB_CATEGORIES'))){$_result.='
	<div class="subcat-container elements-container';if ($_data->is_true($_data->get('C_SEVERAL_CATS_COLUMNS'))){$_result.=' columns-' . $_data->get('NUMBER_CATS_COLUMNS') . '';}$_result.='">
		';foreach($_data->get_block('sub_categories_list') as $_tmp_sub_categories_list){$_result.='
		<div class="subcat-element block">
			<div class="subcat-content">
				';if ($_data->is_true($_data->get('C_DISPLAY_CATS_ICON'))){$_result.='
				';if ($_data->is_true($_data->get_from_list('C_CATEGORY_IMAGE', $_tmp_sub_categories_list))){$_result.='<a itemprop="about" href="' . $_data->get_from_list('U_CATEGORY', $_tmp_sub_categories_list) . '"><img itemprop="thumbnailUrl" src="' . $_data->get_from_list('CATEGORY_IMAGE', $_tmp_sub_categories_list) . '" alt="' . $_data->get_from_list('CATEGORY_NAME', $_tmp_sub_categories_list) . '" /></a>';}$_result.='
				<br />
				';}$_result.='
				<a itemprop="about" href="' . $_data->get_from_list('U_CATEGORY', $_tmp_sub_categories_list) . '">' . $_data->get_from_list('CATEGORY_NAME', $_tmp_sub_categories_list) . '</a>
				<br />
				<span class="small">' . $_data->get_from_list('ARTICLES_NUMBER', $_tmp_sub_categories_list) . ' ';if ($_data->is_true($_data->get_from_list('C_MORE_THAN_ONE_ARTICLE', $_tmp_sub_categories_list))){$_result.='' . TextHelper::lcfirst(LangLoader::get_message('articles', 'common', 'articles')) . '';}else{$_result.='' . TextHelper::lcfirst(LangLoader::get_message('article', 'common', 'articles')) . '';}$_result.='</span>
			</div>
		</div>
		';}$_result.='
	</div>
	';if ($_data->is_true($_data->get('C_SUBCATEGORIES_PAGINATION'))){$_result.='<span class="center">';$_subtpl=$_data->get('SUBCATEGORIES_PAGINATION');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='</span>';}$_result.='
	';}$_result.='
	
	
	';if ($_data->is_true($_data->get('C_NO_ARTICLE_AVAILABLE'))){$_result.='
		';if (!$_data->is_true($_data->get('C_HIDE_NO_ITEM_MESSAGE'))){$_result.='
		<div class="center">
			' . LangLoader::get_message('no_item_now', 'common') . '
		</div>
		';}$_result.='
	';}else{$_result.='
		';if ($_data->is_true($_data->get('C_ARTICLES_FILTERS'))){$_result.='
			';$_subtpl=$_data->get('FORM');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.='
		';}$_result.='
		<div class="spacer"></div>
		<div class="content elements-container';if ($_data->is_true($_data->get('C_SEVERAL_COLUMNS'))){$_result.=' columns-' . $_data->get('NUMBER_COLUMNS') . '';}$_result.='">
			';foreach($_data->get_block('articles') as $_tmp_articles){$_result.='
				<article id="article-articles-' . $_data->get_from_list('ID', $_tmp_articles) . '" class="article-articles article-several';if ($_data->is_true($_data->get('C_MOSAIC'))){$_result.=' block';}$_result.='';if ($_data->is_true($_data->get_from_list('C_NEW_CONTENT', $_tmp_articles))){$_result.=' new-content';}$_result.='" itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
					<header>
						<h2>
							<a itemprop="url" href="' . $_data->get_from_list('U_ARTICLE', $_tmp_articles) . '"><span itemprop="name">' . $_data->get_from_list('TITLE', $_tmp_articles) . '</span></a>
							<span class="actions">
								';if ($_data->is_true($_data->get_from_list('C_EDIT', $_tmp_articles))){$_result.='
									<a href="' . $_data->get_from_list('U_EDIT_ARTICLE', $_tmp_articles) . '" title="' . LangLoader::get_message('edit', 'common') . '"><i class="fa fa-edit"></i></a>
								';}$_result.='
								';if ($_data->is_true($_data->get_from_list('C_DELETE', $_tmp_articles))){$_result.='
									<a href="' . $_data->get_from_list('U_DELETE_ARTICLE', $_tmp_articles) . '" title="' . LangLoader::get_message('delete', 'common') . '" data-confirmation="delete-element"><i class="fa fa-delete"></i></a>
								';}$_result.='
							</span>
						</h2>
						
						<div class="more">
							';if ($_data->is_true($_data->get_from_list('C_AUTHOR_DISPLAYED', $_tmp_articles))){$_result.='
								' . LangLoader::get_message('by', 'common') . '
								';if ($_data->is_true($_data->get_from_list('C_AUTHOR_CUSTOM_NAME', $_tmp_articles))){$_result.='
									' . $_data->get_from_list('AUTHOR_CUSTOM_NAME', $_tmp_articles) . '
								';}else{$_result.='
									';if ($_data->is_true($_data->get_from_list('C_AUTHOR_EXIST', $_tmp_articles))){$_result.='<a itemprop="author" href="' . $_data->get_from_list('U_AUTHOR', $_tmp_articles) . '" class="' . $_data->get_from_list('USER_LEVEL_CLASS', $_tmp_articles) . '" ';if ($_data->is_true($_data->get('C_USER_GROUP_COLOR'))){$_result.=' style="color:' . $_data->get_from_list('USER_GROUP_COLOR', $_tmp_articles) . '"';}$_result.='>' . $_data->get_from_list('PSEUDO', $_tmp_articles) . '</a>';}else{$_result.='' . $_data->get_from_list('PSEUDO', $_tmp_articles) . '';}$_result.=',
								';}$_result.='
							';}$_result.=' 
							' . LangLoader::get_message('the', 'common') . ' <time datetime="';if (!$_data->is_true($_data->get_from_list('C_DIFFERED', $_tmp_articles))){$_result.='' . $_data->get_from_list('DATE_ISO8601', $_tmp_articles) . '';}else{$_result.='' . $_data->get_from_list('PUBLISHING_START_DATE_ISO8601', $_tmp_articles) . '';}$_result.='" itemprop="datePublished">';if (!$_data->is_true($_data->get_from_list('C_DIFFERED', $_tmp_articles))){$_result.='' . $_data->get_from_list('DATE', $_tmp_articles) . '';}else{$_result.='' . $_data->get_from_list('PUBLISHING_START_DATE', $_tmp_articles) . '';}$_result.='</time>
							' . TextHelper::lcfirst(LangLoader::get_message('in', 'common')) . ' <a itemprop="about" href="' . $_data->get_from_list('U_CATEGORY', $_tmp_articles) . '">' . $_data->get_from_list('CATEGORY_NAME', $_tmp_articles) . '</a>
						</div>
						
						<meta itemprop="url" content="' . $_data->get_from_list('U_ARTICLE', $_tmp_articles) . '">
						<meta itemprop="description" content="' . $_functions->escape($_data->get_from_list('DESCRIPTION', $_tmp_articles)) . '"/>
						<meta itemprop="discussionUrl" content="' . $_data->get_from_list('U_COMMENTS', $_tmp_articles) . '">
						<meta itemprop="interactionCount" content="' . $_data->get_from_list('NUMBER_COMMENTS', $_tmp_articles) . ' UserComments">
						
					</header>

					<div class="content">
						';if ($_data->is_true($_data->get_from_list('C_HAS_PICTURE', $_tmp_articles))){$_result.='<a href="' . $_data->get_from_list('U_ARTICLE', $_tmp_articles) . '"><img itemprop="thumbnailUrl" src="' . $_data->get_from_list('PICTURE', $_tmp_articles) . '" alt="' . $_data->get_from_list('TITLE', $_tmp_articles) . '" /></a>';}$_result.='
						<div itemprop="text">' . $_data->get_from_list('DESCRIPTION', $_tmp_articles) . '';if ($_data->is_true($_data->get_from_list('C_READ_MORE', $_tmp_articles))){$_result.='... <a href="' . $_data->get_from_list('U_ARTICLE', $_tmp_articles) . '" class="read-more">[' . LangLoader::get_message('read-more', 'common') . ']</a>';}$_result.='</div>
					</div>

					';if ($_data->is_true($_data->get_from_list('C_SOURCES', $_tmp_articles))){$_result.='
					<div class="spacer"></div>
					<aside>
					<div id="articles-sources-container">
						<span>' . LangLoader::get_message('form.sources', 'common') . '</span> :
						';foreach($_data->get_block_from_list('sources', $_tmp_articles) as $_tmp_articles_sources){$_result.='
						<a itemprop="isBasedOnUrl" href="' . $_data->get_from_list('URL', $_tmp_articles_sources) . '" class="small">' . $_data->get_from_list('NAME', $_tmp_articles_sources) . '</a>';if ($_data->is_true($_data->get_from_list('C_SEPARATOR', $_tmp_articles_sources))){$_result.=', ';}$_result.='
						';}$_result.='
					</div>
					</aside>
					';}$_result.='
					
					<footer></footer>
				</article>
			';}$_result.='
		</div>
	';}$_result.='
		<div class="spacer"></div>
	<footer>';if ($_data->is_true($_data->get('C_PAGINATION'))){$_result.=' ';$_subtpl=$_data->get('PAGINATION');if($_subtpl !== null){$_result.=$_subtpl->render();}$_result.=' ';}$_result.='</footer>
</section>
'; ?>