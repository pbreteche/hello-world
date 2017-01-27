<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 20/07/16
 * Time: 12:18
 */

namespace BlogBundle\utils;

class Helloer
{
    private $term;


    /**
     * Helloer constructor.
     */
    public function __construct($term)
    {
        $this->term = $term;
    }

    public function hello($name = 'world')
    {
        return $this->term . ' ' . $name . '!';
    }
}
