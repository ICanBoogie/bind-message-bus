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

use ICanBoogie\MessageBus\Dispatcher;
use ICanBoogie\MessageBus\HandlerProvider;

/**
 * Prototype bindings for {@link \ICanBoogie\Application}.
 *
 * @property-read Dispatcher $message_bus
 * @property-read HandlerProvider $message_handler_provider
 */
trait ApplicationBindings
{

}
