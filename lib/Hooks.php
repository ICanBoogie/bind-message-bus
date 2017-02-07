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
use ICanBoogie\MessageBus\Message;
use ICanBoogie\MessageBus\MessageBus;
use ICanBoogie\MessageBus\MessageHandlerProvider;
use ICanBoogie\MessageBus\SimpleMessageBus;
use ICanBoogie\MessageBus\SimpleMessageHandlerProvider;
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

		return array_merge(...$handler_collection);
	}

	/*
	 * Prototype
	 */

	/**
	 * @param Application $app
	 *
	 * @return MessageBus
	 */
	static public function get_message_bus(Application $app)
	{
		return new SimpleMessageBus($app->message_handler_provider, $app->message_pusher);
	}

	/**
	 * @param Application $app
	 *
	 * @return MessageHandlerProvider
	 */
	static public function get_message_handler_provider(Application $app)
	{
		return new SimpleMessageHandlerProvider($app->configs[MessageBusConfig::HANDLERS_CONFIG_NAME]);
	}

	/**
	 * @param Application $app
	 *
	 * @return null
	 */
	static public function get_message_pusher(Application $app)
	{
		// don't know how to push messages yet

		return null;
	}

	/**
	 * @param Controller|PrototypedBindings $controller
	 * @param Message $message
	 *
	 * @return mixed
	 */
	static public function dispatch_message(Controller $controller, Message $message)
	{
		return $controller->app->message_bus->dispatch($message);
	}
}
