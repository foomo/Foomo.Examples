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
 * a todo item
 *
 * @link www.foomo.org
 * @license www.gnu.org/licenses/lgpl.txt
 * @author jan <jan@bestbytes.de>
 * @author franklin <franklin@weareinteractive.com>
 */
class TodoEntry
{
	//---------------------------------------------------------------------------------------------
	// ~ Variables
	//---------------------------------------------------------------------------------------------

	/**
	 * @var string
	 */
	private $id;
	/**
	 * @var string
	 */
	private $text;
	/**
	 * @var boolean
	 */
	private $complete = false;

	//---------------------------------------------------------------------------------------------
	// ~ Constructor
	//---------------------------------------------------------------------------------------------

	/**
	 * @param string $text
	 */
	public function __construct($text)
	{
		$this->text = $text;
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
	 * @param string $id
	 * @return Foomo\Examples\Todo\Entities\TodoEntry
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getText()
	{
		return $this->text;
	}
	/**
	 * @param string $text
	 * @return Foomo\Examples\Todo\Entities\TodoEntry
	 */
	public function setText($text)
	{
		$this->text = $text;
		return $this;
	}

	/**
	 * @return boolean
	 */
	public function getComplete()
	{
		return $this->complete;
	}
	/**
	 * @param boolean $complete
	 * @return Foomo\Examples\Todo\Entities\TodoEntry
	 */
	public function setComplete($complete)
	{
		$this->complete = $complete;
		return $this;
	}
}