<?php

/**
 * @author    Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Common\Exception;

/**
 * DomainException
 *
 * Exception thrown if a value does not adhere to a defined valid data domain.
 *
 * @package ThinFrame\Foundation\Common\Exception
 */
class DomainException extends \DomainException implements ExceptionInterface
{

}