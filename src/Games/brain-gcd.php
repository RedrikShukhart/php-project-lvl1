<?php

namespace Games\Brain\Games\Gcd;

define("GAME_RULES_GCD", "Find the greatest common divisor of given numbers.");

/**
 * Generate associated array with random arguments where associated array keys:
 * 'number_first'  - First number
 * 'number_second' - Second number
 * @return array
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
 * @param  array $gameArguments Arguments, where associated array keys:
 * 'number_first'  - First number
 * 'number_second' - Second number
 * @return array Each element of the array is a question for calculation to the user
 */
function generateGameQuestions(array $gameArguments): array
{
    $gameQuestions = [];
    $i = 0;

    foreach ($gameArguments as $arguments) {
        $gameQuestions[$i] = $arguments['number_first'] . ' ' . $arguments['number_second'];
        $i++;
    }

    return $gameQuestions;
}

/**
 * Calculate the greatest common divisor of two numbers
 * @param  int $numberFirst  First number
 * @param  int $numberSecond Second number
 * @return int
 */
function getGcd(int $numberFirst, int $numberSecond): int
{
    if ($numberFirst == $numberSecond) {
        return $numberSecond;
    }

    while ($numberFirst != $numberSecond) {
        if ($numberFirst > $numberSecond) {
            $numberFirst = $numberFirst - $numberSecond;
        } else {
            $numberSecond = $numberSecond - $numberFirst;
        }
    }

    return $numberFirst;
}

/**
 * Calculate correct answer: greatest common divisor of two numbers
 * @param  array $gameArguments Arguments, where associated array keys:
 * 'number_first'  - First number
 * 'number_second' - Second number
 * @return array
 */
function getCorrectAnswer(array $gameArguments): array
{
    $solution = [];
    $i = 0;

    foreach ($gameArguments as $arguments) {
        $solution[$i] = getGcd($arguments['number_first'], $arguments['number_second']);
        $i++;
    }
    return $solution;
}
