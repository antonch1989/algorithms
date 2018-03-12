<?php

// [1, -3, 2, -5, 7, 6, -1, -4, 11, -23]

function findMaxSubArray(array $arr)
{
    $max = ~PHP_INT_MAX;

    $length = count($arr);
    for ($j = 0; $j <= $length; $j++) {
        for ($i = 0; $i < $length; $i++) {
            $tmpMax = 0;
            if ($i + $j > $length) {
                break;
            }

            for ($k = $i; $k <= $i + $j; $k++) {
                $tmpMax += $arr[$k];
            }

            $max = max($max, $tmpMax);
        }
    }

    return $max;
}
