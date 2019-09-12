<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Bj\GameManager;

class GameManagerTest extends TestCase
{
    public function testConstruct()
    {
        $gm = new GameManager;
        $this->assertInstanceOf(\Bj\Libs\Traits\GameRulerInterface::class, $gm);

        $this->assertTrue(method_exists($gm, 'start'), 'Class does not have method start');
        $this->assertTrue(method_exists($gm, 'gameset'), 'Class does not have method gameset');
        $this->assertTrue(method_exists($gm, 'isBurst'), 'Class does not have method isBurst');
    }
}
