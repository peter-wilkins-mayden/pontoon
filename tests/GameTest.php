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
        $deck = new Deck();
        $players[] = new Player('bob', new Hand($deck->dealCards(2)));
        $players[] = new Player('austin', new Hand($deck->dealCards(2)));
        $game = new Game($deck, $players);
        $deck1 = $game->getDeck();
        $this->assertTrue(is_a($deck1, 'Deck'));
    }
    public function test_game_has_atleast_two_players()
    {
        $deck = new Deck();
        $players[] = new Player('bob', new Hand($deck->dealCards(2)));
        $players[] = new Player('austin', new Hand($deck->dealCards(2)));
        $game = new Game($deck, $players);
        $this->assertEquals(2, count($game->getPlayers()));
    }


}

