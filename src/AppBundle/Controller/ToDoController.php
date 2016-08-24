<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 22/07/16
 * Time: 12:21
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ToDoController extends Controller
{

    /**
     * @Template()
     * @Cache(expires="+7 days", public=true)
     *
     * @return array
     */
    public function showAction()
    {
        return ['toDoList' => ['manger', 'boire', 'dormir']];
    }

}