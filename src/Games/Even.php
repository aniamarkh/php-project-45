<?php

namespace BrainGames\Games\Even;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;
const MAX_NUMBER = 100;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function run(): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?', false, ' ');
    line('Hello, %s!', $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $number = random_int(1, MAX_NUMBER);
        line('Question: %s', $number);
        $answer = prompt('Your answer');
        $correctAnswer = isEven($number) ? 'yes' : 'no';

        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $name);
}
