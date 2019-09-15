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
}
