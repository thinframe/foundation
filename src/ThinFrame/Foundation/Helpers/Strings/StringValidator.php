<?php

/**
 * /src/ThinFrame/Foundation/Helpers/Strings/StringValidator.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Helpers\Strings;

/**
 * StringValidator - helper for validating string
 *
 * @package ThinFrame\Foundation\Helpers\Strings
 * @since   0.1
 */
final class StringValidator
{
    /**
     * Check if a string ends with a given needle
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool
     */
    public static function endsWith($haystack, $needle)
    {
        return (strpos($haystack, $needle) === (strlen($haystack) - strlen($needle)));
    }

    /**
     * Check if a string starts with a given needle
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool
     */
    public static function startsWith($haystack, $needle)
    {
        return (strpos($haystack, $needle) === 0);
    }

    /**
     * Check if a string contains
     *
     * @param string $haystack
     * @param string $needle
     *
     * @return bool
     */
    public static function contains($haystack, $needle)
    {
        return (bool)strpos($haystack, $needle);
    }
}
