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

use ICanBoogie\Application;
use ICanBoogie\Binding\Prototype\ConfigBuilder;

return fn(ConfigBuilder $config) => $config
	->bind(Application::class, 'get_initial_request', [ Hooks::class, 'app_get_initial_request' ])
	->bind(Application::class, 'get_request', [ Hooks::class, 'app_get_request' ]);
