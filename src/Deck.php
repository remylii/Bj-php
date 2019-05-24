<?php

namespace Bj;

use Bj\Card;

class Deck
{
    const SYMBOL = ['Spade', 'Club', 'Heart', 'Diamond'];

    /**
     * @var array<Card>
     */
    protected $cards;

    protected $index = 0;

    public function __construct()
    {
        foreach (static::SYMBOL as $symbol) {
            for ($i = 1; $i <= 13; $i++) {
                $this->cards[] = new Card($symbol, $i);
            }
        }

        $this->deckShuffle();
    }

    public function drawCard()
    {
        if (!array_key_exists($this->index, $this->cards)) {
            throw new \Exception('もう山札がない');
        }

        $this->index++;
        return $this->cards[$this->index];
    }

    public function deckShuffle()
    {
        shuffle($this->cards);
    }
}
