<?php


/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 11/11/2015
 * Time: 16:33
 */
class GameTest extends PHPUnit_Framework_TestCase
{

    public function test_new_game()
    {
        $game = new Game(['Peter'], 20, 4);
        $this->assertTrue(is_a($game->players['Peter'], 'Peter'));
        $this->assertTrue(is_a($game->dealer, 'Dealer'));
        $this->assertEquals(20, $game->accounts['Peter']);
        $this->assertEquals(208, count($game->deck));
    }
    public function test_play_round_peter_wins()
    {
        $game = new Game(['Peter'], 20, 1);
        $game->deck->setCards([
            ['suit' => "diamonds", 'name' => "king"],
            ['suit' => "diamonds", 'name' => "king"],
            ['suit' => "spades", 'name' => "king"],
            ['suit' => "diamonds", 'name' => "king"],
            ['suit' => "spades", 'name' => "ace"],
        ]);
        $game->playRound();
        $this->assertEquals(21, $game->accounts['Peter']);
    }
    public function test_play_round_peter_bust()
    {
        $game = new Game(['Peter'], 20, 1);
        $game->deck->setCards([
            ['suit' => "diamonds", 'name' => "king"],
            ['suit' => "spades", 'name' => "king"],
            ['suit' => "diamonds", 'name' => "king"],
            ['suit' => "spades", 'name' => "10"],
            ['suit' => "spades", 'name' => "5"],
        ]);
        $game->playRound();
        $this->assertEquals(19, $game->accounts['Peter']);
    }
    public function test_play_round_peter_matches_dealer()
    {
        $game = new Game(['Peter'], 20, 1);
        $game->deck->setCards([
            ['suit' => "diamonds", 'name' => "king"],
            ['suit' => "spades", 'name' => "king"],
            ['suit' => "diamonds", 'name' => "king"],
            ['suit' => "spades", 'name' => "king"],
        ]);
        $game->playRound();
        $this->assertEquals(19, $game->accounts['Peter']);
    }
    public function test_play_round_peter_17_dealer_bust()
    {
        $game = new Game(['Peter'], 20, 1);
        $game->deck->setCards([
            ['suit' => "diamonds", 'name' => "king"],
            ['suit' => "spades", 'name' => "king"],
            ['suit' => "diamonds", 'name' => "6"],
            ['suit' => "diamonds", 'name' => "9"],
            ['suit' => "spades", 'name' => "8"],
        ]);
        $game->playRound();
        $this->assertEquals(21, $game->accounts['Peter']);
    }
    public function test_play_round_peter_5_card_trick_dealer_20()
    {
        $game = new Game(['Peter'], 20, 1);
        $game->deck->setCards([
            ['suit' => "diamonds", 'name' => "king"],
            ['suit' => "spades", 'name' => "king"],
            ['suit' => "diamonds", 'name' => "2"],
            ['suit' => "diamonds", 'name' => "2"],
            ['suit' => "spades", 'name' => "2"],
            ['suit' => "diamonds", 'name' => "2"],
            ['suit' => "diamonds", 'name' => "2"],
        ]);
        $game->playRound();
        $this->assertEquals(21, $game->accounts['Peter']);
    }
}
