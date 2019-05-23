<?php
namespace Bj;

use Bj\Player;
use Bj\Deck;

class Dealer extends Player
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
        $count = count($this->cards);
        $str = '秘密です.';
        if ($count <= 1) {
            $card = $this->cards[$count - 1];
            $str = sprintf(' %s の %d.', $card->symbol, $card->number);
        }
        echo '  ドロー:' . $str . PHP_EOL;
    }
}
