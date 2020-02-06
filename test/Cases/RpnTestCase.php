<?php

namespace RpnTest\Cases;

use Rpn\Calculator;
use PHPUnit\Framework\TestCase;

class RpnTestCase extends TestCase
{
    protected $calculator;

    public function __construct()
    {
        parent::__construct();

        $this->calculator = Calculator::getInstance();
    }
}