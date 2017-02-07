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

use ICanBoogie\MessageBus\MessageBus;
use ICanBoogie\MessageBus\MessageHandlerProvider;
use function ICanBoogie\app;

class BindingTest extends \PHPUnit_Framework_TestCase
{
	public function test_should_have_handlers_config()
	{
		$config = app()->configs[MessageBusConfig::HANDLERS_CONFIG_NAME];

		$this->assertArrayHasKey(MessageA::class, $config);
		$this->assertArrayHasKey(MessageB::class, $config);
		$this->assertArrayHasKey(MessageC::class, $config);
		$this->assertInstanceOf(\Closure::class, $config[MessageA::class]);
		$this->assertInstanceOf(\Closure::class, $config[MessageB::class]);
		$this->assertInstanceOf(\Closure::class, $config[MessageC::class]);
	}

	/**
	 * @dataProvider provide_test_getters
	 *
	 * @param string $property
	 * @param string|null $expected_class
	 */
	public function test_getters($property, $expected_class)
	{
		$service = app()->$property;

		if ($expected_class)
		{
			$this->assertInstanceOf($expected_class, $service);
		}
		else
		{
			$this->assertNull($service);
		}

		$this->assertSame($service, app()->$property);
	}

	public function provide_test_getters()
	{
		return [

			[ 'message_bus',              MessageBus::class ],
			[ 'message_handler_provider', MessageHandlerProvider::class ],
			[ 'message_pusher',           null ],

		];
	}
}
