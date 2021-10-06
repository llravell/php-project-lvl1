<?php

namespace Hexlet\Code\EvenGame;

use function Hexlet\Code\Engine\configurateGame;

const EVEN_GAME_RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number)
{
    return $number % 2 == 0;
}

function startEvenGame()
{
    $generateEvenQuestion = function () {
        $num = random_int(1, 100);
        $rightAnswer = isEven($num) ? 'yes' : 'no';

        return [(string) $num, $rightAnswer];
    };

    $start = configurateGame(EVEN_GAME_RULES, $generateEvenQuestion);
    $start();
}
