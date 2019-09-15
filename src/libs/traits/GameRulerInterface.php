<?php

namespace Bj\Libs\Traits;

interface GameRulerInterface
{
    const BJ_SCORE = 21;
    const DEALER_STOP_SCORE = 18;

    public function isDealerStopScore(int $score): bool;

    public function isBurst(int $score): bool;
}
