<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 06/11/2015
 * Time: 18:32
 */
class Player
{

    private $name;
    private $hand;

    /**
     * Player constructor.
     * @param $name
     * @param $hand
     */
    public function __construct($name, $hand)
    {
        $this->name = $name;
        $this->hand = $hand;
    }

//    public function playHand(&$deck)
//    {
//        $scores = $this->hand->scoreHand();
//        if ($scores[0]>18) {
//            return $scores[0];
//        }
//        if (($scores[1]) && ($scores[1]>18)) {
//            return $scores[1];
//        }
//        $hand-> $deck->dealCards(1)
//    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getHand()
    {
        return $this->hand;
    }

}