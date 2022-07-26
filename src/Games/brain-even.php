<?php

namespace Games\Brain\Games\Even;

define("GAME_RULES_EVEN", "Answer \"yes\" if the number is even, otherwise answer \"no\".");

/**
 * Generate array of random arguments
 * @return array
 */
function generateRandomArguments(): array
{
    $gameArguments = [];

    for ($i = 0; $i < 3; $i++) {
        $gameArguments[$i] = rand(0, 10);
    }

    return $gameArguments;
}

/**
 * Calculate correct answers: is the number even
 * @param  array $gameArguments Arguments
 * @return array
 */
function getCorrectAnswer(array $gameArguments): array
{
    $solution = [];
    $i = 0;

    foreach ($gameArguments as $arguments) {
        $modRandNumber = fmod($arguments, 2);

        switch ($modRandNumber) {
            case(0):
                $solution[$i] = 'yes';
                break;
            default:
                $solution[$i] = 'no';
                break;
        }
        $i++;
    }
    return $solution;
}
