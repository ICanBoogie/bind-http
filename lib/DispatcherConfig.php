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
	public const CONSTRUCTOR = 'constructor';
	public const WEIGHT = 'weight';
	public const WEIGHT_TOP = 'top';
	public const WEIGHT_BOTTOM = 'bottom';
	public const WEIGHT_BEFORE_PREFIX = 'before:';
	public const WEIGHT_AFTER_PREFIX = 'after:';
	public const WEIGHT_DEFAULT = 0;
}
