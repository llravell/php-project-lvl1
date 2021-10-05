<?php

namespace Hexlet\Code\CalcGame;

const CALC_GAME_RULES = '';

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

function generateCalcQuestion()
{
    $a = random_int(1, 100);
    $b = random_int(1, 100);
    $operation = getRandomOperation();

    $rightAnswer = (string) calcExtention($a, $b, $operation);
    $question = sprintf('%d %s %d', $a, $operation, $b);

    return [$question, $rightAnswer];
}
