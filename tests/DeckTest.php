<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Bj\Deck;

class DeckTest extends TestCase
{
    /** @var Deck */
    protected $deck;

    public function setUp(): void
    {
        $this->deck = new Deck();
    }

    public function testConstruct()
    {
        for ($i = 0; $i < 52; $i++) {
            $card = $this->deck->drawCard();
            $this->assertInstanceOf(\Bj\Card::class, $card);
        }
    }

    public function testDrawCardException()
    {
        $this->expectException(\Exception::class);
        for ($i = 0; $i < 53; $i++) {
            $this->deck->drawCard();
        }
    }
}
