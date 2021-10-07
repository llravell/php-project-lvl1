<?php

namespace Hexlet\Code\EvenGame;

use function Hexlet\Code\Engine\configurateGame;

const GAME_RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 == 0;
}

function startEvenGame()
{
    $generateQuestion = function (): array {
        $num = random_int(1, 100);
        $rightAnswer = isEven($num) ? 'yes' : 'no';

        return [(string) $num, $rightAnswer];
    };

    $start = configurateGame(GAME_RULES, $generateQuestion);
    $start();
}
