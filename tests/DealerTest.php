<?php

/**
 * Project: Pontoon
 * User: peterwilkins
 * Date: 11/11/2015
 * Time: 15:36
 */
class DealerTest extends PHPUnit_Framework_TestCase
{

    public function test_dealer_sticks_on_17()
    {
        $hand = new Hand([
            ['suit' => "diamonds", 'name' => "9"],
            ['suit' => "spades", 'name' => "8"],
        ]);
        $dealer = new Dealer();
        $this->assertEquals(true, $dealer->stick($hand));
    }

    public function test_dealer_twists_on_16()
    {
        $hand = new Hand([
            ['suit' => "diamonds", 'name' => "8"],
            ['suit' => "spades", 'name' => "8"],
        ]);
        $dealer = new Dealer();
        $this->assertEquals(false, $dealer->stick($hand));
    }
    public function test_dealer_sticks_on_17_with_ace()
    {
        $hand = new Hand([
            ['suit' => "diamonds", 'name' => "ace"],
            ['suit' => "spades", 'name' => "6"],
        ]);
        $dealer = new Dealer();
        $this->assertEquals(true, $dealer->stick($hand));
    }
    public function test_dealer_twists_on_16_with_ace()
    {
        $hand = new Hand([
            ['suit' => "diamonds", 'name' => "ace"],
            ['suit' => "spades", 'name' => "5"],
        ]);
        $dealer = new Dealer();
        $this->assertEquals(false, $dealer->stick($hand));
    }
    public function test_dealer_twists_with_2_aces()
    {
        $hand = new Hand([
            ['suit' => "diamonds", 'name' => "ace"],
            ['suit' => "spades", 'name' => "ace"],
        ]);
        $dealer = new Dealer();
        $this->assertEquals(false, $dealer->stick($hand));
    }
    public function test_dealer_sticks_with_2_aces_and_5()
    {
        $hand = new Hand([
            ['suit' => "diamonds", 'name' => "ace"],
            ['suit' => "spades", 'name' => "ace"],
            ['suit' => "spades", 'name' => "5"],
        ]);
        $dealer = new Dealer();
        $this->assertEquals(true, $dealer->stick($hand));
    }


}
