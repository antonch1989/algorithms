<?php

// O(N) complexity
// [5, -7, 3, 5, -2, 4, -1]

function maxSubArray(array $arr)
{
    $isPositive = false;

    foreach ($arr as $value) {
        if ($value > 0) {
            $isPositive = true;
            break;
        }
    }

    if (!$isPositive) {
        return max($arr);
    }

    $answer = $sum = 0;
    foreach ($arr as $value) {
        $sum += $value;
        if ($sum < 0) {
            $sum = 0;
        } elseif ($sum > $answer) {
            $answer = $sum;
        }
    }

    return $answer;
}
