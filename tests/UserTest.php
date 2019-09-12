<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Bj\User;
use Bj\Card;

class UserTest extends TestCase
{
    /** @var User */
    private $user;

    public function setUp(): void
    {
        $this->user = new User();
    }

    /**
     * @dataProvider getScoreProvider
     */
    public function testGetScore($expect, $args)
    {
        foreach ($args as $arg) {
            $card = new Card($arg[0], $arg[1]);
            $this->user->draw($card);
        }

        $this->assertSame($expect, $this->user->getScore());
    }

    public function getScoreProvider(): array
    {
        return [
            [1, [["Spade", 1]]],
            [20, [["Spade", 10], ["Spade", 13]]],
            [31, [["Spade", 1], ["Club", 10], ["Heart", 11], ["Diamond", 12]]]
        ];
    }
}
