<?php
namespace Bj;

use Bj\Player;
use Bj\Card;

class Dealer extends Player
{
    /**
     * abstract function
     */
    public function draw(Card $card)
    {
        array_push($this->cards, $card);

        $this->announcement();
        return true;
    }

    private function announcement()
    {
        $count = count($this->cards);
        $str = '秘密です.';
        if ($count <= 1) {
            $card = $this->cards[$count - 1];
            $str = (string)$card->symbol . 'の' . (string)$card->number;
        }
        echo '  ドロー:' . $str . PHP_EOL;
    }
}
