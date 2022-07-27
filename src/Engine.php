<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

/**
 * General logics for all games
 * @param  string $gameRules      Description game rules
 * @param  array  $questionValues Placeholders for question
 * @param  array  $solution       Correct answers in game
 * @return void
 */
function gameEngine(string $gameRules, array $questionValues, array $solution): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line($gameRules);

    for ($i = 0, $correctAnswers = 0; $i < 3; $i++) {
        line("Question: %s", $questionValues[$i]);
        $answer = prompt("Your answer");

        if ($solution[$i] != $answer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $solution[$i]);
            line("Let's try again, %s!", $name);
            break;
        }
        line("Correct!", $answer);
        $correctAnswers++;

        if ($correctAnswers === 3) {
            line("Congratulations, %s!", $name);
        }
    }
}
