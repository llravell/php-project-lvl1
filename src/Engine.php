<?php

namespace Hexlet\Code\Engine;

use function cli\line;
use function cli\prompt;

const QUESTION_COUNT = 3;

function readUserName(): string
{
    line('Welcome to the Brain Game!');
    return prompt('May I have your name?', '', ' ');
}

function greetUser(string $name): void
{
    line('Hello, %s!', $name);
}

function printGameRules(string $gameRules): void
{
    line($gameRules);
}

function printGameOver(string $name, string $wrongAnswer, string $rightAnswer): void
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $wrongAnswer, $rightAnswer);
    line("Let's try again, %s!", $name);
}

function askQuestion(string $question): string
{
    line('Question: %s', $question);
    return prompt('Your answer');
}

function configurateGame(string $rules, callable $generateQuestion): callable
{
    return function () use ($rules, $generateQuestion): void {
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
