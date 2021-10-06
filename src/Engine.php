<?php

namespace Hexlet\Code\Engine;

use function cli\line;
use function cli\prompt;

const QUESTION_COUNT = 3;

function readUserName()
{
    line('Welcome to the Brain Game!');
    return prompt('May I have your name?', false, ' ');
}

function greetUser(string $name)
{
    line('Hello, %s!', $name);
}

function printGameRules(string $gameRules)
{
    line($gameRules);
}

function printGameOver(string $name, string $wrongAnswer, string $rightAnswer)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $wrongAnswer, $rightAnswer);
    line("Let's try again, %s!", $name);
}

function askQuestion(string $question)
{
    line('Question: %s', $question);
    return prompt('Your answer');
}

function configurateGame(string $rules, callable $generateQuestion)
{
    return function () use ($rules, $generateQuestion) {
        $userName = readUserName();
        greetUser($userName);
        printGameRules($rules);

        $remainingQuestions = QUESTION_COUNT;

        while ($remainingQuestions > 0) {
            [$question, $rightAnswer] = $generateQuestion();
            $answer = askQuestion($question);

            if ($answer !== $rightAnswer) {
                printGameOver($userName, $answer, $rightAnswer);
                return;
            }

            line('Correct!');
            $remainingQuestions--;
        }

        line('Congratulations, %s!', $userName);
    };
}
