<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 06/11/2015
 * Time: 11:57
 */
class Deck
{

    public function __construct()
    {
        $suitee = [2, 3, 4, 5, 6, 7, 8, 9, 10, 'jack', 'queen', 'king', 'ace'];
        $deck = [
            'hearts'   => $suitee,
            'diamonds' => $suitee,
            'spades'   => $suitee,
            'clubs'    => $suitee,
        ];

        foreach ($deck as $suit => $suitee) {
            foreach ($suitee as $card) {
                $fullDeck[] = [
                    'suit' => $suit,
                    'name' => $card,
                ];
            }
        }
        shuffle($fullDeck);

        return $fullDeck;
    }
}