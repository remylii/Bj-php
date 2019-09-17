<?php
namespace Bj\Libs\Traits;

trait GameRulerTrait
{
    public function isDealerStopScore(int $score): bool
    {
        return ($score >= self::DEALER_STOP_SCORE);
    }

    public function isBurst(int $score): bool
    {
        return ($score > self::BJ_SCORE);
    }

    public function whoIsWinner(int $player_score, int $dealer_score): string
    {
        if ($player_score > self::BJ_SCORE) {
            return self::DEALER;
        }

        if ($dealer_score > self::BJ_SCORE) {
            return self::PLAYER;
        }

        if ($player_score === $dealer_score) {
            return self::NOGAME;
        }

        if ($player_score > $dealer_score) {
            return self::PLAYER;
        }

        return self::DEALER;
    }
}
