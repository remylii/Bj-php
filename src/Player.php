<?php
namespace Bj;

use Bj\Card;

abstract class Player
{
    /**
     * @var array<Card>
     */
    protected $cards = [];

    public function draw(Card $card)
    {
        array_push($this->cards, $card);
        return true;
    }

    public function getScore()
    {
        $score = 0;
        foreach ($this->cards as $card) {
            $score += $card->score;
        }
        return $score;
    }

    public function showCard(): string
    {
        $arr = [];
        foreach ($this->cards as $card) {
            array_push($arr, $card->info());
        }
        return (count($arr) > 0) ? implode(', ', $arr) : '';
    }
}
