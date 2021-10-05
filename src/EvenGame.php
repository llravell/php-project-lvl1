<?php

namespace Hexlet\Code\EvenGame;

const EVEN_GAME_RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number)
{
    return $number % 2 == 0;
}

function generateEvenQuestion()
{
    $num = random_int(1, 100);
    $rightAnswer = isEven($num) ? 'yes' : 'no';

    return [(string) $num, $rightAnswer];
}
