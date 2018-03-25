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

use ICanBoogie\Application;
use ICanBoogie\Binding\PrototypedBindings;
use ICanBoogie\MessageBus\Dispatcher;
use ICanBoogie\MessageBus\HandlerProvider;
use ICanBoogie\MessageBus\SimpleDispatcher;
use ICanBoogie\MessageBus\SimpleHandlerProvider;
use ICanBoogie\Routing\Controller;

class Hooks
{
	/*
	 * Config
	 */

	/**
	 * @param array $fragments
	 *
	 * @return array
	 */
	static public function synthesize_handlers_config(array $fragments)
	{
		$handler_collection = [];

		foreach ($fragments as $fragment)
		{
			if (empty($fragment[MessageBusConfig::HANDLERS]))
			{
				continue; // @codeCoverageIgnore
			}

			$handler_collection[] = $fragment[MessageBusConfig::HANDLERS];
		}

		return \array_merge(...$handler_collection);
	}

	/*
	 * Prototype
	 */

	/**
	 * @param Application $app
	 *
	 * @return Dispatcher
	 */
	static public function get_message_bus(Application $app)
	{
		return new SimpleDispatcher($app->message_handler_provider);
	}

	/**
	 * @param Application $app
	 *
	 * @return HandlerProvider
	 */
	static public function get_message_handler_provider(Application $app)
	{
		return new SimpleHandlerProvider($app->configs[MessageBusConfig::HANDLERS_CONFIG_NAME]);
	}

	/**
	 * @param Controller|PrototypedBindings $controller
	 * @param object $message
	 *
	 * @return mixed
	 */
	static public function dispatch_message(Controller $controller, $message)
	{
		return $controller->app->message_bus->dispatch($message);
	}
}
