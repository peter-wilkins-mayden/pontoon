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
                ['blackjack' => false, 'bust' => false, 'split' => false, 3, 13,],
            ],
            [
                [
                    ['suit' => "diamonds", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                ['blackjack' => false, 'bust' => false, 'split' => true, 2, 12,],
            ],
            [
                [
                    ['suit' => "diamonds", 'name' => "king"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                ['blackjack' => true, 'bust' => false, 'split' => false, 11, 21,],
            ],
            [
                [
                    ['suit' => "diamonds", 'name' => "2"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                ['blackjack' => false, 'bust' => false, 'split' => false, 6, 16,],
            ],
            [
                [
                    ['suit' => "diamonds", 'name' => "5"],
                    ['suit' => "spades", 'name' => "5"],
                    ['suit' => "spades", 'name' => "5"],
                    ['suit' => "spades", 'name' => "5"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                ['blackjack' => false, 'bust' => false, 'split' => false, 21,],
            ],
            [
                [
                    ['suit' => "spades", 'name' => "9"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                ['blackjack' => false, 'bust' => false, 'split' => false, 11, 21,],
            ],
            [
                [
                    ['suit' => "spades", 'name' => "8"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                ['blackjack' => false, 'bust' => false, 'split' => false, 10, 20,],
            ],
            [
                [
                    ['suit' => "diamonds", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "5"],
                ],
                ['blackjack' => false, 'bust' => false, 'split' => false, 7, 17],
            ],
        ];
    }

    public function test_getCards()
    {
        $a = new Hand([
            ['suit' => "diamonds", 'name' => "ace"],
        ]);
        $this->assertEquals([
            ['suit' => "diamonds", 'name' => "ace"],
        ], $a->getCards());
    }

    public function test_addCard()
    {
        $a = new Hand([
            ['suit' => "diamonds", 'name' => "ace"],
        ]);
        $a->addCard(['suit' => "diamonds", 'name' => "ace"]);
        $this->assertEquals([
            ['suit' => "diamonds", 'name' => "ace"],
            ['suit' => "diamonds", 'name' => "ace"],
        ], $a->getCards());
    }
}
