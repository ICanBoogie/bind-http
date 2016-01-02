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

use ICanBoogie;

$hooks = Hooks::class . '::';

return [

	ICanBoogie\Core::class . '::get_initial_request' => $hooks . 'core_get_initial_request',
	ICanBoogie\Core::class . '::get_request' => $hooks . 'core_get_request',
	ICanBoogie\Core::class . '::get_dispatcher' => $hooks . 'core_get_dispatcher'

];
