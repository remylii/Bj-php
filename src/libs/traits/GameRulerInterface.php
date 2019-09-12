<?php

namespace Bj\Libs\Traits;

interface GameRulerInterface
{
    const BJ_SCORE = 21;

    public function isBurst(int $score): bool;
}
