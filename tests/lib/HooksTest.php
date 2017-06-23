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
use ICanBoogie\HTTP\DispatcherProvider;
use ICanBoogie\HTTP\Request;

use function ICanBoogie\app;

class HooksTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Application
	 */
	static private $app;

	static public function setUpBeforeClass()
	{
		self::$app = app();
	}

	public function test_get_initial_request()
	{
		$initial_request = Hooks::app_get_initial_request();

		$this->assertInstanceOf(Request::class, $initial_request);
		$this->assertSame($initial_request, self::$app->initial_request);
	}

	public function test_get_request()
	{
		$request = Hooks::app_get_request(self::$app);

		$this->assertInstanceOf(Request::class, $request);
		$this->assertSame($request, self::$app->request);
	}

	public function test_get_dispatcher()
	{
		$dispatcher = Hooks::app_get_dispatcher();

		$this->assertInstanceOf(Dispatcher::class, $dispatcher);
		$this->assertSame($dispatcher, self::$app->dispatcher);
	}

	public function test_dispatcher_provider()
	{
		$provider = DispatcherProvider::defined();

		$this->assertInstanceOf(ProvideDispatcher::class, $provider);

		/**
		 * @var $event Application\ConfigureEvent
		 */
		$event = $this->getMockBuilder(Application\ConfigureEvent::class)
			->disableOriginalConstructor()
			->getMock();

		Hooks::on_app_configure($event, self::$app);

		$this->assertSame($provider, DispatcherProvider::defined());

		#

		DispatcherProvider::undefine();
		Hooks::on_app_configure($event, self::$app);
		$this->assertInstanceOf(ProvideDispatcher::class, DispatcherProvider::defined());
	}

	public function test_synthesize_dispatchers_config()
	{
		$config = Hooks::synthesize_dispatchers_config([

			[ 'dispatchers' => [

				'pages' => [

					DispatcherConfig::CONSTRUCTOR => 'Icybee\Modules\Pages\PageDispatcher',
					DispatcherConfig::WEIGHT => DispatcherConfig::WEIGHT_BOTTOM

				]

			] ],

			[ 'dispatchers' => [

				'routing' => 'ICanBoogie\Routing\RouteDispatcher'

			] ],

			[ 'dispatchers' => [

				'operation' => [

					DispatcherConfig::CONSTRUCTOR => 'ICanBoogie\Operation\OperationDispatcher',
					DispatcherConfig::WEIGHT => DispatcherConfig::WEIGHT_BEFORE_PREFIX . 'routing'

				]

			] ],

			[ ]

		]);

		$expected = [

			'operation' => [

				DispatcherConfig::CONSTRUCTOR => 'ICanBoogie\Operation\OperationDispatcher',
				DispatcherConfig::WEIGHT => DispatcherConfig::WEIGHT_BEFORE_PREFIX . 'routing'

			],

			'routing' => [

				DispatcherConfig::CONSTRUCTOR => 'ICanBoogie\Routing\RouteDispatcher',
				DispatcherConfig::WEIGHT => DispatcherConfig::WEIGHT_DEFAULT

			],

			'pages' => [

				DispatcherConfig::CONSTRUCTOR => 'Icybee\Modules\Pages\PageDispatcher',
				DispatcherConfig::WEIGHT => DispatcherConfig::WEIGHT_BOTTOM

			]

		];

		$this->assertEquals($expected, $config);
	}
}
