# bind-http

[![Release](https://img.shields.io/packagist/v/icanboogie/bind-http.svg)](https://packagist.org/packages/icanboogie/bind-http)
[![Build Status](https://img.shields.io/github/workflow/status/ICanBoogie/bind-http/test)](https://github.com/ICanBoogie/bind-http/actions?query=workflow%3Atest)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-http.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-http)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-http.svg)](https://coveralls.io/r/ICanBoogie/bind-http)
[![Packagist](https://img.shields.io/packagist/dt/icanboogie/bind-http.svg)](https://packagist.org/packages/icanboogie/bind-http)

The **icanboogie/bind-http** package binds [icanboogie/http][] to [ICanBoogie][].



## Prototype methods

The following prototype methods are defined, the [ApplicationBindings][] trait may be used for type
hinting:

- `ICanBoogie\Application::get_initial_request`: Returns the initial request.
- `ICanBoogie\Application::get_request`: Returns the current request.

The following example demonstrates how this getters may be used:

```php
<?php

namespace ICanBoogie;

require 'vendor/autoload.php';

$app = boot();

$initial_request = $app->initial_request;
$request = $app->request;
```




----------



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

**icanboogie/bind-http** is released under the [New BSD License](LICENSE).



[documentation]:                 https://icanboogie.org/api/bind-http/3.0/
[ApplicationBindings]:           https://icanboogie.org/api/bind-http/3.0/class-ICanBoogie.Binding.HTTP.ApplicationBindings.html
[ICanBoogie]:                    https://icanboogie.org/
[icanboogie/http]:               https://github.com/ICanBoogie/HTTP
