<?php

function getCombinations(array $items, $k, $combinations = null)
{
    if ($combinations === null) {
        $combinations = $items;
    }

    if ($k == 1) {
        return $combinations;
    }

    $newCombinations = [];
    foreach ($combinations as &$combination) {
        if (!is_array($combination)) {
            $combination = [$combination];
        }

        foreach ($items as $item) {
            $newComb = array_merge($combination, [$item]);
            sort($newComb);
            if (!in_array($item, $combination) && !in_array($newComb, $newCombinations)) {
                $newCombinations[] = $newComb;
            }
        }
    }

    $k--;

    return getCombinations($items, $k, $newCombinations);
}

// usage example: getCombinations([1, 2, 3], 2);