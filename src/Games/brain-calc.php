<?php

namespace Games\Brain\Games\Calc;

define("GAME_RULES_CALC", "What is the result of the expression?");

/**
 * Generate associated array with random arguments
 * @return array Arguments, where associated array keys:
 * 'operand'       - Arithmetics operand
 * 'number_first'  - First number
 * 'number_second' - Second number
 */
function generateRandomArguments(): array
{
    $gameArguments = [];

    for ($i = 0; $i < 3; $i++) {
        $randNumberFirst = rand(0, 10);
        $randNumberSecond = rand(0, 10);
        $operand = "+-*";
        $randOperand = $operand[rand(0, 2)];

        $gameArguments[$i] = [
            'number_first' => $randNumberFirst,
            'number_second' => $randNumberSecond,
            'operand' => $randOperand
        ];
    }
    return $gameArguments;
}

/**
 * Generate array-list of questions to the user
 * @param  array $gameArguments Arguments, where associated array keys:
 * 'operand'       - Arithmetics operand
 * 'number_first'  - First number
 * 'number_second' - Second number
 * @return array Each element of the array is a question for calculation to the user
 */
function generateGameQuestions(array $gameArguments): array
{
    $gameQuestions = [];
    $i = 0;

    foreach ($gameArguments as $arguments) {
        $gameQuestions[$i] = "{$arguments['number_first']} {$arguments['operand']} {$arguments['number_second']}";
        $i++;
    }

    return $gameQuestions;
}

/**
 * Calculate correct answer for operands "+, -, *" with two numbers
 * @param  array $gameArguments Arguments, where associated array keys:
 * 'operand'       - Arithmetics operand
 * 'number_first'  - First number
 * 'number_second' - Second number
 * @return array
 */
function getCorrectAnswer(array $gameArguments): array
{
    $solution = [];
    $i = 0;

    foreach ($gameArguments as $arguments) {
        switch ($arguments['operand']) {
            case ("+"):
                $solution[$i] = $arguments['number_first'] + $arguments['number_second'];
                break;
            case ("-"):
                $solution[$i] = $arguments['number_first'] - $arguments['number_second'];
                break;
            case ("*"):
                $solution[$i] = $arguments['number_first'] * $arguments['number_second'];
                break;
        }
        $i++;
    }
    return $solution;
}
