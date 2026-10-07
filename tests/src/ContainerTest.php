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

use ICanBoogie\MessageBus\Dispatcher;
use PHPUnit\Framework\TestCase;

use function ICanBoogie\app;

final class ContainerTest extends TestCase
{
    private Dispatcher $dispatcher;

    protected function setUp(): void
    {
        parent::setUp();

        $this->dispatcher = app()->service_for_id('test.message_dispatcher', Dispatcher::class);
    }

    public function test_dispatch(): void
    {
        $actual = $this->dispatcher->dispatch(new MessageA());

        $this->assertEquals(MessageA::class, $actual);
    }
}
