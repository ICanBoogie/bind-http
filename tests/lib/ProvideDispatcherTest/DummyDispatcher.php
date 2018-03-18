<?php

namespace ICanBoogie\Binding\HTTP\ProvideDispatcherTest;

use ICanBoogie\HTTP\Dispatcher;
use ICanBoogie\HTTP\Request;
use ICanBoogie\HTTP\Response;

class DummyDispatcher implements Dispatcher
{
	/**
	 * @inheritdoc
	 */
	public function __invoke(Request $request): ?Response
	{
		// TODO: Implement __invoke() method.
	}

	/**
	 * @inheritdoc
	 */
	public function rescue(\Throwable $exception, Request $request): Response
	{
		// TODO: Implement rescue() method.
	}
}
