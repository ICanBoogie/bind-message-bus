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
use ICanBoogie\MessageBus\MessagePusher;

/**
 * Prototype bindings for {@link \ICanBoogie\Application}.
 *
 * @property-read MessageBus $message_bus
 * @property-read MessageHandlerProvider $message_handler_provider
 * @property-read MessagePusher $message_pusher
 */
trait ApplicationBindings
{

}
