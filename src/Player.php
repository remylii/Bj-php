<?php
namespace Bj;

use Bj\Deck;

abstract class Player
{
    /**
     * @var array<CardEntity>
     */
    protected $cards = [];

    abstract public function draw(Deck $deck);

    public function getScore()
    {
        $score = 0;
        foreach ($this->cards as $card) {
            $score += $card->score;
        }
        return $score;
    }

    public function isBurst()
    {
        return ($this->getScore() > 21);
    }
}
