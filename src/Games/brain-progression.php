<?php

namespace Games\Brain\Games\Progression;

//game rules
define("GAME_RULES_PROGRESSION", "What number is missing in the progression?");

/**
 * Associated array of arguments of arithmetics progression
 * @return array Arguments, where
 * 'step' - step of arithmetics progression
 * 'numbers' - numbers of arithmetics progression
 * 'question_key_number' - unknown number key to ask user
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

//print_r(generateRandomNumbers());

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

//$numbers = generateRandomArguments();

//print_r($numbers);
//print_r(generateGameQuestions($numbers));

function getCorrectAnswer($gameArguments)
{
    $solution = [];
    $key = 0;

    foreach ($gameArguments as $gameArgument) {
        $keyToRemove = $gameArgument['question_key_number'];
        if ($keyToRemove === 0) {
            //действия на случай, если неизвестное число первое
            $solution[$key] = $gameArgument['numbers'][$keyToRemove + 1] - $gameArgument['step'];
        } else {
            $solution[$key] = $gameArgument['numbers'][$keyToRemove - 1] + $gameArgument['step'];
        }
        $key++;
    }
    return $solution;
}
//print_r(getCorrectAnswer($numbers));
