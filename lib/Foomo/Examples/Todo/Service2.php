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
class Service2
{
	//---------------------------------------------------------------------------------------------
	// ~ Constants
	//---------------------------------------------------------------------------------------------

	const VERSION = 0.2;

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
	 * @param Foomo\Examples\Todo\Service\Todo[] $todos
	 * @return Foomo\Examples\Todo\Service\Todo[]
	 */
	public function addTodos(array $todos)
	{
		foreach ($todos as &$todo) {
			$obj = new \Foomo\Examples\Todo\Entities\TodoEntry($todo->text);
			$obj->setId($todo->id)->setComplete($todo->complete);
			\Foomo\Examples\Todo::getTodoList()->addEntry($obj);
			$todo->id = $obj->getId();
		}
		return $todos;
	}

	/**
	 * @param Foomo\Examples\Todo\Service\Todo $todo
	 * @return Foomo\Examples\Todo\Service\Todo[]
	 */
	public function updateTodo(\Foomo\Examples\Todo\Service\Todo $todo)
	{
		\Foomo\Examples\Todo::getTodoList()->getEntry($todo->id)->setComplete($todo->complete)->setText($todo->text);
		return $this->getTodos();
	}

	/**
	 * @param Foomo\Examples\Todo\Service\Todo[] $todos
	 * @return Foomo\Examples\Todo\Service\Todo[]
	 */
	public function removeTodos(array $todos)
	{
		foreach ($todos as $todo) {
			\Foomo\Examples\Todo::getTodoList()->removeEntry($todo->id);
		}
		return $this->getTodos();
	}
}