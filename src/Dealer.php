<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 11/11/2015
 * Time: 15:30
 */
class Dealer implements Player
{

    public function play(Hand $hand)
    {
        $scores = $hand->scoreHand();
        if (array_pop($scores)>=17) {
            return true;
        }
        return false;
    }
}