<?php
namespace Bj;

use Bj\Player;
use Bj\Deck;

class User extends Player
{
    /**
     * abstract function
     */
    public function draw(Deck $deck)
    {
        $this->cards[] = $deck->drawCard();

        $this->announcement();
        return true;
    }

    private function announcement()
    {
        $card = $this->cards[(count($this->cards) - 1)];
        echo sprintf(' ドロ-: %s の %d.', $card->symbol, $card->number) . PHP_EOL;
    }
}
