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

interface DispatcherConfig
{
	const CONSTRUCTOR = 'constructor';
	const WEIGHT = 'weight';
	const WEIGHT_TOP = 'top';
	const WEIGHT_BOTTOM = 'bottom';
	const WEIGHT_BEFORE_PREFIX = 'before:';
	const WEIGHT_AFTER_PREFIX = 'after:';
	const WEIGHT_DEFAULT = 0;
}
