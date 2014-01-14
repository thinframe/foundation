<?php

/**
 * /src/ThinFrame/Foundation/Helpers/System.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Helpers;

use ThinFrame\Foundation\Constants\OS;
use ThinFrame\Foundation\Constants\VersionType;

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
     * @var null|int
     */
    private static $phpMajorVersion = null;
    /**
     * @var null|int
     */
    private static $phpMinorVersion = null;
    /**
     * @var null|int
     */
    private static $phpReleaseVersion = null;

    /**
     * Get PHP version
     *
     * @param null|string $which - to select a specific part from the version (see VersionType constants)
     *
     * @return string
     *
     */
    public static function getPHPVersion($which = null)
    {
        TypeCheck::doCheck(OS::type());

        if (is_null(self::$phpMajorVersion)) {
            $parts                   = explode(".", PHP_VERSION);
            self::$phpMajorVersion   = $parts[0];
            self::$phpMinorVersion   = $parts[1];
            self::$phpReleaseVersion = $parts[2];
        }

        switch ($which) {
            case VersionType::MAJOR:
                return self::$phpMajorVersion;
            case VersionType::MINOR:
                return self::$phpMinorVersion;
            case VersionType::RELEASE:
                return self::$phpReleaseVersion;
            default:
                return PHP_VERSION;

        }
    }

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
