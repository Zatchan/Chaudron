<?php
/*##################################################
 *                          CalendarAjaxEventsController.class.php
 *                            -------------------
 *   begin                : Marchr 04, 2014
 *   copyright            : (C) 2014 Julien BRISWALTER
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

class CalendarAjaxEventsController extends AbstractController
{
	private $lang;
	private $view;
	private $year;
	private $month;
	private $day;
	
	public function set_year($year)
	{
		$this->year = $year;
	}
	
	public function set_month($month)
	{
		$this->month = $month;
	}
	
	public function set_day($day)
	{
		$this->day = $day;
	}
	
	public function execute(HTTPRequestCustom $request)
	{
		$this->init();
		$this->build_view($request);
		return new SiteNodisplayResponse($this->view);
	}
	
	private function build_view(HTTPRequestCustom $request)
	{
		$db_querier = PersistenceContext::get_querier();
		
		$date_lang = LangLoader::get('date-common');
		$events_list = $participants = array();
		
		$config = CalendarConfig::load();
		$comments_config = new CalendarComments();
		
		$year = $this->year ? $this->year : $request->get_int('calendar_ajax_year', date('Y'));
		$month = $this->month ? $this->month : $request->get_int('calendar_ajax_month', date('n'));
		$day = $this->day ? $this->day : $request->get_int('calendar_ajax_day', 1);
		
		$array_l_month = array($date_lang['january'], $date_lang['february'], $date_lang['march'], $date_lang['april'], $date_lang['may'], $date_lang['june'], $date_lang['july'], $date_lang['august'], $date_lang['september'], $date_lang['october'], $date_lang['november'], $date_lang['december']);
		$events_number = 0;
		
		$result = $db_querier->select("SELECT *
		FROM " . CalendarSetup::$calendar_events_table . " event
		LEFT JOIN " . CalendarSetup::$calendar_events_content_table . " event_content ON event_content.id = event.content_id
		LEFT JOIN " . DB_TABLE_MEMBER . " member ON member.user_id = event_content.author_id
		LEFT JOIN " . DB_TABLE_COMMENTS_TOPIC . " com ON com.id_in_module = event.id_event AND com.module_id = 'calendar'
		WHERE approved = 1
		AND ((start_date BETWEEN :first_day_hour AND :last_day_hour) OR (end_date BETWEEN :first_day_hour AND :last_day_hour) OR (:first_day_hour BETWEEN start_date AND end_date))
		ORDER BY start_date ASC", array(
			'first_day_hour' => mktime(0, 0, 0, $month, $day, $year),
			'last_day_hour' => mktime(23, 59, 59, $month, $day, $year)
		));
		
		while ($row = $result->fetch())
		{
			$event = new CalendarEvent();
			$event->set_properties($row);
			
			if (CalendarAuthorizationsService::check_authorizations($event->get_content()->get_category_id())->read())
			{
				$events_list[$event->get_id()] = $event;
				$events_number++;
			}
		}
		$result->dispose();
		
		$this->view->put_all(array(
			'C_COMMENTS_ENABLED' => $comments_config->are_comments_enabled(),
			'C_EVENTS' => $events_number > 0,
			'DATE' => $day . ' ' . $array_l_month[$month - 1] . ' ' . $year,
			'L_EVENTS_NUMBER' => $events_number > 1 ? StringVars::replace_vars($this->lang['calendar.labels.events_number'], array('events_number' => $events_number)) : $this->lang['calendar.labels.one_event'],
		));
		
		if (!empty($events_list))
		{
			$result = $db_querier->select('SELECT event_id, member.user_id, display_name, level, groups
			FROM ' . CalendarSetup::$calendar_users_relation_table . ' participants
			LEFT JOIN ' . DB_TABLE_MEMBER . ' member ON member.user_id = participants.user_id
			WHERE event_id IN :events_list', array(
				'events_list' => array_keys($events_list)
			));
			
			while($row = $result->fetch())
			{
				if (!empty($row['display_name']))
				{
					$participant = new CalendarEventParticipant();
					$participant->set_properties($row);
					$participants[$row['event_id']][$participant->get_user_id()] = $participant;
				}
			}
			$result->dispose();
			
			foreach ($events_list as $event)
			{
				if (isset($participants[$event->get_id()]))
					$event->set_participants($participants[$event->get_id()]);
				
				$this->view->assign_block_vars('event', $event->get_array_tpl_vars());
				
				$participants_number = count($event->get_participants());
				$i = 0;
				foreach ($event->get_participants() as $participant)
				{
					$i++;
					$this->view->assign_block_vars('event.participant', array_merge($participant->get_array_tpl_vars(), array(
						'C_LAST_PARTICIPANT' => $i == $participants_number
					)));
				}
			}
		}
	}
	
	private function init()
	{
		$this->lang = LangLoader::get('common', 'calendar');
		$this->view = new FileTemplate('calendar/CalendarAjaxEventsController.tpl');
		$this->view->add_lang($this->lang);
	}
	
	public static function get_view($year = 0, $month = 0, $day = 0)
	{
		$object = new self();
		$object->init();
		if ($year)
			$object->set_year($year);
		if ($month)
			$object->set_month($month);
		if ($day)
			$object->set_day($day);
		$object->build_view(AppContext::get_request());
		return $object->view;
	}
}
?>
