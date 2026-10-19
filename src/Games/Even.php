<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\run as runEngine;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MAX_NUMBER = 100;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function run(): void
{
    $rounds = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = random_int(1, MAX_NUMBER);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $rounds[] = [(string) $number, $correctAnswer];
    }

    runEngine(DESCRIPTION, $rounds);
}
