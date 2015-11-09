<?php
//require_once('src/Game.php');
require_once('src/Deck.php');
require_once('src/Player.php');
require_once('src/Hand.php');

function displayScores()
{
    $deck = new Deck();
    $players[] = new Player('bob', new Hand($deck->dealCards(2)));
    $players[] = new Player('austin', new Hand($deck->dealCards(2)));
    //$game = new Game($deck, $players);
    //$game->getPlayers();

    foreach ($players as $dude) {
        $hand = $dude->getHand();
        $playerName = $dude->getName();
        $info = "Player $playerName :";
        $score = $hand->scoreHand();
        foreach ($hand->getCards() as $card) {
            $info .= $card['name'] . " of " . $card['suit'] . "; ";
        }
        $info .= "Your possible scores are ";
        foreach ($score as $option) {
            $info .= $option . ", ";
        }
        $info .= '<br>';
        $scores[] = $info;
    }

    return $scores;
}

