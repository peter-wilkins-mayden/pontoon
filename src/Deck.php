<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 06/11/2015
 * Time: 11:57
 */
class Deck implements Countable
{
    protected $cards;
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
        $this->cards = $fullDeck;
    }
    public function count(){
        return count($this->cards);
    }

    public function dealCards($num)
    {
        while ($num > 0) {
            $hand[] = array_pop($this->cards);
            $num -= 1;
        }

        //var_dump($hand);
        return $hand;
    }

}