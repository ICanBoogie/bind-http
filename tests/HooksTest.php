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
use ICanBoogie\HTTP\Dispatcher;
use ICanBoogie\HTTP\DispatcherProvider;
use ICanBoogie\HTTP\Request;

class HooksTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Core|CoreBindings
	 */
	static private $app;

	static public function setUpBeforeClass()
	{
		self::$app = \ICanBoogie\app();
	}

	public function test_get_initial_request()
	{
		$initial_request = Hooks::core_get_initial_request();

		$this->assertInstanceOf(Request::class, $initial_request);
		$this->assertSame($initial_request, self::$app->initial_request);
	}

	public function test_get_request()
	{
		$request = Hooks::core_get_request(self::$app);

		$this->assertInstanceOf(Request::class, $request);
		$this->assertSame($request, self::$app->request);
	}

	public function test_get_dispatcher()
	{
		$dispatcher = Hooks::core_get_dispatcher();

		$this->assertInstanceOf(Dispatcher::class, $dispatcher);
		$this->assertSame($dispatcher, self::$app->dispatcher);
	}

	public function test_dispatcher_provider()
	{
		$provider = DispatcherProvider::defined();

		$this->assertInstanceOf(ProvideDispatcher::class, $provider);

		/**
		 * @var $event Core\ConfigureEvent
		 */
		$event = $this->getMockBuilder(Core\ConfigureEvent::class)
			->disableOriginalConstructor()
			->getMock();

		Hooks::on_core_configure($event, self::$app);

		$this->assertSame($provider, DispatcherProvider::defined());

		#

		DispatcherProvider::undefine();
		Hooks::on_core_configure($event, self::$app);
		$this->assertInstanceOf(ProvideDispatcher::class, DispatcherProvider::defined());
	}

	public function test_synthesize_dispatchers_config()
	{
		$config = Hooks::synthesize_dispatchers_config([

			[ 'dispatchers' => [

				'pages' => [

					DispatcherConfig::CONSTRUCTOR => 'Icybee\Modules\Pages\PageDispatcher',
					DispatcherConfig::WEIGHT => 'bottom'

				]

			] ],

			[ 'dispatchers' => [

				'routing' => 'ICanBoogie\Routing\RouteDispatcher'

			] ],

			[ 'dispatchers' => [

				'operation' => [

					DispatcherConfig::CONSTRUCTOR => 'ICanBoogie\Operation\OperationDispatcher',
					DispatcherConfig::WEIGHT => 'before:routing'

				]

			] ],

			[ ]

		]);

		$expected = [

			'operation' => [

				DispatcherConfig::CONSTRUCTOR => 'ICanBoogie\Operation\OperationDispatcher',
				DispatcherConfig::WEIGHT => 'before:routing'

			],

			'routing' => [

				DispatcherConfig::CONSTRUCTOR => 'ICanBoogie\Routing\RouteDispatcher',
				DispatcherConfig::WEIGHT => 0

			],

			'pages' => [

				DispatcherConfig::CONSTRUCTOR => 'Icybee\Modules\Pages\PageDispatcher',
				DispatcherConfig::WEIGHT => 'bottom'

			]

		];

		$this->assertEquals($expected, $config);
	}
}
