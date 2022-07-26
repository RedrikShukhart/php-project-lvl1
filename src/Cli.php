<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

/**
 * Greeting user
 * @return void
 */
function welcomeToGame()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
}
