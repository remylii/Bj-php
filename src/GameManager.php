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

        while (true) {
            echo '現在のScore: ' . $this->user->getScore() . PHP_EOL;
            if ($this->isBurst($this->user->getScore())) {
                return $this->gameset();
            }

            echo 'Please enter `y or Q` > ';
            $stdin = trim(fgets(STDIN));
            if ($stdin === 'Q' || $stdin === 'q') {
                echo 'Playerはstayを宣言' . PHP_EOL;
                break;
            }

            $this->user->draw($deck->drawCard());
        }

        echo 'Dealerのターン' . PHP_EOL;
        $this->dealer->draw($deck->drawCard());
        $this->dealer->draw($deck->drawCard());
        while (true) {
            if ($this->isBurst($this->dealer->getScore())) {
                return $this->gameset();
            }

            $this->dealer->draw($deck->drawCard());
        }

        echo sprintf("%d : %d", $this->user->getScore(), $this->dealer->getScore()) . PHP_EOL;
        return;
    }

    public function gameset()
    {
        $str = '';
        if ($this->isBurst($this->user->getScore())) {
            $str = static::LOSE_GAME;
        } elseif ($this->isBurst($this->dealer->getScore()) || $this->user->getScore() > $this->dealer->getScore()) {
            $str = static::WIN_GAME;
        } elseif ($this->user->getScore === $this->dealer->getScore()) {
            $str = static::DRAW_GAME;
        } else {
            $str = static::LOSE_GAME;
        }

        echo PHP_EOL . '>>>  GAME RESULT  <<<' . PHP_EOL;
        echo $str . PHP_EOL;
        echo sprintf("%d : %d", $this->user->getScore(), $this->dealer->getScore()) . PHP_EOL;
        return;
    }
}
