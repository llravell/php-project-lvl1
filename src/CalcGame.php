<?php

namespace Hexlet\Code\CalcGame;

use function Hexlet\Code\Engine\configurateGame;

const GAME_RULES = 'What is the result of the expression?';

const OPERATIONS = ['+', '-', '*'];

function getRandomOperation()
{
    $index = random_int(0, sizeof(OPERATIONS) - 1);
    return OPERATIONS[$index];
}

function calcExtention(int $a, int $b, string $operation)
{
    if ($operation === '+') {
        return $a + $b;
    } elseif ($operation === '-') {
        return $a - $b;
    } elseif ($operation === '*') {
        return $a * $b;
    }
}

function startCalcGame()
{
    $generateQuestion = function () {
        $a = random_int(1, 50);
        $b = random_int(1, 50);
        $operation = getRandomOperation();

        $rightAnswer = (string) calcExtention($a, $b, $operation);
        $question = sprintf('%d %s %d', $a, $operation, $b);

        return [$question, $rightAnswer];
    };

    $start = configurateGame(GAME_RULES, $generateQuestion);
    $start();
}
