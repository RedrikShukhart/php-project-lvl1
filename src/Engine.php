<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

/**
 * Greeting user and define as constant user's name.
 * @return void
 */
function greetingUser(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    define("USER_NAME", $name);
    line("Hello, %s!", USER_NAME);
}

/**
 * General logics for all games.
 * @param string $gameRules Description game rules
 * @param array $questionValues Placeholders for question
 * @param array $solution Correct answers in game
 * @return void
 */
function gameEngine(string $gameRules, array $questionValues, array $solution): void
{
    //show the game rules to user and ask questions
    line($gameRules);

    //number of correct answers
    $correctAnswers = 0;

    for ($i = 0; $i < 3; $i++) {
        line("Question, %s", $questionValues[$i]);

        //get user's answer
        $answer = prompt("Your answer");

        //in every game calculated the correct answers

        //compare correct answer with user's answer
        if ($solution[$i] == $answer) {
            line("Correct!", $answer);
            $correctAnswers++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $solution[$i]);
            line("Let's try again, %s!", USER_NAME);
            break;
        }

        if ($correctAnswers === 3) {
            line("Congratulations, %s!", USER_NAME);
        }
    }
}
