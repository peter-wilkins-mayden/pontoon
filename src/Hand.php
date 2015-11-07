<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 06/11/2015
 * Time: 14:37
 */
class Hand
{
    private $cards;

    /**
     * @return mixed
     */
    public function getCards()
    {
        return $this->cards;
    }

    public function __construct($cards)
    {
        $this->cards = $cards;
    }

    public function scoreHand()
    {
        $total[0] = 0;
        $ace = 0;
        foreach ($this->cards as $card) {
            switch ($card['name']) {
                case 'ace':
                    $ace ++;
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
        //echo "\n total: " . $total[0];
        //echo "\n ace: " . $ace . "\n";
        $total[0] += $ace;
        $var = $total[0];
        while ($ace > 0) {

            $var += 10;
            if ($var <= 21) {
                $total[] = $total[0] + 10;
            }

            $ace -= 1;
        }

//    elseif ($ace == 1) {
//            if ($total <= 10) {
//                $total += 11;
//            } else {
//                $total += 1;
//            }
//        }
        //var_dump($total);
        return $total;
    }
    public function count(){
        return count($this->cards);
    }

}