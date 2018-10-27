<?php

/**
 * Dynamic programming approach example from `Grokking algorithms` book
 */
function findRoute(array $sights)
{
    $steps = ['0.5', '1', '1.5', '2'];

    $previousRowPoints = null;
    $rowPoints = null;

    $previousRowPlaces = null;
    $rowPlaces = null;

    foreach ($sights as $name => $data) {

        $previousRowPoints = $rowPoints;
        $previousRowPlaces = $rowPlaces;

        foreach ($steps as $step) {
            if ($data['time'] > $step) {
                if (is_array($previousRowPoints) && array_key_exists($step, $previousRowPoints)) {
                    $rowPoints[$step] = $previousRowPoints[$step];
                    $rowPlaces[$step] = $previousRowPlaces[$step];
                } else {
                    $rowPoints[$step] = 0;
                    $rowPlaces[$step] = [];
                }

                continue;
            }

            $remaining = $step - $data['time'];
            if ($remaining < 0) {
                $remaining = '0';
            }
            $remaining = (string) $remaining;

            $newPoints = $data['points'];
            $newPlaces = [$name];

            if ($remaining != '0' && $previousRowPoints) {
                $newPoints += $previousRowPoints[$remaining];
                $newPlaces = array_merge($newPlaces, $previousRowPlaces[$remaining]);
            }

            if ($previousRowPoints && $previousRowPoints[$step] > $newPoints) {
                $rowPoints[$step] = $previousRowPoints[$step];
                $rowPlaces[$step] = $previousRowPlaces[$step];
            } else {
                $rowPoints[$step] = $newPoints;
                $rowPlaces[$step] = $newPlaces;
            }
        }
    }

    return ['route' => implode(',', $rowPlaces[end($steps)]), 'points' => $rowPoints[end($steps)]];
}

$sights = [
    'westminster abbey'     => ['time' => 0.5, 'points' => 7],
    'globe theatre'         => ['time' => 0.5, 'points' => 6],
    'national gallery'      => ['time' => 1, 'points' => 9],
    'british museum'        => ['time' => 2, 'points' => 9],
    'st. paul\'s cathedral' => ['time' => 0.5, 'points' => 8],
];

$result = findRoute($sights);

echo 'Go to: '.$result['route'].' and get '.$result['points'].' points!';

