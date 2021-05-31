# bind-message-bus

[![Packagist](https://img.shields.io/packagist/v/icanboogie/bind-message-bus.svg)](https://packagist.org/packages/icanboogie/bind-message-bus)
[![Build Status](https://img.shields.io/github/workflow/status/ICanBoogie/bind-message-bus/test)](https://github.com/ICanBoogie/bind-message-bus/actions?query=workflow%3Atest)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-message-bus.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-message-bus)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-message-bus.svg)](https://coveralls.io/r/ICanBoogie/bind-message-bus)
[![Downloads](https://img.shields.io/packagist/dt/icanboogie/bind-message-bus.svg)](https://packagist.org/packages/icanboogie/bind-message-bus/stats)

The **icanboogie/bind-message-bus** package binds [icanboogie/message-bus][] to [ICanBoogie][].

```php
<?php

use ICanBoogie\MessageBus\SimpleDispatcher;

/* @var \ICanBoogie\Application $app */

$bus = new SimpleDispatcher($app->message_handler_provider);
# or
$bus = $app->message_bus;
```





## Bindings





### Application bindings

The following getters are added to the [Application][] class:

- `message_bus`: A [Dispatcher][] instance created with `$app->message_handler_provider` and
`$app->message_pusher`.
- `message_handler_provider`: A [HandlerProvider][] instance configured with the
`message-bus-handlers` config.

```php
<?php

/* @var \ICanBoogie\Application $app */

$app->message_bus;
$app->message_handler_provider;
```





### Controller bindings

The following method is added to the [Controller][] class:

- `mixed dispatch_message($message)`: Dispatch a message using `$this->app->command_bus`.

Use the [ControllerBindings][] trait with your controller to type hint the bindings.

```php
<?php

use ICanBoogie\Routing\Controller;

class ProductController extends Controller
{
    use Controller\ActionTrait;
    use \ICanBoogie\Binding\MessageBus\ControllerBindings;

    protected function action_create()
    {
        $message = new CreateProduct($this->request['payload']);
        $result = $this->dispatch_message($message);

        return $this->respond($result);
    }
}
```





## Configuration

The `message-bus` config is used to configure the message bus. Message handlers are defined with an
array of key/pair values with key `MessageBusConfig::HANDLERS`, where _key_ is a message class and
_value_ its handler (a callable).

The following example demonstrates how to match messages with handler references. The
[icanboogie/service][] package provides the `ref()` method used to define the references:

```php
<?php

namespace App\Application\Message;

use function ICanBoogie\Service\ref;
use ICanBoogie\Binding\MessageBus\MessageBusConfig;

return [

    MessageBusConfig::HANDLERS => [

        CreateArticle::class => ref('handler.article.create'),
        DeleteArticle::class => ref('handler.article.delete'),

    ]

];
```





----------





## Requirements

The package requires PHP 7.2 or later.





## Installation

```bash
composer require icanboogie/bind-message-bus
```





## Documentation

The package is documented as part of the [ICanBoogie][] framework [documentation][]. You can
generate the documentation for the package and its dependencies with the `make doc` command. The
documentation is generated in the `build/docs` directory. [ApiGen](http://apigen.org/) is required.
The directory can later be cleaned with the `make clean` command.





## Testing

Run `make test-container` to create and log into the test container, then run `make test` to run the
test suite. Alternatively, run `make test-coverage` to run the test suite with test coverage. Open
`build/coverage/index.html` to see the breakdown of the code coverage.





## License

**icanboogie/bind-message-bus** is released under the [New BSD License](LICENSE).





[ICanBoogie]:                   https://icanboogie.org
[Dispatcher]:                   https://icanboogie.org/api/message-bus/master/class-ICanBoogie.MessageBus.Dispatcher.html
[HandlerProvider]:              https://icanboogie.org/api/message-bus/master/class-ICanBoogie.MessageBus.HandlerProvider.html
[Controller]:                   https://icanboogie.org/api/routing/master/class-ICanBoogie.Routing.Controller.html
[documentation]:                https://icanboogie.org/api/bind-message-bus/master/
[ControllerBindings]:           https://icanboogie.org/api/bind-message-bus/master/class-ICanBoogie.Binding.MessageBus.ControllerBindings.html
[Application]:                  https://icanboogie.org/docs/4.0/the-application-class
[available on GitHub]:          https://github.com/ICanBoogie/bind-message-bus
[icanboogie/message-bus]:       https://github.com/ICanBoogie/message-bus
[icanboogie/service]:           https://github.com/ICanBoogie/Service
