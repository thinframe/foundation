<?php

/**
 * src/Constants/DataType.php
 *
 * @author    Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Constants;

use ThinFrame\Foundation\DataTypes\AbstractEnum;

/**
 * Class DataType
 *
 * @package ThinFrame\Foundation\Constants
 * @since   0.2
 */
final class DataType extends AbstractEnum
{
    const SKIP     = 'skip';
    const INT      = 'int';
    const STRING   = 'string';
    const BOOLEAN  = 'boolean';
    const CALLBACK = 'callback';
    const FLOAT    = 'float';
    const RESOURCE = 'resource';
    const DOUBLE   = 'double';
}
