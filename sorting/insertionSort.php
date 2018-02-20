<?php

function insertionSort(array $arr) {
    $length = count($arr);
    for ($i = 1; $i < $length; $i++) {
        $insert = $arr[$i];

        for ($j = $i - 1; $j >= 0; $j--) {
            if ($arr[$j] > $insert) {
                $tmp = $arr[$j];
                $arr[$j + 1] = $tmp;
                if ($j == 0) {
                    $arr[0] = $insert;
                }

                continue;
            }

            if ($j + 1 < $i) {
                $arr[$j + 1] = $insert;
            }

            break;
        }
    }

    return $arr;
}
