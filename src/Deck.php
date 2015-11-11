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

    /**
     * @return array
     */
    public function getCards()
    {
        return $this->cards;
    }

    /**
     * @param array $cards
     */
    public function setCards($cards)
    {
        $this->cards = $cards;
    }
    public function __construct($numberDecks = 1)
    {
        $this->cards = $this->makeDeck();
        $numberDecks -= 1;
        while($numberDecks > 0) {
            $this->cards = array_merge($this->cards, $this->makeDeck());
            $numberDecks -= 1;
            }
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
        return $hand;
    }
    public function hit()
    {
        return array_pop($this->cards);
    }


    private function makeDeck()
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