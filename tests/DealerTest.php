<?php
namespace Test;

use PHPUnit\Framework\TestCase;
use Bj\Dealer;
use Bj\Player;

class DealerTest extends TestCase
{
    public function testConstruct()
    {
        $this->assertClassHasAttribute('cards', Dealer::class);
        $this->assertInstanceOf(Player::class, new Dealer);
    }
}
