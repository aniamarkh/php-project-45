<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run as runEngine;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MAX_NUMBER = 100;

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($divisor = 2; $divisor * $divisor <= $number; $divisor++) {
        if ($number % $divisor === 0) {
            return false;
        }
    }

    return true;
}

function run(): void
{
    $rounds = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = random_int(1, MAX_NUMBER);
        $correctAnswer = isPrime($number) ? 'yes' : 'no';
        $rounds[] = [(string) $number, $correctAnswer];
    }

    runEngine(DESCRIPTION, $rounds);
}
