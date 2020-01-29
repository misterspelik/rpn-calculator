<?php

$loader = __DIR__ . '/vendor/autoload.php';
if (!file_exists($loader)){
    echo 'Please run composer install !'.PHP_EOL;
    exit(1);
}
require_once $loader;

use Rpn\Cli;
use Rpn\Validator;
use Rpn\Calculator;

$calculator = Calculator::getInstance();

$fromCli = Cli::getExpression();
if (!is_null($fromCli)) {
    if (!Validator::isValidExpression($fromCli)) {
        exit(2);
    }

    Cli::printResult(
        $calculator->runExpression($fromCli)
    );

    exit(0);
}

$result = '';
while (!feof(STDIN)) {
    $line = Cli::readLine();

    if (Cli::isQuitCommand()){
        echo 'Bye! See you'.PHP_EOL;
        exit(0);
    } elseif (Cli::isResetCommand()) {
        $calculator->reset();
        continue;
    } elseif (Cli::isHelpCommand()) {
        Cli::printHelp();
        continue;
    } elseif (is_null($line)) {
        continue;
    }

    if (Validator::isValidExpression($line)) {
        $calculator->reset();
        $result = $calculator->runExpression($line);
    } else {
        $result = $calculator->runOperation($line);
    }

    Cli::printResult($result);
}