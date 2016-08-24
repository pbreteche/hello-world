<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 21/07/16
 * Time: 15:45
 */

namespace BlogBundle\utils;


class HelloerTest extends \PHPUnit_Framework_Testcase
{


    /**
     * @dataProvider helloProvider
     */
    public function testHello($term, $resultList)
    {
            $helloer = new Helloer($term);
            foreach ($resultList as $e) {
                $this->assertEquals($e[1], $helloer->hello($e[0]), 'Hello must say hello world!');
            }
//            $this->markTestIncomplete();
    }

    public function helloProvider()
    {
        return [
            ['Hello', [
                ['world', 'Hello world!'],
                ['Jean-Pierre', 'Hello Jean-Pierre!'],
            ]],
            ['Hi', [
                ['world', 'Hi world!'],
                ['Jean-Pierre', 'Hi Jean-Pierre!'],
            ]]
        ];
    }
}