<?php

namespace Games\Brain\Games\Gcd;

//Наибольший общий делитель

//game rules
define("GAME_RULES_GCD", "Find the greatest common divisor of given numbers.");

/**
 * Generate associated array with random arguments
 * @return array Arguments, where associated array keys:
 * 'number_first' -  First number
 * 'number_second' - Second number
 */
function generateRandomArguments(): array
{
    $gameArguments = [];

    for ($i = 0; $i < 3; $i++) {
        $randNumberFirst = rand(0, 10);
        $randNumberSecond = rand(0, 10);

        $gameArguments[$i] = [
            'number_first' => $randNumberFirst,
            'number_second' => $randNumberSecond,
        ];
    }
    return $gameArguments;
}

/**
 * Generate array-list of questions to the user
 * @param array $gameArguments Arguments, where associated array keys:
 * 'number_first' -  First number
 * 'number_second' - Second number
 * @return array Each element of the array is a question for calculation to the user
 */
function generateGameQuestions(array $gameArguments): array
{
    $gameQuestions = [];
    $i = 0;

    foreach ($gameArguments as $arguments) {
        $gameQuestions[$i] = "{$arguments['number_first']} {$arguments['number_second']}";
        $i++;
    }

    return $gameQuestions;
}

/**
 * Calculate correct answer: greatest common divisor of two numbers.
 * @param array $gameArguments Arguments, where associated array keys:
 * 'number_first' -  First number
 * 'number_second' - Second number
 * @return array
 */
function getCorrectAnswer(array $gameArguments): array
{
    $solution = [];
    $i = 0;

    foreach ($gameArguments as $arguments) {
        $solution[$i] = gmp_gcd($arguments['number_first'], $arguments['number_second']);
        $i++;
    }
    return $solution;
}
