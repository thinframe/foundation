<?php

/**
 * @author    Sorin Badea <sorin.badea91@gmail.com>
 * @license   MIT license (see the license file in the root directory)
 */

namespace ThinFrame\Foundation\Common\Exception;

/**
 * LogicException
 *
 * Exception that represents error in the program logic.
 * This kind of exception should lead directly to a fix in your code.
 *
 * @package ThinFrame\Foundation\Common\Exception
 */
class LogicException extends \LogicException implements ExceptionInterface
{

}
