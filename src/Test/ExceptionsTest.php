<?php

/**
 * @author    Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Test;

use ThinFrame\Foundation\Exception\Exception;
use ThinFrame\Foundation\Exception\ExceptionInterface;
use ThinFrame\Foundation\Exception\InvalidArgumentException;
use ThinFrame\Foundation\Exception\LogicException;
use ThinFrame\Foundation\Exception\RuntimeException;

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
