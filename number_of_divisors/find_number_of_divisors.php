<?php

/**
 * sqrt($n) complexity
 * works correctly for integers starting from 1
 *
 * @param $n
 * @return int
 */
function getNumberOfDivisors($n) {
    $factors = 0;
    $i = 1;

    while ($i * $i < $n) {
        if ($n % $i === 0) {
            $factors += 2;
        }

        $i++;
    }

    if ($i * $i === $n) {
        $factors++;
    }

    return $factors;
}
