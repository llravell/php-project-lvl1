<?php

namespace Hexlet\Code\GcdGame;

use function Hexlet\Code\Engine\configurateGame;

const GAME_RULES = 'Find the greatest common divisor of given numbers.';

function gcd(int $num1, int $num2): int
{
    $a = max(abs($num1), abs($num2));
    $b = min(abs($num1), abs($num2));

    while (true) {
        if ($b === 0) {
            return $a;
        }
        $a %= $b;

        if ($a === 0) {
            return $b;
        }
        $b %= $a;
    }
}

function startGcdGame(): void
{
    $generateQuestion = function (): array {
        $baseNumber = random_int(2, 25);
        $a = $baseNumber * random_int(2, 10);
        $b = $baseNumber * random_int(2, 10);

        $question = sprintf('%d %d', $a, $b);
        $rightAnswer = (string) gcd($a, $b);

        return [$question, $rightAnswer];
    };

    $start = configurateGame(GAME_RULES, $generateQuestion);
    $start();
}
