<?php

namespace Rpn\Exceptions\Validator;

use Rpn\Exceptions\BaseException;

class InvalidLastSignException extends BaseException
{
    protected $default_message = 'RPN Calculator requires the last character to be an operator';
}