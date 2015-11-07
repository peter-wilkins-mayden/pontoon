<?php
/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 06/11/2015
 * Time: 11:50
 */



class Game
{

    private $players;
    private $deck;

    /**
     * @return mixed
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * @return mixed
     */
    public function getDeck()
    {
        return $this->deck;
    }

    /**
     * Game constructor.
     * @param $deck
     * @param $players
     */
    public function __construct($deck, $players)
    {
        $this->deck = $deck;
        $this->players = $players;
    }

}