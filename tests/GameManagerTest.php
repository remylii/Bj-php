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
        $this->assertTrue(method_exists($gm, 'gameResult'), 'Class does not have method gameset');
        $this->assertTrue(method_exists($gm, 'isBurst'), 'Class does not have method isBurst');
    }

    public function testGameResult()
    {
        $gm = new GameManager();
        \ob_start();
        $gm->gameResult();
        $output_contents = \ob_get_clean();

        $this->assertSame($gm::DRAW_GAME . PHP_EOL . "結果: 0, 0\n", $output_contents);
    }

    public function testAnnounce()
    {
        $expect = 'ああああaaaaa';
        $gm = new GameManager();
        \ob_start();

        $gm->announce($expect);
        $output_contents = \ob_get_clean();

        $this->assertSame($expect, $output_contents);
    }
}
