<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 23/08/16
 * Time: 16:50
 */

namespace BlogBundle\Controller;

use BlogBundle\Utils\TodoTaskManager;


class DemoController
{
    private $todoTaskManager;

    public function displayTodoList()
    {
        $todoList = $this->getTodoTaskManager()->findActiveByDeadline();
        return [
            'todoList' => $todoList,
        ];
    }

    private function getTodoTaskManager()
    {
        if (!isset($this->todoTaskManager)) {
            $this->todoTaskManager = new TodoTaskManager();
        }
        return $this->todoTaskManager;
    }

}