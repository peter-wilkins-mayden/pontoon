<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 06/11/2015
 * Time: 12:57
 */
class GameTest extends PHPUnit_Framework_TestCase
{
    public function test_create_a_new_pack_of_shuffled_cards()
    {
        $a = new Game();
        $this->assertEquals(52, count($a->deck));
    }
    public function test_dealCards_removes_from_deck_number_of_cards_dealt()
    {
        $a = new Game();
        $b = new Hand();
        $b->dealCards($a->deck, 10);
        $this->assertEquals(42, count($a->deck));
    }
}

