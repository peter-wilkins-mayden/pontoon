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
    public function testHands($hand, $expectedResult)
    {
        $this->assertEquals($expectedResult, $a->scoreHand($hand));
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



    public function test_dealCards_returns_number_of_cards_in_argument()
    {
        $game = new Game();
        $hand = new Hand();
        $hand->dealCards($game->deck, 2);
        $this->assertEquals(2, count($hand));
    }

}
