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

$hooks = Hooks::class . '::';

return [

	'ICanBoogie\Application::lazy_get_message_bus'              => $hooks . 'get_message_bus',
	'ICanBoogie\Application::lazy_get_message_handler_provider' => $hooks . 'get_message_handler_provider',
	'ICanBoogie\Routing\Controller::dispatch_message'           => $hooks . 'dispatch_message',

];
