<?php

namespace Rpn\Exceptions\Validator;

use Rpn\Exceptions\BaseException;

class OperatorNotSupportedException extends BaseException
{
    protected $default_message = 'Operation is not supported';
}