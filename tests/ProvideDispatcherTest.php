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

use ICanBoogie\Binding\HTTP\ProvideDispatcherTest\DummyDispatcher;
use ICanBoogie\Binding\HTTP\ProvideDispatcherTest\DummyDispatcherConstructor;
use ICanBoogie\Config;
use ICanBoogie\Core;
use ICanBoogie\HTTP\Dispatcher;

class ProvideDispatcherTest extends \PHPUnit_Framework_TestCase
{
	static public function create_dummy_dispatcher()
	{
		return new DummyDispatcher;
	}

	public function test_provider()
	{
		$config = [

			'operation' => [

				DispatcherConfig::CONSTRUCTOR => DummyDispatcherConstructor::class,
				DispatcherConfig::WEIGHT => 0

			],

			'routing' => [

				DispatcherConfig::CONSTRUCTOR => DummyDispatcherConstructor::class,
				DispatcherConfig::WEIGHT => 0

			],

			'pages' => [

				DispatcherConfig::CONSTRUCTOR => __CLASS__ . '::create_dummy_dispatcher',
				DispatcherConfig::WEIGHT => 0

			]

		];

		$app = $this->mockApp($this->mockConfigCollection($config));

		$provider = new ProvideDispatcher($app);
		$dispatcher = $provider();
		$ids = [];

		foreach ($dispatcher as $domain_dispatcher_id => $domain_dispatcher)
		{
			$ids[] = $domain_dispatcher_id;
			$this->assertInstanceOf(Dispatcher::class, $domain_dispatcher);
		}

		$this->assertEquals(array_keys($config), $ids);
	}

	/**
	 * @param Config $configs
	 *
	 * @return Core
	 */
	private function mockApp(Config $configs)
	{
		$app = $this->getMockBuilder(Core::class)
			->disableOriginalConstructor()
			->setMethods([ 'get_configs' ])
			->getMock();
		$app
			->expects($this->once())
			->method('get_configs')
			->willReturn($configs);

		return $app;
	}

	/**
	 * @param array $config
	 *
	 * @return Config
	 */
	private function mockConfigCollection(array $config)
	{
		$configs = $this->getMockBuilder(Config::class)
			->disableOriginalConstructor()
			->setMethods([ 'offsetGet' ])
			->getMock();

		$configs
			->expects($this->once())
			->method('offsetGet')
			->with('http_dispatchers')
			->willReturn($config);

		return $configs;
	}
}
