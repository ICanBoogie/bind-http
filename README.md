# bind-http

[![Release](https://img.shields.io/packagist/v/icanboogie/bind-http.svg)](https://packagist.org/packages/icanboogie/bind-http)
[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-http.svg)](http://travis-ci.org/ICanBoogie/bind-http)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-http.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-http)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-http.svg)](https://coveralls.io/r/ICanBoogie/bind-http)
[![Packagist](https://img.shields.io/packagist/dt/icanboogie/bind-http.svg)](https://packagist.org/packages/icanboogie/bind-http)

The **icanboogie/bind-http** package binds [icanboogie/http][] to [ICanBoogie][].




## Defining domain dispatchers using config fragments

Domain dispatchers may be defined using configuration fragments. One actually define dispatcher
constructors as a class name or a callable, that would return a dispatcher. Constructor class should
extend the [AbstractDispatcherConstructor][].

The following example demonstrates how some domain dispatchers may be defined:

```php
<?php

// config/http.php

use ICanBoogie\Binding\HTTP\DispatcherConfig as Config;

return [

	'dispatchers' => [

		'pages' => [

			Config::CONSTRUCTOR => \Icybee\Modules\Pages\PageDispatcher::class,
			Config::WEIGHT => Config::WEIGHT_BOTTOM

		],

		'routing' => \ICanBoogie\Routing\RouteDispatcher::class,

		'operation' => [

			Config::CONSTRUCTOR => \ICanBoogie\Operation\OperationDispatcher::class,
			Config::WEIGHT => Config::WEIGHT_BEFORE_PREFIX . 'routing'

		]

	]

];
```

The dispatchers configuration may be obtained through the application:

```php
<?php

// …

$config = $app->configs['http_dispatchers'];
```





## Prototype methods

The following prototype methods are defined, the [ApplicationBindings][] trait may be used for type
hinting:

- `ICanBoogie\Application::get_initial_request`: Returns the initial request.
- `ICanBoogie\Application::get_request`: Returns the current request.
- `ICanBoogie\Application::get_dispatcher`: Returns the request dispatcher.

The following example demonstrates how this getters may be used:

```php
<?php

namespace ICanBoogie;

require 'vendor/autoload.php';

$app = boot();

$initial_request = $app->initial_request;
$request = $app->request;
$dispatcher = $app->dispatcher;
```




## Event hooks

The following event hooks are attached:

- `ICanBoogie\Application::configure`: Used to define an instance of [ProvideDispatcher][] as
dispatcher provider. This provider uses the `http_dispatchers` configuration to create the request
dispatcher.





----------





## Requirements

The package requires PHP 5.6 or later.





## Installation

The recommended way to install this package is through [Composer](http://getcomposer.org/):

```
$ composer require icanboogie/bind-http
```





### Cloning the repository

The package is [available on GitHub](https://github.com/ICanBoogie/bind-http), its repository can be
cloned with the following command line:

	$ git clone https://github.com/ICanBoogie/bind-http.git





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

[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-http.svg)](http://travis-ci.org/ICanBoogie/bind-http)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-http.svg)](https://coveralls.io/r/ICanBoogie/bind-http)





## License

**icanboogie/bind-http** is licensed under the New BSD License - See the [LICENSE](LICENSE) file for details.





[documentation]:                 https://icanboogie.org/api/bind-http/3.0/
[AbstractDispatcherConstructor]: https://icanboogie.org/api/bind-http/3.0/class-ICanBoogie.Binding.HTTP.AbstractDispatcherConstructor.html
[ApplicationBindings]:           https://icanboogie.org/api/bind-http/3.0/class-ICanBoogie.Binding.HTTP.ApplicationBindings.html
[ProvideDispatcher]:             https://icanboogie.org/api/bind-http/3.0/class-ICanBoogie.Binding.HTTP.ProvideDispatcher.html
[ICanBoogie]:                    https://icanboogie.org/
[icanboogie/http]:               https://github.com/ICanBoogie/HTTP
