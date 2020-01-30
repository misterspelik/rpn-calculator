<?php

namespace Rpn\Exceptions\Validator;

use Rpn\Exceptions\BaseException;

class DivizionByZeroException extends BaseException
{
    protected $default_message = 'RPN Calculator can`t divide by zero';
}