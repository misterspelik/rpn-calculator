<?php

namespace Rpn\Exceptions\Validator;

use Rpn\Exceptions\BaseException;

class InvalidOperatorsNumberException extends BaseException
{
    protected $default_message = 'Number of operators does not match number operands';
}
