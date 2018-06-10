<?php

namespace phpUnitTutorial\Test;

class BadCodeTest extends \PHPUnit\Framework\TestCase
{
	public function testAuthorizeExitsWhenPasswordNotSet()
	{
		$user = array('username' => 'jtreminio');
		$password = 'foo';

		$badCode = $this->getMockBuilder('phpUnitTutorial\BadCode')
			->setConstructorArgs(array($user))
			->setMethods(array('callExit'))
			->getMock();

		$badCode->expects($this->once())
			->method('callExit');

		$this->expectOutputString('YOU SHALL NOT PASS');

		$badCode->authorize($password);
	}
}