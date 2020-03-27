<?php

namespace App\RpnCalculator;

class Rpn
{

    private static $allowedOperators =  ["+", "-", "/", "*"];

    private static $stack = [];
    private static $operator = false;

    /**
     * @param string $pattern
     * @return int|mixed
     * @throws \Exception
     */
    public static function Calculate(string $pattern)
    {
        if (empty($pattern)) {
            return end(self::$stack) ?? 0;
        }

        $patternArray = explode( ' ', str_replace("  ", " ", trim($pattern)));


        foreach ($patternArray as $value) {
            if (is_numeric($value)) {
                array_push(self::$stack, $value);
            } elseif (in_array($value, self::$allowedOperators)) {
                self::$operator = $value;
                self::DoCalculation();
            } else {
                throw new \Exception('Invalid character "'.$value . '". This character is not allowed.');
            }
        }


        return end(self::$stack);
    }

    /**
     * @throws \Exception
     */
    private static function DoCalculation() {


        if (empty(self::$stack)) {
            throw new \Exception('Calculation stack is empty.');
        }


        if (count(self::$stack) === 1) {
            return;
        }


        $firstNumber = self::$stack[count(self::$stack) - 1];
        $secondNumber = self::$stack[count(self::$stack) - 2];


        switch (self::$operator) {
            case '+':
                array_push(self::$stack, $secondNumber + $firstNumber);
                break;
            case '-':
                array_push(self::$stack, $secondNumber - $firstNumber);
                break;
            case '/':
                array_push(self::$stack, $secondNumber / $firstNumber);
                break;
            case '*':
                array_push(self::$stack, $secondNumber * $firstNumber);
                break;
        }


        self::$operator = false;

        return;
    }
}