<?php

/**
 * /src/ThinFrame/Foundation/Tests/Samples/TestEnum.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Tests\Samples;

use ThinFrame\Foundation\DataTypes\AbstractEnum;

/**
 * Class TestEnum
 *
 * @package ThinFrame\Foundation\Tests\Samples
 * @since   0.2
 */
class TestEnum extends AbstractEnum
{
    const FIRST_TEST_VALUE  = 'first_test_value';
    const SECOND_TEST_VALUE = 'second_test_value';
    const THIRD_TEST_VALUE  = 'third_test_value';
}
