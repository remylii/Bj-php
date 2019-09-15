<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use Bj\Player;
use Bj\Card;

class PlayerTest extends TestCase
{
    /** @var Player */
    private $player;

    public function setUp(): void
    {
        $this->player = new class extends Player {
        };
    }

    /**
     * @dataProvider getScoreProvider
     */
    public function testGetScore($expect, $args)
    {
        foreach ($args as $arg) {
            $card = new Card($arg[0], $arg[1]);
            $this->player->draw($card);
        }

        $this->assertSame($expect, $this->player->getScore());
    }

    public function getScoreProvider(): array
    {
        return [
            [1, [["Spade", 1]]],
            [20, [["Spade", 10], ["Spade", 13]]],
            [31, [["Spade", 1], ["Club", 10], ["Heart", 11], ["Diamond", 12]]]
        ];
    }

    /**
     * @dataProvider showCardProvider
     */
    public function testShowCard($expect, $args)
    {
        foreach ($args as $arg) {
            $card = new Card($arg[0], $arg[1]);
            $this->player->draw($card);
        }

        $this->assertSame($expect, $this->player->showCard());
    }

    public function showCardProvider(): array
    {
        return [
            "カード1枚" => [
                "Spadeの1", [
                    ["Spade", 1],
                ],
            ],
            "カード2枚" => [
                "Spadeの13, Heartの2", [
                    ["Spade", 13],
                    ["Heart", 2]
                ],
            ],
            "カード3枚" => [
                "Diamondの9, Diamondの10, Diamondの11", [
                    ["Diamond", 9],
                    ["Diamond", 10],
                    ["Diamond", 11],
                ],
            ]
        ];
    }
}
