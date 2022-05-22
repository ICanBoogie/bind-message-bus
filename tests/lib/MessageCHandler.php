<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Test\ICanBoogie\Binding\MessageBus;

final class MessageCHandler
{
    public function __invoke(MessageC $message): string
    {
        return $message::class;
    }
}