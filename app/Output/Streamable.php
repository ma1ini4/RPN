<?php

namespace App\Output;

interface Streamable {
    public function handleInput($callback);
}
