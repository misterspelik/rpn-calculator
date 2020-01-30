<?php

namespace Rpn;

use Rpn\Data\Stack;

/**
 * Calculator class acts as singleton
 */
class Calculator
{

    private $stack;
    private $input;
    private $validator;

    private static $instance = null;

    public static function getInstance(): self
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    /**
     * Constructing and injecting dependencies
     */
    private function __construct()
    {
        $this->stack = new Stack();
        $this->input = new Input();
        $this->validator = new Validator();
    }

    /**
     * Resets stack in order to run from scratch
     * @return void
     */
    public function reset()
    {
        $this->stack->clear();
    }

    /**
     * Run calculation from expression
     * @param string $line
     * @return numeric | null
     */
    public function runExpression($line)
    {
        $input = $this->input->explode($line);

        if ( !$this->validator->validateArray($input) ||
            !$this->validator->validateLastSign(end($input)) ){
                return null;
        }

        $result = '';
        foreach ($input as $value) {
            $result = $this->runOperation($value);

            if (is_null($result)) {
                return null;
            }
        }

        return $result;
    }

    /**
     * Run calculation operation (operates with stack)
     * @param string $operator
     * @return numeric
     */
    public function runOperation($operator)
    {
        if ($this->stack->push($operator)) {
            return $operator;
        }

        if (!$this->validator->isValidOperator($operator)) {
            return null;
        }

        $firstOperand = $this->stack->pop();
        $secondOperand = $this->stack->pop();

        switch ($operator) {
            case '+':
                $result = $secondOperand + $firstOperand;
            break;
            case '-':
                $result = $secondOperand - $firstOperand;
            break;
            case '/':
                if ($this->validator->operandCanDivide($firstOperand)){
                    $result = $secondOperand / $firstOperand;
                }
            break;
            case '*':
                $result = $secondOperand * $firstOperand;
            break;
            default:
                return null;
        }

        $this->stack->push($result);

        return $result;
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }
}