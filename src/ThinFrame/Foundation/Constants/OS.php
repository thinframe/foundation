<?php

/**
 * /src/ThinFrame/Foundation/Constants/OS.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Constants;

use ThinFrame\Foundation\DataTypes\AbstractEnum;

/**
 * Class OS
 *
 * @package ThinFrame\Foundation\Constants
 * @since   0.2
 */
class OS extends AbstractEnum
{
    const WINDOWS = 'windows';
    const LINUX   = 'linux';
    const DARWIN  = 'darwin';
    const UNKNOWN = 'unknown';
}