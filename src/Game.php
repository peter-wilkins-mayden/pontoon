<?php

class Game
{

    public $hands;
    public $accounts;
    public $players;
    public $deck;
    public $dealer;

    public function __construct($players, $accountStart, $decks)
    {
        $this->deck = new Deck($decks);
        foreach ($players as $player) {
            $this->players[$player] = new $player;
            $this->accounts[$player] = $accountStart;
        }
        $this->dealer = new Dealer;
    }

    public function runGame($numberRounds)
    {

        for ($i = 0; $i<$numberRounds; $i++) {
            $this->playRound();
            if (count($this->deck)<52) {
                $this->deck = new Deck(4);
            }

        }
        foreach ($this->players as $name => $player) {
            echo $name . ' has £' . $this->accounts[$name] . "\n";
        }
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
        return ! $player->play($this->hands[$name]);
    }

    public function playRound()
    {
        foreach ($this->players as $name => $player) {
            $this->dealCards($name);
            $this->accounts[$name] -= 1;
            $this->hands[$name] = new Hand($this->deck->dealCards(2));
            $play = $this->players[$name]->play($this->hands[$name]);
            while ($play != 0) {
                switch (play) {
                    case 1:  // twist
                        $play = $this->hitAndPlay($name);
                        continue;
                    case 2:   // double down
                        $play = $this->hitAndPlay($name);
                        continue;
                    case 3:  //  surrender
                        $this->accounts[$name] += 0.5;
                        $play = 0;
                        continue;
                    //case 4:   // todo split
                      //  $play = $this->hitAndPlay($name);
                }
            }
            $this->dealCards('Dealer');
            while ($this->isNotBust('Dealer') && $this->twist($this->dealer, 'Dealer')) {
                $this->hit('Dealer');
            }
            foreach ($this->players as $name => $player) {
                $scores = $this->scoreHand($name); // sort out money
                $dealerScores = $this->scoreHand('dealer');
                if ($scores['blackjack'] && $dealerScores['blackjack']) {
                    $this->accounts[$name] += 1; // push - return bet
                }
                if ($dealerScores['bust'] ||
                    $this->scoreHand($name) > $this->scoreHand('Dealer') ||
                    $this->hands[$name]->count()>=5
                ) {
                    $this->accounts[$name] += 2;
                }
            }
        }
    }

    /**
     * @param $name
     */
    private
    function hit(
        $name
    ) {
        $this->hands[$name]->addCard($this->deck->hit());
    }

    /**
     * @param $name
     * @return mixed
     */
    private function hitAndPlay($name)
    {
        $this->hit($name);
        $play = $this->players[$name]->play($this->hands[$name]);

        return $play;
    }

}
