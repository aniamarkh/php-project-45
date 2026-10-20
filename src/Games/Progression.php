<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run as runEngine;

use const BrainGames\Engine\ROUNDS_COUNT;

const DESCRIPTION = 'What number is missing in the progression?';
const LENGTH = 10;
const MAX_START = 50;
const MAX_STEP = 10;
const HIDDEN_MARK = '..';

function makeProgression(int $start, int $step, int $length): array
{
    $progression = [];

    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }

    return $progression;
}

function run(): void
{
    $rounds = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $start = random_int(1, MAX_START);
        $step = random_int(1, MAX_STEP);
        $progression = makeProgression($start, $step, LENGTH);

        $hiddenIndex = random_int(0, LENGTH - 1);
        $correctAnswer = (string) $progression[$hiddenIndex];
        $progression[$hiddenIndex] = HIDDEN_MARK;

        $question = implode(' ', $progression);
        $rounds[] = [$question, $correctAnswer];
    }

    runEngine(DESCRIPTION, $rounds);
}
