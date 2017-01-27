<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 23/08/16
 * Time: 17:08
 */

namespace BlogBundle\Utils;

/**
 * Interface TodoListInterface
 * @package BlogBundle\Utils
 */
interface TodoListInterface
{
    /**
     * @return mixed
     */
    public function findActiveByDeadline();
}
