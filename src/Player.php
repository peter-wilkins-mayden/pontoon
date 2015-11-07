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
     * @return mixed
     */
    public function getName()
    {
        return $this->getName();
    }

    /**
     * @return mixed
     */
    public function getHand()
    {
        return $this->hand;
    }

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

}