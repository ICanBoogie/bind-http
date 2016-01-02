<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ICanBoogie\Binding\HTTP;

use ICanBoogie\HTTP\Dispatcher;
use ICanBoogie\HTTP\Request;

/**
 * @property-read Request $initial_request The initial request.
 * @property-read Request $request The current request.
 * @property-read Dispatcher $dispatcher The request dispatcher.
 *
 * @see \ICanBoogie\Binding\HTTP\Hooks::core_get_initial_request()
 * @see \ICanBoogie\Binding\HTTP\Hooks::core_get_request()
 * @see \ICanBoogie\Binding\HTTP\Hooks::core_get_dispatcher()
 */
trait CoreBindings
{

}
