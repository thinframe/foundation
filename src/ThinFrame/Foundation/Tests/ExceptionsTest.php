<?php

/**
 * /src/ThinFrame/Foundation/Tests/ExceptionsTest.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Tests;

use ThinFrame\Foundation\Exceptions\Exception;
use ThinFrame\Foundation\Exceptions\ExceptionInterface;
use ThinFrame\Foundation\Exceptions\InvalidArgumentException;
use ThinFrame\Foundation\Exceptions\LogicException;
use ThinFrame\Foundation\Exceptions\RuntimeException;

/**
 * Class ExceptionsTest
 *
 * @package ThinFrame\Foundation\Tests
 * @since   0.2
 */
class ExceptionsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Check if foundation interfaces implement the right interface
     */
    public function testInterfaceImplementation()
    {
        $this->assertTrue((new Exception()) instanceof ExceptionInterface);
        $this->assertTrue((new InvalidArgumentException()) instanceof ExceptionInterface);
        $this->assertTrue((new LogicException()) instanceof ExceptionInterface);
        $this->assertTrue((new RuntimeException()) instanceof ExceptionInterface);
    }
}
