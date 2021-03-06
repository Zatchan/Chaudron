<?php
/*##################################################
 *                     GallerySitemapExtensionPoint.class.php
 *                            -------------------
 *   begin                : December 4, 2013
 *   copyright            : (C) 2013 Julien BRISWALTER
 *   email                : j1.seth@phpboost.com
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

class GallerySitemapExtensionPoint extends SitemapCategoriesModule
{
	public function __construct()
	{
		parent::__construct(GalleryService::get_categories_manager());
	}
	
	protected function get_category_url(Category $category)
	{
		return GalleryUrlBuilder::display_category($category->get_id(), $category->get_rewrited_name());
	}
}
?>