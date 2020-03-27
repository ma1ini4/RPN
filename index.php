<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Output\Cli;
use App\RpnCalculator\Rpn;

try {
    $cli = new Cli();
    $cli->handleInput(function ($value) {
        $result = Rpn::Calculate($value);
        echo sprintf("> %01.2f\n", $result);
    });
} catch (\Exception $exception) {
    echo sprintf("%s\n", $exception->getMessage());
}
