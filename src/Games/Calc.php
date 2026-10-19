<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run as runEngine;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What is the result of the expression?';
const OPERATIONS = ['+', '-', '*'];
const MAX_NUMBER = 25;

function calculate(int $a, int $b, string $operation): int
{
    switch ($operation) {
        case '+':
            return $a + $b;
        case '-':
            return $a - $b;
        case '*':
            return $a * $b;
        default:
            throw new \Exception("Unknown operation: {$operation}");
    }
}

function run(): void
{
    $rounds = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $a = random_int(1, MAX_NUMBER);
        $b = random_int(1, MAX_NUMBER);
        $operation = OPERATIONS[array_rand(OPERATIONS)];

        $question = "{$a} {$operation} {$b}";
        $correctAnswer = (string) calculate($a, $b, $operation);
        $rounds[] = [$question, $correctAnswer];
    }

    runEngine(DESCRIPTION, $rounds);
}
