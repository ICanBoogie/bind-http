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
use ICanBoogie\HTTP;
use ICanBoogie\HTTP\Dispatcher;
use ICanBoogie\HTTP\DispatcherProvider;
use ICanBoogie\HTTP\Request;

use function array_merge;
use function array_walk;
use function ICanBoogie\sort_by_weight;
use function is_string;
use function trigger_error;

final class Hooks
{
	/*
	 * Autoconfig
	 */

	static public function synthesize_dispatchers_config(array $fragments): array
	{
		trigger_error("OBSOLETE: Use the responder instead.");

		$config_array = [];

		foreach ($fragments as $fragment)
		{
			$config_array[] = $fragment['dispatchers'] ?? [];
		}

		$config = array_merge(...$config_array);

		#
		# Normalizing
		#

		array_walk($config, function(&$config): void {

			if (is_string($config))
			{
				$config = [ DispatcherConfig::CONSTRUCTOR => $config, ];
			}

			$config += [ DispatcherConfig::WEIGHT => 0 ];

		});

		#
		# Ordering
		#

		return sort_by_weight($config, function($config) {

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
	static public function app_get_initial_request(): Request
	{
		return HTTP\get_initial_request();
	}

	/**
	 * Returns the current request.
	 */
	static public function app_get_request(Application $app): Request
	{
		return Request::get_current_request() ?: $app->initial_request;
	}

	/**
	 * Returns the request dispatcher.
	 */
	static public function app_get_dispatcher(): Dispatcher
	{
		trigger_error("OBSOLETE: Use the responder instead.");

		return HTTP\get_dispatcher();
	}

	/*
	 * Event
	 */

	/**
	 * Defines the request dispatcher provider.
	 */
	static public function on_app_configure(Application\ConfigureEvent $event, Application $app): void
	{
		trigger_error("OBSOLETE: Use the responder instead.");

		if (DispatcherProvider::defined())
		{
			return;
		}

		DispatcherProvider::define(new ProvideDispatcher($app));
	}
}
