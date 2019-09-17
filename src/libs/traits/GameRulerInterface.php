<?php

namespace Bj\Libs\Traits;

interface GameRulerInterface
{
    const BJ_SCORE = 21;
    const DEALER_STOP_SCORE = 18;
    const PLAYER = 'player';
    const DEALER = 'dealer';
    const NOGAME = 'nogame';

    public function isDealerStopScore(int $score): bool;

    public function isBurst(int $score): bool;

    public function whoIsWinner(int $player_score, int $dealer_score): string;
}
