Reverse Polish Notation Calculator
===================
This is PHP implementation of RPN Calculator.

Solution description
-----------------
Package consists of several classes and was designed for future usage as Composer package.
Concept is having Rpn\Calculator class which is Singleton designed in order to be the same instance in possibly different parts of Application which uses it.
It injects dependencies such as:
* work with Input
* validation
* work with numbers stack to be calculated

Also these is separate Rpn\Cli class in order to be used as part of CLI Application.

Installation
==================
Since this planned to be used via composer please clone this repository and run
```shell
composer install
```

CLI RPN Calculator - Usage
==================
In order to use CLI mode please use index.php file. There is a wrapper for some cases as decribed below.

Use cases
-----------------
1. Using with optional `--expression` parameter. In this case application calculates result and gives it as output. Exit code is 0.
```shell
php index.php --expression="2 1 12 3 / - +"
```

2. Using as step-by-step calculator. Runs as
```shell
php index.php
```

And then incrementally giving operands and operators
```shell
  > 5
  5
  > 8
  8
  > +
  13
  >r
  >2 1 12 3 / - +
  -1
  >
```

Available commands in step-by-step mode
-----------------
* q - quits application
* r - resets calculator`s state and could be used in case when you want to reset calculation
* h - prints hint about commands could be used

ToDo
==================
As far as this is quick solution it is not well structured. Hope this will be fixed in future.
Items described below need to be added for package to be finished. Obviously need more time to finish that and hope this could be done in future.
Or you are welcome to fork and add :)

Exceptions
-----------------
For now Rpn\Validator just echoes messages if something is wrong.
For sure this is hard-code and needs to be refactored to throw exceptions
Possible location of Exceptions classes could be used as src/Exceptions under Rpn\Exceptions namespace.

Under this item I assume that throw and catch (in client code) needs to be added in order to correct work.

Tests
-----------------
This Calculator could be automatically tested by `phpUnit` and btw that was also one of reasons to add composer.json.
In future `require-dev` section can be added with phpunit.

Add more operations
-----------------
As far as only 4 basic operations are supported it would be great to add more operations, possibly all :)
