<?php
require_once('src/Pontoon.php');

$a = new Pontoon;
function displayScores()
{
    $scores = '';
    $a = new Pontoon;
    $deck = $a->newShuffledDeck();
    $hand = $a->dealCards($deck, 2);
    foreach ($hand as $card) {
    $scores .= $card['name'] . " of " . $card['suit'] . "<br>";
    }
    $score = $a->scoreHand($hand);
    $scores .= "Your possible scores are ";
    foreach ($score as $option) {
        $scores .= $option . ", ";
    }
    return $scores;
}

