<?php

namespace Rpn;

class Input
{

    /**
     * Trims input and cleans spaces
     * @param string $line
     * @return string
     */
    public static function cleanLine($line) : string
    {
        return str_replace("  ", " ", trim($line));
    }

    /**
     * Explodes input to array
     * @param string $line
     * @return array
     */
    public static function explode($line) : array
    {
        return explode(' ', self::cleanLine($line));
    }
}