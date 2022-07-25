<?php

namespace Games\Brain\Games\Progression;

//game rules
define("GAME_RULES_PROGRESSION", "What number is missing in the progression?");

/**
 * Generates associated array of arguments of arithmetics progression, where
 * 'question_key_number' - unknown number key to ask user
 * 'step'                - step of arithmetics progression
 * 'numbers'             - numbers of arithmetics progression
 * @return array
 */
function generateRandomArguments(): array
{
    $arguments = [];

    for ($k = 0; $k < 3; $k++) {
        $arguments[$k]['numbers'][0] = rand(0, 10);
        $arguments[$k]['step'] = rand(0, 5);

        for ($i = 1; $i < 10; $i++) {
            $arguments[$k]['numbers'][$i] = $arguments[$k]['numbers'][$i - 1] + $arguments[$k]['step'];
        }

        $arguments[$k]['question_key_number'] = rand(0, count($arguments[$k]['numbers']) - 1);
    }

    return $arguments;
}

/**
 * Generates array-list of questions to the user
 * in format 12 13 14 .. 15 16 17
 * @param  array $gameArguments Array of arguments, where associated array keys:
 * 'question_key_number' - unknown number key to ask user
 * 'step'                - step of arithmetics progression
 * 'numbers'             - numbers of arithmetics progression
 * @return array
 */
function generateGameQuestions(array $gameArguments): array
{
    $questions = [];
    $key = 0;

    foreach ($gameArguments as  $gameArgument) {
        $keyToRemove = $gameArgument['question_key_number'];
        $gameArgument['numbers'][$keyToRemove] = '..';
        $questions[$key] = implode(' ', $gameArgument['numbers']);
        $key++;
    }
    return $questions;
}

/**
 * Get the correct answers, which the number is hidden
 * @param  array $gameArguments Array of arguments, where associated array keys:
 * 'question_key_number' - unknown number key to ask user
 * 'step'                - step of arithmetics progression
 * 'numbers'             - numbers of arithmetics progression
 * @return array
 */
function getCorrectAnswer(array $gameArguments): array
{
    $solution = [];
    $key = 0;

    foreach ($gameArguments as $gameArgument) {
        $keyToRemove = $gameArgument['question_key_number'];
        if ($keyToRemove === 0) {
            $solution[$key] = $gameArgument['numbers'][$keyToRemove + 1] - $gameArgument['step'];
        } else {
            $solution[$key] = $gameArgument['numbers'][$keyToRemove - 1] + $gameArgument['step'];
        }
        $key++;
    }
    return $solution;
}
