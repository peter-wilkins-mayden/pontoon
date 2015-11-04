<?php

/**
 * Class Pontoon
 */
class Pontoon
{

    /**
     * @param $hand
     * @return int
     */
    public function scoreHand($hand)
    {
        $total = 0;
        $ace = 0;
        foreach ($hand as $card) {
            switch ($card['name']) {
                case 'ace':
                    $ace++;
                    break;
                case 'king':
                case 'queen':
                case 'jack':
                    $total += 10;
                    break;
                default:
                    $total += $card['name'];
            }
        }
        if ($ace > 1) {
            $total += $ace;
        } elseif ($ace == 1) {
            if ($total <= 10) {
                $total += 11;
            } else {
                $total += 1;
            }
        }
        return $total;
    }

    /**
     * @param $fullDeck
     * @param $num
     * @return array
     */
    public function dealCards(&$fullDeck, $num = 1)
    {
        while ($num > 0) {
            $hand[] = array_pop($fullDeck);
            $num --;
        }

        var_dump($hand);
        return $hand;
    }

    /**
     * @return array
     */
    public function newShuffledDeck()
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
