<?php

class Pontoon
{
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
       // echo "\n total = " . $total;
       // echo "\n ace = " . $ace;
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

    public function dealCards(&$fullDeck, $num)
    {
        while ($num > 0) {
            $hand[] = array_pop($fullDeck);
            $num --;
        }

        var_dump($hand);
        return $hand;
    }

    public function popCard(&$fullDeck)
    {
        return array_pop($fullDeck);
    }

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
