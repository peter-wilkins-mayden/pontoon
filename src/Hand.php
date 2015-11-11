<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 06/11/2015
 * Time: 14:37
 */
class Hand
{

    /**
     * @var
     */
    private $cards;

    /**
     * @return mixed
     */
    public function getCards()
    {
        return $this->cards;
    }
    public function addCard($newCard){
        $this->cards[] = $newCard;
    }
    /**
     * Hand constructor.
     * @param $cards
     */
    public function __construct($cards)
    {
        $this->cards = $cards;
    }

    /**
     * @return array  of all possible scores. eg if ace and six in hand returns [7,18]
     */
    public function scoreHand()
    {
        $total[0] = 0;
        $ace = 0;
        foreach ($this->cards as $card) {
            switch ($card['name']) {
                case 'ace':
                    $ace++;
                    break;
                case 'king':
                case 'queen':
                case 'jack':
                    $total[0] += 10;
                    break;
                default:
                    $total[0] += $card['name'];
            }
        }
        $total[0] += $ace;
        $var = $total[0];
        while ($ace>0) {
            $var += 10;
            if ($var<=21) {
                $total[] = $total[0] + 10;
            }
            $ace -= 1;
        }

        return $total;
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->cards);
    }
}