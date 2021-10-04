<?php

namespace Hexlet\Code\EvenGame;

use function cli\line;
use function cli\prompt;

const QUESTION_COUNT = 3;

function isEven(int $number)
{
    return $number % 2 == 0;
}

function readUserName()
{
    line('Welcome to the Brain Game!');
    return prompt('May I have your name?', false, ' ');
}

function greetUser(string $name)
{
    line('Hello, %s!', $name);
}

function printGameRules()
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
}

function printGameOver(string $name, string $wrongAnswer, string $rightAnswer)
{
    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $wrongAnswer, $rightAnswer);
    line("Let's try again, %s!", $name);
}

function askQuestion(int $number)
{
    line('Question: %d', $number);
    return prompt('Your answer');
}

function isAnswerValid(string $answer)
{
    $validAnswers = ['yes', 'no'];
    return in_array(mb_strtolower($answer), $validAnswers);
}

function isAnswerYes(string $answer)
{
    return mb_strtolower($answer) === 'yes';
}

function startGame()
{
    $userName = readUserName();
    greetUser($userName);
    printGameRules();

    $remainingQuestions = QUESTION_COUNT;

    while ($remainingQuestions > 0) {
        $num = random_int(1, 100);
        $answer = askQuestion($num);
        $rightAnswer = isEven($num) ? 'yes' : 'no';

        $isGameOver = !isAnswerValid($answer) || isAnswerYes($answer) !== isEven($num);

        if ($isGameOver) {
            printGameOver($userName, $answer, $rightAnswer);
            return;
        }

        line('Correct!');
        $remainingQuestions--;
    }

    line('Congratulations, %s!', $userName);
}
