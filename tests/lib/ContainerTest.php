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

        $this->dispatcher = app()->container->get('test.message_dispatcher'); // @phpstan-ignore-line
    }

    public function test_dispatch(): void
    {
        $this->assertEquals(
            MessageA::class,
            $this->dispatcher->dispatch(new MessageA())
        );
    }
}
