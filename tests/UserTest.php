<?php

namespace Test;

use PHPUnit\Framework\TestCase;
use Bj\User;
use Bj\Player;

class UserTest extends TestCase
{
    public function testConstruct()
    {
        $this->assertClassHasAttribute('cards', User::class);
        $this->assertInstanceOf(Player::class, new User);
    }
}
