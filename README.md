# bind-http

[![Release](https://img.shields.io/packagist/v/icanboogie/bind-http.svg)](https://packagist.org/packages/icanboogie/bind-http)
[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-http/master.svg)](http://travis-ci.org/ICanBoogie/bind-http)
[![HHVM](https://img.shields.io/hhvm/icanboogie/bind-http.svg)](http://hhvm.h4cc.de/package/icanboogie/bind-http)
[![Code Quality](https://img.shields.io/scrutinizer/g/ICanBoogie/bind-http/master.svg)](https://scrutinizer-ci.com/g/ICanBoogie/bind-http)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-http/master.svg)](https://coveralls.io/r/ICanBoogie/bind-http)
[![Packagist](https://img.shields.io/packagist/dt/icanboogie/bind-http.svg)](https://packagist.org/packages/icanboogie/bind-http)

The **icanboogie/bind-http** package binds [icanboogie/http][] to [ICanBoogie][].





----------





## Requirements

The package requires PHP 5.5 or later.





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

[![Build Status](https://img.shields.io/travis/ICanBoogie/bind-http/master.svg)](http://travis-ci.org/ICanBoogie/bind-http)
[![Code Coverage](https://img.shields.io/coveralls/ICanBoogie/bind-http/master.svg)](https://coveralls.io/r/ICanBoogie/bind-http)





## License

**icanboogie/bind-http** is licensed under the New BSD License - See the [LICENSE](LICENSE) file for details.





[ICanBoogie]:      https://github.com/ICanBoogie/ICanBoogie
[icanboogie/http]: https://github.com/ICanBoogie/HTTP
