<?php

namespace Bj;

use Bj\Card;

class Deck
{
    /**
     * @var array<Card>
     */
    protected $cards;

    public function __construct()
    {
        foreach (Card::SYMBOLS as $symbol) {
            for ($i = 1; $i <= 13; $i++) {
                $this->cards[] = new Card($symbol, $i);
            }
        }

        shuffle($this->cards);
    }

    public function drawCard(): Card
    {
        $card = array_shift($this->cards);
        if (is_null($card)) {
            throw new \Exception('もう山札がない');
        }

        return $card;
    }
}
