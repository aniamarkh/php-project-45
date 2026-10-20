<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run as runEngine;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Find the greatest common divisor of given numbers.';
const MAX_NUMBER = 100;

function gcd(int $a, int $b): int
{
    while ($b !== 0) {
        [$a, $b] = [$b, $a % $b];
    }

    return $a;
}

function run(): void
{
    $rounds = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $a = random_int(1, MAX_NUMBER);
        $b = random_int(1, MAX_NUMBER);

        $question = "{$a} {$b}";
        $correctAnswer = (string) gcd($a, $b);
        $rounds[] = [$question, $correctAnswer];
    }

    runEngine(DESCRIPTION, $rounds);
}
