<?php

/**
 * /src/ThinFrame/Foundation/Helpers/Strings/StringGenerator.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Helpers\Strings;

/**
 * StringGenerator - helper for generating string
 *
 * @package ThinFrame\Foundation\Helpers\Strings
 * @since   0.2
 */
final class StringGenerator
{
    /**
     * Generates a random alpha string
     *
     * @param int $length length of generated string
     *
     * @return string
     */
    public static function randomAlpha($length)
    {
        return self::random('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', $length);
    }

    /**
     * Generates a random string based on a pool of characters
     *
     * @param string $pool   chars to use
     * @param int    $length length of generated string
     *
     * @return string
     */
    public static function random($pool, $length)
    {
        $generated = '';
        for ($i = 0; $i < $length; ++$i) {
            $generated .= substr($pool, mt_rand(0, strlen($pool) - 1), 1);
        }

        return $generated;
    }

    /**
     * Generates a random alpha numeric string
     *
     * @param int $length length of the generated string
     *
     * @return string
     */
    public static function randomAlphaNum($length)
    {
        return self::random('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', $length);
    }

    /**
     * Interpolates variables into the content placeholders.
     *
     * @param       $content
     * @param array $variables
     *
     * @return string
     */
    public static function interpolate($content, array $variables = [])
    {
        $replace = [];
        foreach ($variables as $key => $value) {
            $replace['{' . $key . '}'] = $value;
        }

        return strtr($content, $replace);
    }
}
