<?php

namespace ICanBoogie\Binding\HTTP\ProvideDispatcherTest;

use ICanBoogie\Binding\HTTP\AbstractDispatcherConstructor;

class DummyDispatcherConstructor extends AbstractDispatcherConstructor
{
	public function __invoke(array $config)
	{
		return new DummyDispatcher;
	}
}
