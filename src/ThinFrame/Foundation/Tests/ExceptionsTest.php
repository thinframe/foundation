<?php

/**
 * /src/ThinFrame/Foundation/Tests/ExceptionsTest.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Tests;

use PHPUnit_Framework_TestCase as TestCase;
use ThinFrame\Foundation\Exceptions\Exception;
use ThinFrame\Foundation\Exceptions\InvalidArgumentException;
use ThinFrame\Foundation\Exceptions\LogicException;
use ThinFrame\Foundation\Exceptions\RuntimeException;

/**
 * Class ExceptionsTest
 *
 * @package ThinFrame\Foundation\Tests
 * @since   0.2
 */
class ExceptionsTest extends TestCase
{
    /**
     * Test if exceptions implements the common exception interface
     */
    public function testInterfaceImplementation()
    {
        $this->assertInstanceOf('ThinFrame\Foundation\Exceptions\ExceptionInterface', new Exception());
        $this->assertInstanceOf('ThinFrame\Foundation\Exceptions\ExceptionInterface', new InvalidArgumentException());
        $this->assertInstanceOf('ThinFrame\Foundation\Exceptions\ExceptionInterface', new LogicException());
        $this->assertInstanceOf('ThinFrame\Foundation\Exceptions\ExceptionInterface', new RuntimeException());
    }
}