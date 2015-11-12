<?php

class Game
{

    public $hands;
    public $accounts;
    public $players;
    public $deck;
    public $dealer;

    public function runGame()
    {

        //while( ! in_array(0, $this->accounts)) {
         for($i = 0 ; $i <10 ; $i++) {
            $this->playRound();

        }
    }

    public function __construct($players, $accountStart, $decks)
    {
        $this->deck = new Deck($decks);
        foreach ($players as $player) {
            $this->players[$player] = new $player;
            $this->accounts[$player] = $accountStart;
        }
        $this->dealer = new Dealer;
    }

    /**
     * @param $name
     */
    private function dealCards($name)
    {
        $this->hands[$name] = new Hand($this->deck->dealCards(2));
    }

    /**
     * @param $name
     * @return bool
     */
    private function isNotBust($name)
    {
        return min($this->hands[$name]->scoreHand())<=21;
    }
    private function isBust($name)
    {
        return min($this->hands[$name]->scoreHand())>21;
    }
    private function scoreHand($name)
    {
        return $this->hands[$name]->scoreHand();
    }
    /**
     * @param $player
     * @param $name
     * @return bool
     */
    private function twist($player, $name)
    {
        return ! $player->stick($this->hands[$name]);
    }

    public function playRound()
    {
        foreach ($this->players as $name => $player) {
            $this->dealCards($name);
            $this->accounts[$name] -= 1;
            while ($this->isNotBust($name) && $this->twist($player, $name)) {
                $this->hit($name);
            }
        }
        $this->dealCards('Dealer');
        while ($this->isNotBust('Dealer') && $this->twist($this->dealer, 'Dealer')) {
            $this->hit('Dealer');
        }
        foreach ($this->players as $name => $player) {
            echo $name . ' has £' . $this->accounts[$name] . "\n";
            if ($this->isNotBust($name)){
                if( $this->isBust('Dealer') ||
                    $this->scoreHand($name) > $this->scoreHand('Dealer') ||
                    $this->hands[$name]->count() >= 5) {
                    $this->accounts[$name] += 2;
                }
            }
        }
    }

    /**
     * @param $name
     */
    private function hit($name)
    {
        $this->hands[$name]->addCard($this->deck->hit());
    }

}
