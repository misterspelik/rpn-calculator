<?php

namespace RpnTest;

use Rpn\Validator;
use Rpn\Exceptions\Validator\{InvalidLastSignException, DivizionByZeroException, InvalidArrayException, InvalidOperatorsNumberException, OperatorNotSupportedException};

use RpnTest\Cases\RpnTestCase;

class ValidatorTest extends RpnTestCase
{
    private $validator;

    public function __construct()
    {
        parent::__construct();
        $this->validator = new Validator();
    }

    public function testLastSignException()
    {
        $this->expectException(InvalidLastSignException::class);

        $result = $this->calculator->runExpression("2 3 3");
    }

    public function testInvalidArrayException()
    {
        $this->expectException(InvalidArrayException::class);

        $expression = "2 +";
        $result = $this->validator->validateArray( explode(" ", $expression) );
    }

    public function testInvalidOperatorsNumberException()
    {
        $this->expectException(InvalidOperatorsNumberException::class);

        $result = $this->validator->isValidExpression("2 2 - +");
    }

    public function testDivizionByZeroException()
    {
        $this->expectException(DivizionByZeroException::class);

        $result = $this->calculator->runExpression("2 0 /");
    }

    public function testOperatorNotSupportedException()
    {
        $this->expectException(OperatorNotSupportedException::class);

        $result = $this->calculator->runExpression("2 0 3 ^ +");
    }

}