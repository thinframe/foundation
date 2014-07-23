<?php

/**
 * @author    Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Common\DataType;

use PhpCollection\Map;
use ThinFrame\Foundation\Common\Exception\DomainException;

/**
 * Class AbstractEnum
 *
 * @package ThinFrame\Foundation\Common
 */
abstract class AbstractEnum
{
    /**
     * @var Map
     */
    protected static $reflections = null;
    /**
     * @var Map
     */
    protected static $constantsMap = null;
    /**
     * @var mixed
     */
    protected $value = null;

    /**
     * Constructor
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->setValue($value);
    }

    /**
     * Check if enum value is valid
     *
     * @param mixed $value
     *
     * @return bool
     */
    public static function isValid($value)
    {
        return self::getMap()->contains($value);
    }

    /**
     * Get class constants map
     *
     * @return Map
     */
    public function getMap()
    {
        if (is_null(self::$constantsMap)) {
            self::$constantsMap = new Map();
        }
        if (!self::$constantsMap->containsKey(get_called_class())) {
            self::$constantsMap->set(get_called_class(), new Map(self::getCurrentReflection()->getConstants()));
        }

        return self::$constantsMap->get(get_called_class())->get();
    }

    /**
     * Get class reflection
     *
     * @return \ReflectionClass
     */
    protected function getCurrentReflection()
    {
        if (is_null(self::$reflections)) {
            self::$reflections = new Map();
        }
        if (!self::$reflections->containsKey(get_called_class())) {
            self::$reflections->set(get_called_class(), new \ReflectionClass(get_called_class()));
        }

        return self::$reflections->get(get_called_class())->get();
    }

    /**
     * Check if current value equals a provided one
     *
     * @param mixed $value
     *
     * @return bool
     */
    public function equals($value)
    {
        return $this->getValue() == $value;
    }

    /**
     * Get enum value
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set enum value
     *
     * @param mixed $value
     *
     * @return $this
     *
     * @throws DomainException
     */
    protected function setValue($value)
    {
        if (!self::isValid($value)) {
            throw new DomainException(
                sprintf(
                    'Invalid enum value \'%s\'. Expected: %s',
                    $value,
                    implode(', ', array_values(self::getMap()->values()))
                )
            );
        }
        $this->value = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getValue();
    }
}
