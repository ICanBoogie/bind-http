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

	ICanBoogie\Application::class . '::configure' => $hooks . 'on_app_configure'

];
