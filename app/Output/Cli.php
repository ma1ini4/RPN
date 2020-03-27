<?php

namespace App\Output;

class Cli implements Streamable
{
    private static $exitKeywords = ['q'];

    public function handleInput($callback) {
        while($input = fgets(STDIN)){
            $input = trim($input);

            if (in_array($input , self::$exitKeywords)) {
                exit("\nBye!\n");
            }

            call_user_func($callback, $input);
        }
    }
}