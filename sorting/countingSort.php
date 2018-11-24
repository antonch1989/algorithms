<?php

function countingSort(array $data): array
{
    $min = PHP_INT_MAX;
    $max = PHP_INT_MIN;
    $counts = [];

    foreach ($data as $item) {
        if ($item < $min) {
            $min = $item;
        }

        if ($item > $max) {
            $max = $item;
        }

        if (!isset($counts[$item])) {
            $counts[$item] = 0;
        }
        $counts[$item]++;
    }

    $result = [];

    for ($i = $min; $i < $max + 1; $i++) {
        if (!isset($counts[$i])) {
            continue;
        }

        while($counts[$i] > 0) {
            $result[] = $i;

            $counts[$i]--;
        }
    }

    return $result;
}

$data = [
    3, -10, -8, -8, -10, -2, -3, 1, -1, 4, 8, 22, 3, 7
];

$result = countingSort($data);

var_dump($result);
