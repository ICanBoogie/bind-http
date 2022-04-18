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

use ICanBoogie\HTTP\Request;
use PHPUnit\Framework\TestCase;

use function ICanBoogie\app;

final class HooksTest extends TestCase
{
	public function test_get_initial_request(): void
	{
		$initial_request = Hooks::app_get_initial_request();

		$this->assertInstanceOf(Request::class, $initial_request);
		$this->assertSame($initial_request, app()->initial_request);
	}

	public function test_get_request(): void
	{
		$request = Hooks::app_get_request(app());

		$this->assertInstanceOf(Request::class, $request);
		$this->assertSame($request, app()->request);
	}
}
