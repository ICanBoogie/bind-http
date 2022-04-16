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

use ICanBoogie\HTTP\Responder;
use PHPUnit\Framework\TestCase;

use function ICanBoogie\app;

final class ServicesTest extends TestCase
{
	public function test_responder(): void
	{
		$responder = app()->container->get(Responder::class);

		$this->assertInstanceOf(Responder::class, $responder);
	}
}
