<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 06/11/2015
 * Time: 12:57
 */
class GameTest extends PHPUnit_Framework_TestCase
{
    public function test_game_deck_is_Deck()
    {
        $a = new Game();
        $this->assertTrue(is_a($a->deck, 'Deck'));
    }

}

