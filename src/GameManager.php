<?php
namespace Bj;

use Bj\Deck;
use Bj\Dealer;
use Bj\User;

class GameManager
{
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
        $this->deck = new Deck();
        $this->dealer = new Dealer();
        $this->user = new User;
    }

    public function start()
    {
        $this->user->draw($this->deck);
        $this->user->draw($this->deck);

        while (true) {
            echo '現在のScore: ' . $this->user->getScore() . PHP_EOL;
            if ($this->user->isBurst()) {
                return $this->gameset();
            }

            echo 'Please enter `y or Q` > ';
            $stdin = trim(fgets(STDIN));
            if ($stdin === 'Q' || $stdin === 'q') {
                echo 'Playerはstayを宣言' . PHP_EOL;
                break;
            }

            $this->user->draw($this->deck);
        }

        echo 'Dealerのターン' . PHP_EOL;
        $this->dealer->draw($this->deck);
        $this->dealer->draw($this->deck);
        while (true) {
            if ($this->dealer->isBurst()) {
                return $this->gameset();
            }

            $this->dealer->draw($this->deck);
        }

        echo sprintf("%d : %d", $this->user->getScore(), $this->dealer->getScore()) . PHP_EOL;
        return;
    }

    public function gameset()
    {
        $str = '';
        if ($this->user->isBurst()) {
            $str = static::LOSE_GAME;
        } elseif ($this->dealer->isBurst() || $this->user->getScore() > $this->dealer->getScore()) {
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
