<?php
namespace Bj\Libs\Traits;

trait GameRulerTrait
{
    public function isBurst(int $score): bool
    {
        return ($score > self::BJ_SCORE);
    }
}
