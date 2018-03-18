<?php

namespace ICanBoogie\Binding\HTTP\ProvideDispatcherTest;

use ICanBoogie\Binding\HTTP\AbstractDispatcherConstructor;
use ICanBoogie\HTTP\Dispatcher;

class DummyDispatcherConstructor extends AbstractDispatcherConstructor
{
	public function __invoke(array $config): Dispatcher
	{
		return new DummyDispatcher;
	}
}
