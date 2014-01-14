<?php

/**
 * /src/ThinFrame/Foundation/Constants/VersionType.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Constants;

use ThinFrame\Foundation\DataTypes\AbstractEnum;

/**
 * Class VersionType
 *
 * @package ThinFrame\Foundation\Constants
 * @since   0.2
 */
final class VersionType extends AbstractEnum
{
    const MAJOR   = 'major';
    const MINOR   = 'minor';
    const RELEASE = 'release';
}
