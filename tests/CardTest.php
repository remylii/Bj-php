<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Bj\Card;

class CardTest extends TestCase
{
    /**
     * @dataProvider constructProvider
     */
    public function testConstruct($expect_symbol, $expect_number, $expect_label, $expect_score, $params)
    {
        $card = new Card($params[0], $params[1]);

        $this->assertSame($expect_symbol, $card->symbol);
        $this->assertSame($expect_number, $card->number);
        $this->assertSame($expect_label, $card->label);
        $this->assertSame($expect_score, $card->score);
    }

    public function constructProvider(): array
    {
        return [
            ["Spade",    1, "A",  1,  ["Spade",   1]],
            ["Spade",   10, "10", 10, ["Spade",   10]],
            ["Spade",   11, "J",  10, ["Spade",   11]],
            ["Spade",   12, "Q",  10, ["Spade",   12]],
            ["Spade",   13, "K",  10, ["Spade",   13]],
            ["Club",     1, "A",  1,  ["Club",    1]],
            ["Club",    10, "10", 10, ["Club",    10]],
            ["Club",    11, "J",  10, ["Club",    11]],
            ["Club",    12, "Q",  10, ["Club",    12]],
            ["Club",    13, "K",  10, ["Club",    13]],
            ["Heart",    1, "A",  1,  ["Heart",   1]],
            ["Heart",   10, "10", 10, ["Heart",   10]],
            ["Heart",   11, "J",  10, ["Heart",   11]],
            ["Heart",   12, "Q",  10, ["Heart",   12]],
            ["Heart",   13, "K",  10, ["Heart",   13]],
            ["Diamond",  1, "A",  1,  ["Diamond", 1]],
            ["Diamond", 10, "10", 10, ["Diamond", 10]],
            ["Diamond", 11, "J",  10, ["Diamond", 11]],
            ["Diamond", 12, "Q",  10, ["Diamond", 12]],
            ["Diamond", 13, "K",  10, ["Diamond", 13]],
        ];
    }

    /**
     * @dataProvider constructExcpetionProvider
     */
    public function testConstructException($expect_exception, $symbol, $number)
    {
        $this->expectException($expect_exception);

        $card = new Card($symbol, $number);
    }

    public function constructExcpetionProvider(): array
    {
        return [
            [\InvalidArgumentException::class, "Spade", 0],
            [\InvalidArgumentException::class, "Spade", 14],
            [\InvalidArgumentException::class, "Star", 1],
        ];
    }
}
