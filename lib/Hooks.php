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

use ICanBoogie\Core;
use ICanBoogie\HTTP;
use ICanBoogie\HTTP\Dispatcher;
use ICanBoogie\HTTP\DispatcherProvider;
use ICanBoogie\HTTP\Request;

class Hooks
{
	/*
	 * Autoconfig
	 */

	static public function synthesize_dispatchers_config(array $fragments)
	{
		$config_array = [];

		foreach ($fragments as $fragment)
		{
			if (empty($fragment['dispatchers']))
			{
				continue;
			}

			$config_array[] = $fragment['dispatchers'];
		}

		$config = call_user_func_array('array_merge', $config_array);

		#
		# Normalizing
		#

		array_walk($config, function(&$config) {

			if (is_string($config))
			{
				$config = [ DispatcherConfig::CONSTRUCTOR => $config, ];
			}

			$config += [ DispatcherConfig::WEIGHT => 0 ];

		});

		#
		# Ordering
		#

		return \ICanBoogie\sort_by_weight($config, function($config) {

			return $config[DispatcherConfig::WEIGHT];

		});
	}

	/*
	 * Prototype
	 */

	/**
	 * Returns the initial request object.
	 *
	 * @return Request
	 */
	static public function core_get_initial_request()
	{
		return HTTP\get_initial_request();
	}

	/**
	 * Returns the current request.
	 *
	 * @param Core $app
	 *
	 * @return Request
	 */
	static public function core_get_request(Core $app)
	{
		return Request::get_current_request() ?: $app->initial_request;
	}

	/**
	 * Returns the request dispatcher.
	 *
	 * @return Dispatcher
	 */
	static public function core_get_dispatcher()
	{
		return HTTP\get_dispatcher();
	}

	/*
	 * Event
	 */

	/**
	 * Defines the request dispatcher provider.
	 *
	 * @param Core\ConfigureEvent $event
	 * @param Core $app
	 */
	static public function on_core_configure(Core\ConfigureEvent $event, Core $app)
	{
		if (DispatcherProvider::defined())
		{
			return;
		}

		DispatcherProvider::define(new ProvideDispatcher($app));
	}
}
