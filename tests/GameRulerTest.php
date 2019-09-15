<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use Bj\Libs\Traits\GameRulerInterface;

class GameRulerTest extends TestCase
{
    protected $ruler;

    public function setUp(): void
    {
        $this->ruler = new class implements GameRulerInterface {
            use \Bj\Libs\Traits\GameRulerTrait;
        };
    }

    public function testIsBurst()
    {
        $this->assertTrue($this->ruler->isBurst(22));
        $this->assertTrue($this->ruler->isBurst(100));

        $this->assertFalse($this->ruler->isBurst(21));
        $this->assertFalse($this->ruler->isBurst(0));
    }

    public function testIsDealerStopScore()
    {
        $this->assertTrue($this->ruler->isDealerStopScore(18));
        $this->assertTrue($this->ruler->isDealerStopScore(21));
        $this->assertFalse($this->ruler->isDealerStopScore(17));
        $this->assertFalse($this->ruler->isDealerStopScore(0));
    }
}
