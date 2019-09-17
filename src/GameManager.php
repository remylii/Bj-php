<?php
namespace Bj;

use Bj\Libs\Traits\GameRulerInterface;
use Bj\Deck;
use Bj\Dealer;
use Bj\User;

class GameManager implements GameRulerInterface
{
    use Libs\Traits\GameRulerTrait;

    const WIN_GAME  = 'YOU WIN!';
    const LOSE_GAME = 'YOU LOSE! なんで負けたか明日までに考えといてください';
    const DRAW_GAME = 'DRAW GAME.';

    /**
     * @var Deck
     */
    protected $deck;

    /**
     * @var Player
     */
    protected $dealer;
    protected $user;

    public function __construct()
    {
        $this->dealer = new Dealer();
        $this->user = new User;
    }

    public function start()
    {
        $deck = new Deck();

        $this->user->draw($deck->drawCard());
        $this->user->draw($deck->drawCard());
        $this->announce($this->user->showCard() . PHP_EOL);

        while (true) {
            if ($this->isBurst($this->user->getScore())) {
                $this->gameResult();
                return;
            }

            $this->announce('ドローの場合は何かしらを、stay宣言の場合は `Q` を入力してください > ');
            $stdin = trim(fgets(STDIN));
            if ($stdin === 'Q' || $stdin === 'q') {
                $this->announce('Playerはstayを宣言' . PHP_EOL);
                break;
            }

            $this->user->draw($deck->drawCard());
            $this->announce($this->user->showCard() . PHP_EOL);
        }

        $this->announce('Dealerのターン' . PHP_EOL);
        $this->dealer->draw($deck->drawCard());
        $this->announce($this->dealer->showCard() . PHP_EOL);
        $this->dealer->draw($deck->drawCard());

        while (true) {
            if ($this->isBurst($this->dealer->getScore())) {
                $this->gameResult();
                return;
            }

            $this->dealer->draw($deck->drawCard());

            if ($this->isDealerStopScore($this->dealer->getScore())) {
                break;
            }
        }

        $this->gameResult();
        return;
    }

    public function gameResult(): void
    {
        $player_score = $this->user->getScore();
        $dealer_score = $this->dealer->getScore();
        $res = $this->whoIsWinner($player_score, $dealer_score);
        $prefix = '';
        if ($res === self::PLAYER) {
            $prefix = self::WIN_GAME;
        } elseif ($res === self::DEALER) {
            $prefix = self::LOSE_GAME;
        } else {
            $prefix = self::DRAW_GAME;
        }
        $this->announce($prefix . PHP_EOL . "結果: " . $player_score . ', ' . $dealer_score . PHP_EOL);
    }

    public function announce(string $str): void
    {
        echo $str;
    }
}
