<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 06/11/2015
 * Time: 15:35
 */
class DeckTest extends PHPUnit_Framework_TestCase
{
    public function test_new_deck_contains_52_cards()
    {
        $deck = new Deck();
        $this->assertEquals(52, $deck->count());
    }
    public function test_dealCards_removes_from_deck_number_of_cards_dealt()
    {
        $deck = new Deck();
        $deck->dealCards(10);
        $this->assertEquals(42, $deck->count());
    }
    public function test_dealCards_returns_number_of_cards_in_argument()
    {
        $deck = new Deck();
        $hand = new Hand($deck->dealCards(2));
        $this->assertEquals(2, count($hand->cards));
    }
}
