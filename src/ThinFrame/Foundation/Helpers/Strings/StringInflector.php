<?php

/**
 * /src/ThinFrame/Foundation/Helpers/Strings/StringInflector.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Helpers\Strings;

/**
 * StringInflector - helper for inflecting string
 *
 * @package ThinFrame\Foundation\Helpers\Strings
 * @since   0.2
 */
final class StringInflector
{
    /**
     * @param string $string
     *
     * @return mixed|string
     */
    public static function toSingular($string)
    {
        $result = strval($string);

        if (!self::isCountable($result)) {
            return $result;
        }

        $singular_rules = array(
            '/(matr)ices$/'                                                   => '\1ix',
            '/(vert|ind)ices$/'                                               => '\1ex',
            '/^(ox)en/'                                                       => '\1',
            '/(alias)es$/'                                                    => '\1',
            '/([octop|vir])i$/'                                               => '\1us',
            '/(cris|ax|test)es$/'                                             => '\1is',
            '/(shoe)s$/'                                                      => '\1',
            '/(o)es$/'                                                        => '\1',
            '/(bus|campus)es$/'                                               => '\1',
            '/([m|l])ice$/'                                                   => '\1ouse',
            '/(x|ch|ss|sh)es$/'                                               => '\1',
            '/(m)ovies$/'                                                     => '\1\2ovie',
            '/(s)eries$/'                                                     => '\1\2eries',
            '/([^aeiouy]|qu)ies$/'                                            => '\1y',
            '/([lr])ves$/'                                                    => '\1f',
            '/(tive)s$/'                                                      => '\1',
            '/(hive)s$/'                                                      => '\1',
            '/([^f])ves$/'                                                    => '\1fe',
            '/(^analy)ses$/'                                                  => '\1sis',
            '/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/' => '\1\2sis',
            '/([ti])a$/'                                                      => '\1um',
            '/(p)eople$/'                                                     => '\1\2erson',
            '/(m)en$/'                                                        => '\1an',
            '/(s)tatuses$/'                                                   => '\1\2tatus',
            '/(c)hildren$/'                                                   => '\1\2hild',
            '/(n)ews$/'                                                       => '\1\2ews',
            '/([^us])s$/'                                                     => '\1'
        );

        foreach ($singular_rules as $rule => $replacement) {
            if (preg_match($rule, $result)) {
                $result = preg_replace($rule, $replacement, $result);
                break;
            }
        }

        return $result;
    }

    /**
     * Checks if the given word has a plural version.
     *
     * @param string $word
     *
     * @return bool
     */
    public static function isCountable($word)
    {
        return !in_array(
            strtolower($word),
            array(
                'equipment',
                'information',
                'rice',
                'money',
                'species',
                'series',
                'fish',
                'meta'
            )
        );
    }

    /**
     * Inflect string to plural
     *
     * @param string $string
     *
     * @return mixed|string
     */
    public static function toPlural($string)
    {
        $result = strval($string);

        if (!self::isCountable($result)) {
            return $result;
        }

        $plural_rules = array(
            '/^(ox)$/'                => '\1\2en', // ox
            '/([m|l])ouse$/'          => '\1ice', // mouse, louse
            '/(matr|vert|ind)ix|ex$/' => '\1ices', // matrix, vertex, index
            '/(x|ch|ss|sh)$/'         => '\1es', // search, switch, fix, box, process, address
            '/([^aeiouy]|qu)y$/'      => '\1ies', // query, ability, agency
            '/(hive)$/'               => '\1s', // archive, hive
            '/(?:([^f])fe|([lr])f)$/' => '\1\2ves', // half, safe, wife
            '/sis$/'                  => 'ses', // basis, diagnosis
            '/([ti])um$/'             => '\1a', // datum, medium
            '/(p)erson$/'             => '\1eople', // person, salesperson
            '/(m)an$/'                => '\1en', // man, woman, spokesman
            '/(c)hild$/'              => '\1hildren', // child
            '/(buffal|tomat)o$/'      => '\1\2oes', // buffalo, tomato
            '/(bu|campu)s$/'          => '\1\2ses', // bus, campus
            '/(alias|status|virus)$/' => '\1es', // alias
            '/(octop)us$/'            => '\1i', // octopus
            '/(ax|cris|test)is$/'     => '\1es', // axis, crisis
            '/s$/'                    => 's', // no change (compatibility)
            '/$/'                     => 's',
        );

        foreach ($plural_rules as $rule => $replacement) {
            if (preg_match($rule, $result)) {
                $result = preg_replace($rule, $replacement, $result);
                break;
            }
        }

        return $result;
    }

    /**
     * Inflect string to camel case
     *
     * @param string $string
     *
     * @return string
     */
    public static function toCamelCase($string)
    {
        return strtolower($string[0]) . substr(
            str_replace(' ', '', ucwords(preg_replace('/[\s_]+/', ' ', $string))),
            1
        );
    }

    /**
     * Inflect string to use underscores
     *
     * @param string $string
     *
     * @return mixed
     */
    public static function toUnderscore($string)
    {
        return preg_replace('/[\s]+/', '_', strtolower(trim($string)));
    }

    /**
     * Makes a string human readable
     *
     * @param string $string
     * @param string $inputSeparator
     *
     * @return string
     */
    public static function humanize($string, $inputSeparator = '_')
    {
        return ucwords(preg_replace('/[' . $inputSeparator . ']+/', ' ', strtolower(trim($string))));
    }

    /**
     * Creates a ranked number
     *
     * @param int $number
     *
     * @return string
     */
    public static function makeRanked($number)
    {
        $last    = substr($number, -1);
        $seclast = substr($number, -2, -1);
        if ($last > 3 || $last == 0) {
            $extension = 'th';
        } else {
            if ($last == 3) {
                $extension = 'rd';
            } else {
                if ($last == 2) {
                    $extension = 'nd';
                } else {
                    $extension = 'st';
                }
            }
        }

        if ($last == 1 && $seclast == 1) {
            $extension = 'th';
        }
        if ($last == 2 && $seclast == 1) {
            $extension = 'th';
        }
        if ($last == 3 && $seclast == 1) {
            $extension = 'th';
        }

        return $number . $extension;
    }
}
