<?php

function getCombinations(array $items, $k, $combinations = null)
{
    if ($k == 1) {
        return $items;
    }

    if ($combinations === null) {
        $combinations = $items;
    }

    $newCombinations = [];
    foreach ($combinations as $combination) {
        foreach ($items as $item) {
            if (!is_array($combination)) {
                $combination = [$combination];
            }

            if (!in_array($item, $combination)) {
                $combination[] = $item;
                $newCombinations[] = $combination;
            }


        }
    }

    var_dump($newCombinations); die;

    return $combinations;
}
