<?php

namespace Hexlet\Code\PrimeGame;

use function Hexlet\Code\Engine\configurateGame;

const GAME_RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return $num > 1;
}

function startPrimeGame(): void
{
    $generateQuestion = function (): array {
        $number = random_int(1, 100);
        $rightAnswer = isPrime($number) ? 'yes' : 'no';

        return [(string) $number, $rightAnswer];
    };

    $start = configurateGame(GAME_RULES, $generateQuestion);
    $start();
}
