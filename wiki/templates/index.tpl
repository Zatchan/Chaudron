		<section id="module-wiki">					
			<header>
				<h1>
					<a href="${relative_url(SyndicationUrlBuilder::rss('wiki'))}" title="${LangLoader::get_message('syndication', 'common')}" class="fa fa-syndication"></a>
					{TITLE}
				</h1>
			</header>
			<div class="content">
				# INCLUDE wiki_tools #
				<br /><br />
				{INDEX_TEXT}
				<br />
				# START cat_list #
					<hr /><br />
					<strong><em>{cat_list.L_CATS}</em></strong>
					<br /><br />
					# START cat_list.list #
						<i class="fa fa-folder"></i> <a href="{PATH_TO_ROOT}/wiki/{cat_list.list.U_CAT}">{cat_list.list.CAT}</a><br />
					# END cat_list.list #
					{L_NO_CAT}
				# END cat_list #
				<br /><br />
				<div class="options">
					<a href="{PATH_TO_ROOT}/wiki/{U_EXPLORER}" title="{L_EXPLORER}">
						<i class="fa fa-folder-open"></i>
						{L_EXPLORER}
					</a>
				</div>
				<br />
				# START last_articles #
				<hr /><br />
				<div class="table-container last-articles-container">
					<div class="table-head last-articles-top"># IF last_articles.C_ARTICLES #<a href="${relative_url(SyndicationUrlBuilder::rss('wiki'))}" class="fa fa-syndication" title="${LangLoader::get_message('syndication', 'common')}"></a> # ENDIF #<strong><em>{last_articles.L_ARTICLES}</em></strong></div>
					<div class="table-content last-articles-content">
							# START last_articles.list #
								<div class="table-element-container last-articles-element-container">
									<a href="{PATH_TO_ROOT}/wiki/{last_articles.list.U_ARTICLE}" class="last-articles-element"><i class="fa fa-file-text"></i>{last_articles.list.ARTICLE}</a>
								</div>
							# END last_articles.list #
							{L_NO_ARTICLE}
					</div>
					<div class="table-footer last-articles-bottom"></div>
				</div>
				# END last_articles #
			</div>
			<footer></footer>
		</section>
		
