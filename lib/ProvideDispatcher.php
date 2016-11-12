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
use ICanBoogie\HTTP\RequestDispatcher;

/**
 * @inheritdoc
 */
class ProvideDispatcher extends \ICanBoogie\HTTP\ProvideDispatcher
{
	/**
	 * @var Application
	 */
	private $app;

	/**
	 * @param Application $app
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	/**
	 * @inheritdoc
	 */
	protected function create()
	{
		$config = $this->app->configs['http_dispatchers'];
		$dispatcher = $config ? $this->resolve_dispatchers($config) : [];

		return new RequestDispatcher($dispatcher);
	}

	/**
	 * @param array $config
	 *
	 * @return Dispatcher[]
	 */
	protected function resolve_dispatchers(array $config)
	{
		$dispatchers = [];

		foreach ($config as $dispatcher_id => $dispatcher_config)
		{
			$constructor = $this->resolve_constructor($dispatcher_config[DispatcherConfig::CONSTRUCTOR]);
			$dispatchers[$dispatcher_id] = $constructor($dispatcher_config);
		}

		return $dispatchers;
	}

	/**
	 * @param string $constructor
	 *
	 * @return AbstractDispatcherConstructor|callable
	 */
	protected function resolve_constructor($constructor)
	{
		if (class_exists($constructor))
		{
			return new $constructor($this->app);
		}

		return function($dispatcher_config) use ($constructor) {

			return call_user_func($constructor, $dispatcher_config);

		};
	}
}
