<?php

namespace ICanBoogie\Binding\HTTP\ProvideDispatcherTest;

use ICanBoogie\HTTP\Dispatcher;
use ICanBoogie\HTTP\Request;

class DummyDispatcher implements Dispatcher
{
	/**
	 * @inheritdoc
	 */
	public function __invoke(Request $request)
	{
		// TODO: Implement __invoke() method.
	}

	/**
	 * @inheritdoc
	 */
	public function rescue(\Exception $exception, Request $request)
	{
		// TODO: Implement rescue() method.
	}
}
