<?php

function selectionSort(array $data)
{
    for ($i = 0; $i < count($data); $i++) {
        $minIndex = null;
        for ($j = $i; $j < count($data); $j++) {
            if ($minIndex === null || $data[$j] < $data[$minIndex]) {
                $minIndex = $j;
            }
        }

        $tmp = $data[$i];
        $data[$i] = $data[$minIndex];
        $data[$minIndex] = $tmp;
    }

    return $data;
}

$data = [3, 2, 4, 12, 9, -1, 7];

$result = selectionSort($data);

foreach ($result as $item) {
    echo $item.' ';
}
