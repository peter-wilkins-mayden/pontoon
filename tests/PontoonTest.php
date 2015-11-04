<?php


class PontoonTest extends PHPUnit_Framework_TestCase
{
    /**
     * @param $hand
     * @param $expectedResult
     *
     * @dataProvider handProvider
     */
    public function testDoubles($hand, $expectedResult)
    {
        $a = new Pontoon;
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
                13,
            ],
            [
                [
                    ['suit' => "diamonds", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                2,
            ],
            [
                [
                    ['suit' => "diamonds", 'name' => "king"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                21,
            ],
            [
                [
                    ['suit' => "diamonds", 'name' => "2"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                6,
            ],
            [
                [
                    ['suit' => "diamonds", 'name' => "5"],
                    ['suit' => "spades", 'name' => "5"],
                    ['suit' => "spades", 'name' => "5"],
                    ['suit' => "spades", 'name' => "5"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                21,
            ],
            [
                [
                    ['suit' => "spades", 'name' => "9"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                21,
            ],
            [
                [
                    ['suit' => "spades", 'name' => "8"],
                    ['suit' => "spades", 'name' => "ace"],
                    ['suit' => "spades", 'name' => "ace"],
                ],
                19,
            ],
        ];
    }

    public function test_create_a_new_pack_of_shuffled_cards()
    {
        $a = new Pontoon;
        $deck = $a->newShuffledDeck();
        $this->assertEquals(52, count($deck));
    }

    public function test_popCard_returns_an_array_with_two_elements()
    {
        $a = new Pontoon;
        $deck = $a->newShuffledDeck();
        $card = $a->popCard($deck);
        $this->assertEquals(2, count($card));
    }

    public function test_dealCards_returns_number_of_cards_in_argument()
    {
        $a = new Pontoon;
        $deck = $a->newShuffledDeck();
        $hand = $a->dealCards($deck, 2);
        $this->assertEquals(2, count($hand));
    }

    public function test_dealCards_removes_from_deck_number_of_cards_in_argument()
    {
        $a = new Pontoon;
        $deck = $a->newShuffledDeck();
        $hand = $a->dealCards($deck, 2);
        $this->assertEquals(2, count($hand));
    }

    public function test_scoreHand_returns_sum_of_value_of_cards_in_hand()
    {
        $a = new Pontoon;
        $hand = [
            ['suit' => "diamonds", 'name' => "2"],
            ['suit' => "spades", 'name' => "ace"],
        ];
        $this->assertEquals(13, $a->scoreHand($hand));
    }
}
