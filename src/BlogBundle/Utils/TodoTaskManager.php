<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 23/08/16
 * Time: 17:03
 */

namespace BlogBundle\Utils;

class TodoTaskManager implements TodoListInterface
{

    /**
     * @return array
     */
    public function findActiveByDeadline()
    {
        return [
            'manger',
            'boire',
            'dormir',
        ];
    }
}
