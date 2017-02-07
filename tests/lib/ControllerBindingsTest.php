<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ICanBoogie\Binding\MessageBus;

use ICanBoogie\HTTP\Request;
use ICanBoogie\Routing\ClosureController;

class ControllerBindingsTest extends \PHPUnit_Framework_TestCase
{
	public function test_should_dispatch_message_from_controller()
	{
		$message = new MessageA;

		$controller = new ClosureController(function () use ($message) {

			/* @var ControllerBindings $this */

			return $this->dispatch_message($message);

		});

		$this->assertSame("ICanBoogie\\Binding\\MessageBus\\MessageA", $controller(Request::from()));
	}
}
