<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 06/11/2015
 * Time: 18:33
 */
class PlayerTest extends PHPUnit_Framework_TestCase
{
    public function test_type()
    {
        $deck = new Deck();
        $a = new Player('bob', new Hand($deck->dealCards(2)));
        $this->assertTrue(is_a($a, 'Player'));
    }
    public function test_player_has_hand()
    {
        $deck = new Deck();
        $a = new Player('bob', new Hand($deck->dealCards(2)));
        $this->assertTrue(is_a($a->getHand(), 'Hand'));
    }
//    public function test_name_is_string()
//    {
//        $deck = new Deck();
//        $a = new Player('bob', new Hand($deck->dealCards(2)));
//        $this->assertTrue(is_a($a->getName(), 'String'));
//    }


}
