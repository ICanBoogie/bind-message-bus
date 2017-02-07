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

return [

	MessageBusConfig::HANDLERS => [

		MessageA::class => function (MessageA $message) {

			return get_class($message);

		},

		MessageB::class => function (MessageB $message) {

			return get_class($message);

		}

	]

];
