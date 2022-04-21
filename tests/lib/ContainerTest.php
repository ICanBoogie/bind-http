<?php

/*
 * This file is part of the ICanBoogie package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Test\ICanBoogie\Binding\HTTP;

use ICanBoogie\HTTP\Responder;
use PHPUnit\Framework\TestCase;

use function ICanBoogie\app;

final class ContainerTest extends TestCase
{
	public function test_responder(): void
	{
		$responder = app()->container->get(Responder::class);

		$this->assertInstanceOf(Responder::class, $responder);
		$this->assertInstanceOf(Responder\WithRecovery::class, $responder);
	}
}
