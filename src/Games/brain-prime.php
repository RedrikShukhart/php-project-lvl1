<?php

namespace Games\Brain\Games\Prime;

define("GAME_RULES_PRIME", "Answer \"yes\" if given number is prime. Otherwise answer \"no\".");

/**
 * Generate array of random arguments
 * @return array
 */
function generateRandomArguments(): array
{
    $gameArguments = [];

    for ($i = 0; $i < 3; $i++) {
        $gameArguments[$i] = rand(0, 20);
    }
    return $gameArguments;
}

/**
 * Check the number is prime
 * @param  int $number
 * @return string 'yes' or 'no'
 */
function isPrime(int $number): string
{
    if ($number === 1 || $number === 0) {
        return 'no';
    }

    $isPrime = 'yes';

    for ($primeNumber = 2; $primeNumber < $number; $primeNumber++) {
        $fmodNumbers = fmod($number, $primeNumber);
        if ($fmodNumbers == 0) {
            $isPrime = 'no';
        }
    }
    return $isPrime;
}

/**
 * Calculate correct answers: is the number prime
 * @param  array $gameArguments Arguments
 * @return array
 */
function getCorrectAnswer(array $gameArguments): array
{
    $solution = [];
    $i = 0;

    foreach ($gameArguments as $argument) {
        $isPrime = isPrime($argument);

        $solution[$i] = match ($isPrime) {
            'yes' => 'yes',
            default => 'no',
        };
        $i++;
    }
    return $solution;
}
