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
class Controller
{
	//---------------------------------------------------------------------------------------------
	// ~ Variables
	//---------------------------------------------------------------------------------------------

	/**
	 *
	 * @var Foomo\Examples\Todo\Frontend\Model
	 */
	public $model;

	//---------------------------------------------------------------------------------------------
	// ~ Action methods
	//---------------------------------------------------------------------------------------------

	/**
	 *
	 */
	public function actionDefault()
	{
		$this->model->setTodos(\Foomo\Examples\Todo::getTodoList(false)->getEntries());
	}

	/**
	 * @param string $text
	 */
	public function actionAddTodo($text)
	{
		if ($text != '') {
			\Foomo\Examples\Todo::getTodoList()->addEntry(new \Foomo\Examples\Todo\Entities\TodoEntry($text));
		}
		\Foomo\MVC::redirect('default');
	}

	/**
	 * @param string $id
	 */
	public function actionMarkTodoComplete($id)
	{
		if ($id != '') {
			\Foomo\Examples\Todo::getTodoList()->markEntryComplete($id);
		}
		\Foomo\MVC::redirect('default');
	}

	/**
	 * @param string $id
	 * @param string $text
	 */
	public function actionUpdateTodo($id, $text)
	{
		if ($id != '' && $text != '') {
			\Foomo\Examples\Todo::getTodoList()->getEntry($id)->setText($text);
		}
		\Foomo\MVC::redirect('default');
	}

	/**
	 *
	 */
	public function actionRemoveCompleteTodos()
	{
		\Foomo\Examples\Todo::getTodoList()->removeCompleteEntries();
		\Foomo\MVC::redirect('default');
	}
}