<?php

/**
 * /src/ThinFrame/Foundation/Helpers/System.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Helpers;

use ThinFrame\Foundation\Constants\OS;

/**
 * Class System
 *
 * @package ThinFrame\Foundation\Helpers
 * @since   0.2
 */
class System
{
    /**
     * @var null|OS
     */
    private static $os = null;

    /**
     * Get terminal width and height
     *
     * @return array
     */
    public static function getTerminalSizes()
    {
        if (self::getOS()->equals(OS::WINDOWS) || self::getOS()->equals(OS::UNKNOWN)) {
            return ['width' => 100, 'height' => 100];
        }
        preg_match_all("/rows.([0-9]+);.columns.([0-9]+);/", strtolower(exec('stty -a |grep columns')), $output);
        if (sizeof($output) == 3) {
            return [
                "height" => @$output[1][0],
                "width"  => @$output[2][0]
            ];
        } else {
            return [
                "width"  => 100,
                "height" => 100
            ];
        }
    }

    /**
     * Get the current operating system
     *
     * @return OS
     */
    public static function getOS()
    {
        if (is_null(self::$os)) {
            $name = strtolower(php_uname());
            $os   = OS::UNKNOWN;
            if (strpos($name, 'darwin') !== false) {
                $os = OS::DARWIN;
            } elseif (strpos($name, 'win') !== false) {
                $os = OS::WINDOWS;
            } elseif (strpos($name, 'linux') !== false) {
                $os = OS::LINUX;
            }
            self::$os = new OS($os);
        }


        return self::$os;
    }
}
