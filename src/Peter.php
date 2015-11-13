<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 11/11/2015
 * Time: 15:11
 */
class Peter implements Player
{
//['blackjack' => false, 'bust' => false, 'split' => false,]
    public function play(Hand $hand)
    {
        $scores = $hand->scoreHand();


        if($scores['blackjack'] || $scores['bust'] || $scores['0'] >= 17 || $hand->count() == 5){
            return 0;
        }
//        if(count($scores) > 1){  //todo ace in hand
//            if($scores[0] <= 10){
//                return false;
//            }
//        }

        return 1;

    }
}