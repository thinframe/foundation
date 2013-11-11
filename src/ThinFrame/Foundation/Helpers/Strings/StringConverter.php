<?php

/**
 * /src/ThinFrame/Foundation/Helpers/Strings/StringConverter.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Helpers\Strings;

/**
 * StringConverter - helper for converting string
 *
 * @package ThinFrame\Foundation\Helpers\Strings
 * @since   0.2
 */
final class StringConverter
{
    /**
     * Convert all <br> into newlines
     *
     * @param string $string
     *
     * @return string with <br>'s converted to newlines
     */
    public static function breakToNewLine($string)
    {
        return preg_replace("=<br */?>=i", "\n", preg_replace("/(\r\n|\n|\r)/", "", $string));
    }

    /**
     * Reduce double slashes from a string
     *
     * @param string $string string to be reduced
     *
     * @return mixed
     */
    public static function reduceDoubleSlashes($string)
    {
        return preg_replace("|([^:])//+|", "$1/", $string);
    }
}