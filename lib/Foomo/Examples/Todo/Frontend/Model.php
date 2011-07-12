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

namespace Foomo\Examples\Todo\Frontend;

/**
 * @link www.foomo.org
 * @license www.gnu.org/licenses/lgpl.txt
 * @author jan <jan@bestbytes.de>
 */
class Model
{
	//---------------------------------------------------------------------------------------------
	// ~ Variables
	//---------------------------------------------------------------------------------------------

	/**
	 * @var Foomo\Examples\Todo\Entities\TodoEntry[]
	 */
	private $openTodos = array();
	/**
	 * @var Foomo\Examples\Todo\Entities\TodoEntry[]
	 */
	private $completeTodos = array();

	//---------------------------------------------------------------------------------------------
	// ~ Public methods
	//---------------------------------------------------------------------------------------------

	/**
	 * @return Foomo\Examples\Todo\Entities\TodoEntry[]
	 */
	public function getOpenTodos()
	{
		return $this->openTodos;
	}

	/**
	 * @return Foomo\Examples\Todo\Entities\TodoEntry[]
	 */
	public function getCompleteTodos()
	{
		return $this->completeTodos;
	}

	/**
	 * @internal
	 * @param Foomo\Examples\Todo\Entities\TodoEntry[] $todos
	 */
	public function setTodos(array $todos)
	{
		$this->openTodos = array();
		$this->completeTodos = array();
		foreach($todos as $todo) {
			if ($todo->getComplete()) {
				$this->completeTodos[] = $todo;
			} else {
				$this->openTodos[] = $todo;
			}
		}
	}
}