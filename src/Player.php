<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 06/11/2015
 * Time: 18:32
 */
interface Player
{

    /**
     * @param Hand $hand : players current hand
     * @return boolean
     */
    public function stick(Hand $hand);
}