<?php
/*##################################################
 *		       ArticlesDisplayArticlesController.class.php
 *                            -------------------
 *   begin                : April 03, 2013
 *   copyright            : (C) 2013 Patrick DUBEAU
 *   email                : daaxwizeman@gmail.com
 *
 *
 ###################################################
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 ###################################################*/

class ArticlesDisplayArticlesController extends ModuleController
{
	private $lang;
	private $tpl;
	private $article;
	private $category;
	
	public function execute(HTTPRequestCustom $request)
	{
		$this->check_authorizations();
		
		$this->init();
		
		$this->check_pending_article($request);
		
		$this->build_view($request);
		
		return $this->generate_response();
	}
	
	private function init()
	{
		$this->lang = LangLoader::get('common', 'articles');
		$this->tpl = new FileTemplate('articles/ArticlesDisplayArticlesController.tpl');
		$this->tpl->add_lang($this->lang);
	}
	
	private function get_article()
	{
		if ($this->article === null)
		{
			$id = AppContext::get_request()->get_getint('id', 0);
			if (!empty($id))
			{
				try 
				{
					$this->article = ArticlesService::get_article('WHERE articles.id=:id', array('id' => $id));
				} 
				catch (RowNotFoundException $e) 
				{
					$error_controller = PHPBoostErrors::unexisting_page();
   					DispatchManager::redirect($error_controller);
				}
			}
			else
				$this->article = new Article();
		}
		return $this->article;
	}
	
	private function check_pending_article(HTTPRequestCustom $request)
	{
		if (!$this->article->is_published())
		{
			$this->tpl->put('NOT_VISIBLE_MESSAGE', MessageHelper::display(LangLoader::get_message('element.not_visible', 'status-messages-common'), MessageHelper::WARNING));
		}
		else
		{
			if ($request->get_url_referrer() && !TextHelper::strstr($request->get_url_referrer(), ArticlesUrlBuilder::display_article($this->article->get_category()->get_id(), $this->article->get_category()->get_rewrited_name(), $this->article->get_id(), $this->article->get_rewrited_title())->rel()))
			{
				$this->article->set_number_view($this->article->get_number_view() + 1);
				ArticlesService::update_number_view($this->article);
			}
		}
	}
	
	private function build_view(HTTPRequestCustom $request)
	{
		$current_page = $request->get_getint('page', 1);
		$config = ArticlesConfig::load();
		$comments_config = new ArticlesComments();
		$notation_config = new ArticlesNotation();
		
		$this->category = $this->article->get_category();
		
		$article_contents = $this->article->get_contents();
		
		//If article doesn't begin with a page, we insert one
		if (TextHelper::substr(trim($article_contents), 0, 6) != '[page]')
		{
			$article_contents = '[page]&nbsp;[/page]' . $article_contents;
		}
		
		//Removing [page] bbcode
		$article_contents_clean = preg_split('`\[page\].+\[/page\](.*)`usU', $article_contents, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
		
		//Retrieving pages 
		preg_match_all('`\[page\]([^[]+)\[/page\]`uU', $article_contents, $array_page);

		$nbr_pages = count($array_page[1]);
		
		if ($nbr_pages > 1)
			$this->build_form($array_page, $current_page);
		
		$this->build_sources_view();
		
		$this->build_keywords_view();
		
		$page_name = (isset($array_page[1][$current_page-1]) && $array_page[1][$current_page-1] != '&nbsp;') ? $array_page[1][($current_page-1)] : '';

		$this->tpl->put_all(array_merge($this->article->get_array_tpl_vars(), array(
			'C_COMMENTS_ENABLED' => $comments_config->are_comments_enabled(),
			'C_NOTATION_ENABLED' => $notation_config->is_notation_enabled(),
			'KERNEL_NOTATION'    => NotationService::display_active_image($this->article->get_notation()),
			'CONTENTS'           => isset($article_contents_clean[$current_page-1]) ? FormatingHelper::second_parse($article_contents_clean[$current_page-1]) : '',
			'PAGE_NAME'          => $page_name,
			'U_EDIT_ARTICLE'     => $page_name !== '' ? ArticlesUrlBuilder::edit_article($this->article->get_id(), $current_page)->rel() : ArticlesUrlBuilder::edit_article($this->article->get_id())->rel()
		)));
		
		$this->build_pages_pagination($current_page, $nbr_pages, $array_page);
		
		//Affichage commentaires
		if ($comments_config->are_comments_enabled())
		{
			$comments_topic = new ArticlesCommentsTopic($this->article);
			$comments_topic->set_id_in_module($this->article->get_id());
			$comments_topic->set_url(ArticlesUrlBuilder::display_article($this->category->get_id(), $this->category->get_rewrited_name(), $this->article->get_id(), $this->article->get_rewrited_title()));

			$this->tpl->put('COMMENTS', $comments_topic->display());
		}
	}
	
	private function build_form($array_page, $current_page)
	{
		$form = new HTMLForm(__CLASS__, '', false);
		$form->set_css_class('options');
		
		$fieldset = new FormFieldsetHorizontal('pages', array('description' => $this->lang['articles.summary']));
		
		$form->add_fieldset($fieldset);
		
		$article_pages = $this->list_article_pages($array_page);
		
		$fieldset->add_field(new FormFieldSimpleSelectChoice('article_pages', '', $current_page, $article_pages,
			array('class' => 'summary', 'events' => array('change' => 'document.location = "' . ArticlesUrlBuilder::display_article($this->category->get_id(), $this->category->get_rewrited_name(), $this->article->get_id(), $this->article->get_rewrited_title())->rel() . '" + HTMLForms.getField("article_pages").getValue();'))
		));
		
		$this->tpl->put('FORM', $form->display());
	}
	
	private function build_pages_pagination($current_page, $nbr_pages, $array_page)
	{
		if ($nbr_pages > 1)
		{
			$pagination = $this->get_pagination($nbr_pages, $current_page);
			
			if ($current_page > 1 && $current_page <= $nbr_pages)
			{
				$previous_page = ArticlesUrlBuilder::display_article($this->category->get_id(), $this->category->get_rewrited_name(), $this->article->get_id(), $this->article->get_rewrited_title())->rel() . ($current_page - 1);
				
				$this->tpl->put_all(array(
					'U_PREVIOUS_PAGE' => $previous_page,
					'L_PREVIOUS_TITLE' => $array_page[1][$current_page-2]
				));
			}

			if ($current_page > 0 && $current_page < $nbr_pages)
			{
				$next_page = ArticlesUrlBuilder::display_article($this->category->get_id(), $this->category->get_rewrited_name(), $this->article->get_id(), $this->article->get_rewrited_title())->rel() . ($current_page + 1);
				
				$this->tpl->put_all(array(
					'U_NEXT_PAGE' => $next_page,
					'L_NEXT_TITLE' => $array_page[1][$current_page]
				));
			}
			
			$this->tpl->put_all(array(
				'C_PAGINATION' => true,
				'C_PREVIOUS_PAGE' => ($current_page != 1) ? true : false,
				'C_NEXT_PAGE' => ($current_page != $nbr_pages) ? true : false,
				'PAGINATION_ARTICLES' => $pagination->display()
			));
		}
	}
	
	private function list_article_pages($array_page)
	{
		$options = array();
		
		$i = 1;
		foreach ($array_page[1] as $page_name)
		{
			$options[] = new FormFieldSelectChoiceOption($page_name, $i++);
		}
		
		return $options;
	}
	
	private function build_sources_view()
	{
		$sources = $this->article->get_sources();
		$nbr_sources = count($sources);
		$this->tpl->put('C_SOURCES', $nbr_sources > 0);
		
		$i = 1;
		foreach ($sources as $name => $url)
		{
			$this->tpl->assign_block_vars('sources', array(
				'C_SEPARATOR' => $i < $nbr_sources,
				'NAME' => $name,
				'URL' => $url,
			));
			$i++;
		}
	}
	
	private function build_keywords_view()
	{
		$keywords = $this->article->get_keywords();
		$nbr_keywords = count($keywords);
		$this->tpl->put('C_KEYWORDS', $nbr_keywords > 0);
		
		$i = 1;
		foreach ($keywords as $keyword)
		{
			$this->tpl->assign_block_vars('keywords', array(
				'C_SEPARATOR' => $i < $nbr_keywords,
				'NAME' => $keyword->get_name(),
				'URL' => ArticlesUrlBuilder::display_tag($keyword->get_rewrited_name())->rel(),
			));
			$i++;
		}
	}
	
	private function check_authorizations()
	{
		$article = $this->get_article();
		
		$current_user = AppContext::get_current_user();
		$not_authorized = !ArticlesAuthorizationsService::check_authorizations($article->get_id_category())->moderation() && !ArticlesAuthorizationsService::check_authorizations($article->get_id_category())->write() && (!ArticlesAuthorizationsService::check_authorizations($article->get_id_category())->contribution() || $article->get_author_user()->get_id() != $current_user->get_id());
		
		switch ($article->get_publishing_state()) 
		{
			case Article::PUBLISHED_NOW:
				if (!ArticlesAuthorizationsService::check_authorizations($article->get_id_category())->read())
				{
					$error_controller = PHPBoostErrors::user_not_authorized();
		   			DispatchManager::redirect($error_controller);
				}
			break;
			case Article::NOT_PUBLISHED:
				if ($not_authorized || ($current_user->get_id() == User::VISITOR_LEVEL))
				{
					$error_controller = PHPBoostErrors::user_not_authorized();
		   			DispatchManager::redirect($error_controller);
				}
			break;
			case Article::PUBLISHED_DATE:
				if (!$article->is_published() && ($not_authorized || ($current_user->get_id() == User::VISITOR_LEVEL)))
				{
					$error_controller = PHPBoostErrors::user_not_authorized();
		   			DispatchManager::redirect($error_controller);
				}
			break;
			default:
				$error_controller = PHPBoostErrors::unexisting_page();
				DispatchManager::redirect($error_controller);
			break;
		}
	}
	
	private function get_pagination($nbr_pages, $current_page)
	{
		$pagination = new ModulePagination($current_page, $nbr_pages, 1, Pagination::LIGHT_PAGINATION);
		$pagination->set_url(ArticlesUrlBuilder::display_article($this->category->get_id(), $this->category->get_rewrited_name(), $this->article->get_id(), $this->article->get_rewrited_title(), '%d'));
		
		if ($pagination->current_page_is_empty() && $current_page > 1)
		{
			$error_controller = PHPBoostErrors::unexisting_page();
			DispatchManager::redirect($error_controller);
		}
		
		return $pagination;
	}
	
	private function generate_response()
	{
		$response = new SiteDisplayResponse($this->tpl);

		$graphical_environment = $response->get_graphical_environment();
		$graphical_environment->set_page_title($this->article->get_title(), $this->lang['articles']);
		$graphical_environment->get_seo_meta_data()->set_description($this->article->get_description());
		$graphical_environment->get_seo_meta_data()->set_canonical_url(ArticlesUrlBuilder::display_article($this->category->get_id(), $this->category->get_rewrited_name(), $this->article->get_id(), $this->article->get_rewrited_title(), AppContext::get_request()->get_getint('page', 1)));
	
		$breadcrumb = $graphical_environment->get_breadcrumb();
		$breadcrumb->add($this->lang['articles'], ArticlesUrlBuilder::home());
		
		$categories = array_reverse(ArticlesService::get_categories_manager()->get_parents($this->article->get_id_category(), true));
		foreach ($categories as $id => $category)
		{
			if ($category->get_id() != Category::ROOT_CATEGORY)
				$breadcrumb->add($category->get_name(), ArticlesUrlBuilder::display_category($category->get_id(), $category->get_rewrited_name()));
		}
		$breadcrumb->add($this->article->get_title(), ArticlesUrlBuilder::display_article($category->get_id(), $category->get_rewrited_name(), $this->article->get_id(), $this->article->get_rewrited_title()));
		
		return $response;
	}
}
?>
