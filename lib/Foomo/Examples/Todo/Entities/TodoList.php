<?php

/*
 * This file is part of the foomo Opensource Framework.
 *
 * The foomo Opensource Framework is free software: you can redistribute it
 * and/or modify it under the terms of the GNU Lesser General Public License as
 * published  by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * The foomo Opensource Framework is distributed in the hope that it will
 * be useful, but WITHOUT ANY WARRANTY; without even the implied warranty
 * of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License along with
 * the foomo Opensource Framework. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Foomo\Examples\Todo\Entities;

/**
 * @link www.foomo.org
 * @license www.gnu.org/licenses/lgpl.txt
 * @author franklin <franklin@weareinteractive.com>
 */
class TodoList
{
	//---------------------------------------------------------------------------------------------
	// ~ Variables
	//---------------------------------------------------------------------------------------------

	/**
	 * @var string
	 */
	private $id;

	//---------------------------------------------------------------------------------------------
	// ~ Variables
	//---------------------------------------------------------------------------------------------

	/**
	 * @var Foomo\Examples\Todo\Entities\TodoEntry[]
	 */
	private $entries = array();

	//---------------------------------------------------------------------------------------------
	// ~ Constructor
	//---------------------------------------------------------------------------------------------

	/**
	 *
	 */
	public function __construct()
	{
		$this->id = md5(microtime() . '-somesalt-' . __CLASS__);
	}

	//---------------------------------------------------------------------------------------------
	// ~ Public methods
	//---------------------------------------------------------------------------------------------

	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param Foomo\Examples\Todo\Entities\TodoEntry $entry
	 * @return Foomo\Examples\Todo\Entities\TodoList
	 */
	public function addEntry(\Foomo\Examples\Todo\Entities\TodoEntry $entry)
	{
		if (!is_null($this->getEntry($entry->getId()))) trigger_error('Entry ' . $entry->getId() . ' already exists!', E_USER_ERROR);
		array_unshift($this->entries, $entry);
		return $this;
	}

	/**
	 * @param string $id
	 * @return Foomo\Examples\Todo\Entities\TodoEntry
	 */
	public function getEntry($id)
	{
		foreach ($this->entries as &$entry) if ($entry->getId() == $id) return $entry;
		return null;
	}

	/**
	 * @return Foomo\Examples\Todo\Entities\TodoEntry[]
	 */
	public function getEntries()
	{
		return $this->entries;
	}

	/**
	 * @return Foomo\Examples\Todo\Entities\TodoList
	 */
	public function removeCompleteEntries()
	{
		$entries = array();
		foreach($this->entries as $entry) if(!$entry->getComplete()) $entries[] = $entry;
		$this->entries = $entries;
		return $this;
	}

	/**
	 * @param string $id
	 * @return Foomo\Examples\Todo\Entities\TodoList
	 */
	public function markEntryComplete($id)
	{
		if (null == $entry = $this->getEntry($id))  trigger_error('Entry ' . $entry->getId() . ' does not exist!', E_USER_ERROR);
		$entry->setComplete(true);
		return $this;
	}
}