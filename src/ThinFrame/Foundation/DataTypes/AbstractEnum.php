<?php

/**
 * /src/ThinFrame/Foundation/DataTypes/AbstractEnum.php
 *
 * @copyright 2013 Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\DataTypes;

use PhpCollection\Map;
use ThinFrame\Foundation\Exceptions\InvalidArgumentException;

/**
 * Class AbstractEnum
 *
 * @package ThinFrame\Foundation\DataTypes
 * @since   0.2
 */
abstract class AbstractEnum
{
    /**
     * @var string instance value
     */
    private $value;

    /**
     * AbstractEnum()
     *
     * @param $value
     *
     * @throws InvalidArgumentException
     */
    final public function __construct($value)
    {
        if (self::isValid($value)) {
            $this->value = $value;
        } else {
            throw new InvalidArgumentException("Invalid enum value supplied");
        }
    }

    /**
     * Check if provided value is a valid constant value
     *
     * @param $value
     *
     * @return bool
     */
    final public static function isValid($value)
    {
        return self::getMap()->contains($value);
    }

    /**
     * Get a Map with constant name/value pairs
     *
     * @return Map
     */
    final public static function getMap()
    {
        $reflector = new \ReflectionClass(get_called_class());
        return new Map($reflector->getConstants());
    }

    /**
     * TypeHint support
     *
     * @return callable
     */
    final public static function type()
    {
        $class = get_called_class();
        return function ($value) use ($class) {
            return $class::isValid($value);
        };
    }

    /**
     * @param mixed $value
     *
     * @return bool
     */
    final public function equals($value)
    {
        return ($this->__toString() == $value);
    }

    /**
     * toString magic method
     *
     * @return string
     */
    final public function __toString()
    {
        return $this->value;
    }
}
