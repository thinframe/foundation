<?php

/**
 * /src/ThinFrame/Foundation/Tests/EnumTest.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Tests;

use PHPUnit_Framework_TestCase as TestCase;
use ThinFrame\Foundation\Exceptions\InvalidArgumentException;
use ThinFrame\Foundation\Tests\Samples\TestEnum;

/**
 * Class EnumTest
 *
 * @package ThinFrame\Foundation\Tests
 * @since   0.2
 */
class EnumTest extends TestCase
{
    /**
     * Test enum instance
     */
    public function testInstance()
    {
        $testEnum = new TestEnum(TestEnum::FIRST_TEST_VALUE);

        $this->assertEquals(
            TestEnum::FIRST_TEST_VALUE,
            $testEnum->__toString(),
            'Enum instance should have the correct value'
        );

        $this->assertTrue(
            $testEnum->equals(TestEnum::FIRST_TEST_VALUE),
            "The equals method should match the correct value"
        );

        try {
            $testEnum = new TestEnum('invalid_enum_value');
            $this->assertFalse(true, "Enum constructor should throw an invalid argument exception");
        } catch (InvalidArgumentException $e) {

        }
    }

    /**
     * Test enum validator
     */
    public function testType()
    {
        $type = TestEnum::type();
        $this->assertTrue($type(TestEnum::THIRD_TEST_VALUE), 'Enum type should work correctly');
    }
}
 