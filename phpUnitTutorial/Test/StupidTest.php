<?php

namespace phpUnitTutorial\Test;

class StupidTest extends \PHPUnit\Framework\TestCase
{
    public function testTrueIsTrue()
    {
        $foo = true;
        $this->assertTrue($foo);
    }
}