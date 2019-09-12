<?php
namespace Bj;

use Bj\Player;
use Bj\Card;

class User extends Player
{
    public function draw(Card $card)
    {
        array_push($this->cards, $card);

        $this->announcement();
        return true;
    }

    private function announcement()
    {
        $card = $this->cards[(count($this->cards) - 1)];
        echo ' ドロ-: ' . (string)$card->symbol . ' の' . (string)$card->number . PHP_EOL;
    }
}
