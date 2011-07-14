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

namespace Foomo\Examples\Todo;

/**
 * @link www.foomo.org
 * @license www.gnu.org/licenses/lgpl.txt
 * @author franklin <franklin@weareinteractive.com>
 */
class Service1
{
	//---------------------------------------------------------------------------------------------
	// ~ Constants
	//---------------------------------------------------------------------------------------------

	const VERSION = 0.1;

	//---------------------------------------------------------------------------------------------
	// ~ Constructor
	//---------------------------------------------------------------------------------------------

	/**
	 * @return Foomo\Examples\Todo\Service\Todo[]
	 */
	public function getTodos()
	{
		$ret = array();
		foreach (\Foomo\Examples\Todo::getTodoList(false)->getEntries() as $todo) {
			$ret[] = \Foomo\Examples\Todo\Service\Todo::create($todo->getId(), $todo->getText(), $todo->getComplete());
		}
		return $ret;
	}

	/**
	 * @param string $text
	 * @return Foomo\Examples\Todo\Service\Todo[]
	 */
	public function addTodo($text)
	{
		\Foomo\Examples\Todo::getTodoList()->addEntry(new \Foomo\Examples\Todo\Entities\TodoEntry($text));
		return $this->getTodos();
	}

	/**
	 * @param string $id
	 * @return Foomo\Examples\Todo\Service\Todo[]
	 */
	public function markTodoComplete($id)
	{
		\Foomo\Examples\Todo::getTodoList()->markEntryComplete($id);
		return $this->getTodos();
	}

	/**
	 * @param string $id
	 * @param string $text
	 * @return Foomo\Examples\Todo\Service\Todo[]
	 */
	public function updateTodo($id, $text)
	{
		\Foomo\Examples\Todo::getTodoList()->getEntry($id)->setText($text);
		return $this->getTodos();
	}

	/**
	 * @return Foomo\Examples\Todo\Service\Todo[]
	 */
	public function removeCompleteTodos()
	{
		\Foomo\Examples\Todo::getTodoList()->removeCompleteEntries();
		return $this->getTodos();
	}
}