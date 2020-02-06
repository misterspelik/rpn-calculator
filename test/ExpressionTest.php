<?php

namespace RpnTest;

use RpnTest\Cases\RpnTestCase;

class ExpressionTest extends RpnTestCase
{

    public function testThreePlusFive()
    {
        $result = $this->calculator->runExpression("2 3 +");

        $this->assertSame(5, $result);
    }
}