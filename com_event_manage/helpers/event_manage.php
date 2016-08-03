<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Event_manage
 * @author     jainik <jainik@raindropsinfotech.com>
 * @copyright  Copyright (C) 2015. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

/**
 * Event_manage helper.
 *
 * @since  1.6
 */
class Event_manageHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  string
	 *
	 * @return void
	 */
	public static function addSubmenu($vName = '')
	{
		JHtmlSidebar::addEntry(
			JText::_('Users List'),
			'http://182.160.156.75/~manlyweb/index.php?option=com_event_manage&amp;view=userslist',
			$vName == 'userslist'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_EVENT_MANAGE_TITLE_TERMS'),
			'index.php?option=com_event_manage&view=terms',
			$vName == 'terms'
		);

		JHtmlSidebar::addEntry(
			JText::_('Premium'),
			'index.php?option=com_event_manage&view=premiums',
			$vName == 'premiums'
		);

	}

	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return    JObject
	 *
	 * @since    1.6
	 */
	public static function getActions()
	{		
		$user   = JFactory::getUser();
		$result = new JObject;

		$assetName = 'com_event_manage';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
		);

		foreach ($actions as $action)
		{
			$result->set($action, $user->authorise($action, $assetName));
		}

		return $result;
	}
}
