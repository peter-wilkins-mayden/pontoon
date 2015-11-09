<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 06/11/2015
 * Time: 13:12
 */
class HandTest extends PHPUnit_Framework_TestCase
{
  /**

   * @param $hand
     * @param $expectedResult
     *
     * @dataProvider handProvider
     */
    public function test_scoreHand($hand, $expectedResult)
    {
        $a = new Hand($hand);
        $this->assertEquals($expectedResult, $a->scoreHand());
    }

    public static function handProvider()
    {
        return [
            [
                [
                    ['suit' => "diamonds", 'name' => "2"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                [3, 13,],
            ],
            [
                [
                    ['suit' => "diamonds", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                [2, 12,],
            ],
            [
                [
                    ['suit' => "diamonds", 'name' => "king"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                [11, 21,],
            ],
            [
                [
                    ['suit' => "diamonds", 'name' => "2"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                [6, 16,],
            ],
            [
                [
                    ['suit' => "diamonds", 'name' => "5"],
                    ['suit' => "spades", 'name' => "5"],
                    ['suit' => "spades", 'name' => "5"],
                    ['suit' => "spades", 'name' => "5"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                [21,],
            ],
            [
                [
                    ['suit' => "spades", 'name' => "9"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                [11, 21,],
            ],
            [
                [
                    ['suit' => "spades", 'name' => "8"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                [10, 20,],
            ],
        ];
    }

}
