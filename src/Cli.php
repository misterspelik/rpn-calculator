<?php

namespace Rpn;

class Cli
{
    private static $last_input;

    private static $user_commands = [
      'quit' => 'q',
      'reset' => 'r',
      'help' => 'h'
    ];

    private static $cli_agruments = [
      "expression::",
    ];

    /**
     * Reads line from CLI input
     *
     * @return string | false
     */
    public static function readLine() : ?string
    {
        echo "> ";
        $input = fgets(STDIN);
        self::$last_input = Input::cleanLine($input);
        if (self::$last_input == "") {
            return null;
        }

        return self::$last_input;
    }

    /**
     * Check if last command was about Quit
     * @return bool
     */
    public function isQuitCommand() : bool
    {
        return self::$last_input == self::$user_commands['quit'];
    }

    /**
     * Check if last command was about Help
     * @return bool
     */
    public function isHelpCommand() : bool
    {
        return self::$last_input == self::$user_commands['help'];
    }

    /**
     * Check if last command was about Reset
     * @return bool
     */
    public function isResetCommand() : bool
    {
        return self::$last_input == self::$user_commands['reset'];
    }

    /**
     * Gets expression from input
     * (--expression="expr here")
     * @return string | null
     */
    public static function getExpression() : ?string
    {
        $options = getopt("", self::$cli_agruments);
        if (!empty($options['expression'])) {
            $clean = Input::cleanLine($options['expression']);
            if ($clean != "") {
               return $clean;
            }
        }

        return null;
    }

    /**
     * Prints result if not null
     * @param $result
     * @return void
     */
    public static function printResult($result)
    {
        if (!is_null($result)) {
            echo $result.PHP_EOL;
        }
    }

    /**
     * Prints help for commands
     * @return void
     */
    public static function printHelp()
    {
        echo 'Please use next available commands: '.PHP_EOL;
        foreach (self::$user_commands as $description => $key) {
            echo $key. ' - ', $description.PHP_EOL;
        }
    }
}