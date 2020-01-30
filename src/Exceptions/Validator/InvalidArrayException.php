<?php

namespace Rpn\Exceptions\Validator;

use Rpn\Exceptions\BaseException;

class InvalidArrayException extends BaseException
{
    protected $default_message = 'RPN Calculator requires at least 2 numbers';
}