<?php
/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 06/11/2015
 * Time: 11:50
 */



class Game
{

    public $deck;
    public function __construct()
    {
     $this->deck = new Deck();
    }

}