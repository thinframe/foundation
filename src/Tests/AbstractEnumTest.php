<?php

/**
 * src/Tests/AbstractEnumTest.php
 *
 * @author    Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Tests;

use ThinFrame\Foundation\Exceptions\InvalidArgumentException;
use ThinFrame\Foundation\Tests\Samples\DummyEnum;

/**
 * Class AbstractEnumTest
 *
 * @package ThinFrame\Foundation\Tests
 * @since   0.2
 */
class AbstractEnumTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test enum validation
     */
    public function testValidation()
    {
        $this->assertTrue(
            DummyEnum::isValid(DummyEnum::CONSTANT_ONE),
            'Enum should validate it\'s one possible values'
        );

        $this->assertTrue(
            DummyEnum::isValid(DummyEnum::CONSTANT_ONE),
            'Enum should validate it\'s one possible values'
        );

        $this->assertFalse(
            DummyEnum::isValid('dummy_value', 'Enum should\'t validate foreign values')
        );
    }

    /**
     * Test enum instance
     */
    public function testInstance()
    {
        try {
            new DummyEnum('bla bla');
            $this->assertFalse(true, 'Constructor should throw InvalidArgumentException');
        } catch (\Exception $e) {
            $this->assertTrue(
                $e instanceof InvalidArgumentException,
                'Constructor should throw InvalidArgumentException'
            );
        }

        try {
            $variable = new DummyEnum(DummyEnum::CONSTANT_TWO);
            $this->assertTrue(
                $variable->equals(DummyEnum::CONSTANT_TWO),
                'Enum instance should validate the correct value'
            );

            $validationCallback = DummyEnum::type();

            $this->assertTrue($validationCallback(DummyEnum::CONSTANT_THREE), 'Validation callback should work');

        } catch (\Exception $e) {
            $this->assertFalse(true, 'Constructor should\'t throw an exception');
        }
    }
}