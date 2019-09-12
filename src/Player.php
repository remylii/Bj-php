<?php
namespace Bj;

use Bj\Card;

abstract class Player
{
    /**
     * @var array<Card>
     */
    protected $cards = [];

    abstract public function draw(Card $card);

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
