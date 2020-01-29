<?php

namespace Rpn\Data;

class Stack
{
    private $stack = [];

    /**
     * Adds value to stack if numeric
     * @param numeric $value
     * @return bool
     */
    public function push($value) : bool
    {
        if (is_numeric($value)) {
            array_push($this->stack, $value);
            return true;
        }
        return false;
    }

    /**
     * Pops value from stack
     * @return numeric
     */
    public function pop()
    {
        return array_pop($this->stack);
    }

    /**
     * Clears stack
     * @return void
     */
    public function clear() : void
    {
        $this->stack = [];
    }
}