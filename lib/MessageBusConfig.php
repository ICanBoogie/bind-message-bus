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

/**
 * Defines keys of the MessageBus config.
 */
interface MessageBusConfig
{
	/**
	 * Name of the message bus handlers config.
	 */
	const HANDLERS_CONFIG_NAME = 'message-bus-handlers';

	/**
	 * An array of key/value pairs where _key_ is a message class and _value_ its handler.
	 */
	const HANDLERS = 'handlers';
}
