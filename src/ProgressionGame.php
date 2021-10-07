<?php

namespace Hexlet\Code\ProgressionGame;

use function Hexlet\Code\Engine\configurateGame;

const GAME_RULES = 'What number is missing in the progression?';

const PROGRESSION_LENGTH = 10;

function generateRandomProgression(): array
{
    $currentNumber = random_int(1, 50);
    $step = random_int(1, 5);
    $progression = [];

    for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
        $progression[] = $currentNumber;
        $currentNumber += $step;
    }

    return $progression;
}

function displayProgressionWithMissingItem($progression, $missingIndex): string
{
    $buffer = [];
    foreach ($progression as $i => $item) {
        $buffer[] = $i === $missingIndex ? '..' : $item;
    }

    return implode(' ', $buffer);
}

function startProgressionGame(): void
{
    $generateQuestion = function (): array {
        $progression = generateRandomProgression();
        $missingNumberIndex = random_int(0, PROGRESSION_LENGTH - 1);
        $missingNumber = $progression[$missingNumberIndex];
        $displayedProgression = displayProgressionWithMissingItem($progression, $missingNumberIndex);

        return [$displayedProgression, (string) $missingNumber];
    };

    $start = configurateGame(GAME_RULES, $generateQuestion);
    $start();
}
