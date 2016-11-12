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
use ICanBoogie\HTTP\Dispatcher;

/**
 * Abstract dispatcher constructor.
 */
abstract class AbstractDispatcherConstructor
{
	/**
	 * @var Application
	 */
	protected $app;

	/**
	 * @param Application $app
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	/**
	 * @param array $config
	 *
	 * @return Dispatcher
	 */
	abstract public function __invoke(array $config);
}
