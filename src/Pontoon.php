<?php

/**
 * Class Pontoon
 */
class Pontoon
{

    /**
     * Given a hand, returns an array of all possible combinations of scores of 21 or below
     * @param $hand
     * @return array
     */
    public function scoreHand($hand)
    {
        $total[0] = 0;
        $ace = 0;
        foreach ($hand as $card) {
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

    /**
     * @param $fullDeck
     * @param $num
     * @return array of card arrays
     */
    public function dealCards(&$fullDeck, $num = 1)
    {
        while ($num > 0) {
            $hand[] = array_pop($fullDeck);
            $num -= 1;
        }

        //var_dump($hand);
        return $hand;
    }


}



