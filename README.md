# bind-message-bus

[![Packagist](https://img.shields.io/packagist/v/icanboogie/bind-message-bus.svg)](https://packagist.org/packages/icanboogie/bind-message-bus)
[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-message-bus/master.svg)](http://travis-ci.org/ICanBoogie/bind-message-bus)
[![HHVM](https://img.shields.io/hhvm/ICanBoogie/bind-message-bus.svg)](http://hhvm.h4cc.de/package/ICanBoogie/bind-message-bus)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-message-bus/master.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-message-bus)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-message-bus/master.svg)](https://coveralls.io/r/ICanBoogie/bind-message-bus)
[![Downloads](https://img.shields.io/packagist/dt/icanboogie/bind-message-bus.svg)](https://packagist.org/packages/icanboogie/bind-message-bus/stats)

The **icanboogie/bind-message-bus** package binds [icanboogie/message-bus][] to [ICanBoogie][].

```php
<?php

use ICanBoogie\MessageBus\SimpleMessageBus;

/* @var \ICanBoogie\Application $app */

$bus = new SimpleMessageBus($app->message_handler_provider, $app->message_pusher);
# or
$bus = $app->message_bus;
```





## Application getters

The following getters are added to the [Application][] class:

- `message_bus`: A [MessageBus][] instance created with `$app->message_handler_provider` and
`$app->message_pusher`.
- `message_handler_provider`: A [MessageHandlerProvider][] instance configured with the
`message-bus-handlers` config.
- `message_pusher`: A [MessagePusher][] instance.





## Configuration
 
The `message-bus` config is used to configure the message bus. Currently only the
`MessageBusConfig::HANDLERS` key is used to define the message handlers, it an array of key/value
pairs where _key_ is a message class and _value_ its handler.

The following example demonstrates how to match messages with handler references. The
[icanboogie/service][] package is used to define the references:

```php
<?php

namespace App\Application\Message;

use function ICanBoogie\Service\ref;

return [

    CreateArticle::class => ref('handler.article.create'),
    DeleteArticle::class => ref('handler.article.delete'),

];
```





----------





## Requirements

The package requires PHP 5.6 or later.





## Installation

The recommended way to install this package is through [Composer](http://getcomposer.org/):

```
$ composer require icanboogie/bind-message-bus
```





### Cloning the repository

The package is [available on GitHub][], its repository can be cloned with the following command
line:

	$ git clone https://github.com/ICanBoogie/bind-message-bus.git





## Documentation

The package is documented as part of the [ICanBoogie][] framework [documentation][]. You can
generate the documentation for the package and its dependencies with the `make doc` command. The
documentation is generated in the `build/docs` directory. [ApiGen](http://apigen.org/) is required.
The directory can later be cleaned with the `make clean` command.





## Testing

The test suite is ran with the `make test` command. [PHPUnit](https://phpunit.de/) and
[Composer](http://getcomposer.org/) need to be globally available to run the suite. The command
installs dependencies as required. The `make test-coverage` command runs test suite and also creates
an HTML coverage report in `build/coverage`. The directory can later be cleaned with the `make
clean` command.

The package is continuously tested by [Travis CI](http://about.travis-ci.org/).

[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-message-bus/master.svg)](http://travis-ci.org/ICanBoogie/bind-message-bus)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-message-bus/master.svg)](https://coveralls.io/r/ICanBoogie/bind-message-bus)





## License

**icanboogie/bind-message-bus** is licensed under the New BSD License - See the [LICENSE](LICENSE) file for details.





[Application]:                  https://icanboogie.org/docs/4.0/the-application-class
[MessageBus]:                   https://api.icanboogie.org/message-bus/latest/class-ICanBoogie.MessageBus.MessageBus.html
[MessageHandlerProvider]:       https://api.icanboogie.org/message-bus/latest/class-ICanBoogie.MessageBus.MessageHandlerProvider.html
[MessagePusher]:                https://api.icanboogie.org/message-bus/latest/class-ICanBoogie.MessageBus.MessagePusher.html
[documentation]:                https://api.icanboogie.org/bind-message-bus/latest/
[available on GitHub]:          https://github.com/ICanBoogie/bind-message-bus
[icanboogie/message-bus]:       https://github.com/ICanBoogie/message-bus
[icanboogie/service]:           https://github.com/ICanBoogie/Service
[ICanBoogie]:                   https://icanboogie.org
