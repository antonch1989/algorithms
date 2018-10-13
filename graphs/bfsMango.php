<?php

/**
 * Use BFS to find closest mango seller in your social network
 * An example from `Grokking algorithms` book
 */
function search(array $contacts) {

    $queue = [];
    $checked = [];

    addToQueue($queue, $contacts['you']);

    while ($queue) {
        $person = array_shift($queue);
        if (in_array($person, $checked)) {
            continue;
        }

        if (isMangoSeller($person)) {

            return "$person is a closest mango seller";
        }

        $checked[] = $person;
        addToQueue($queue, $contacts[$person]);
    }

    return 'There is no mango seller';
}

function addToQueue(array &$queue, array $people)
{
    foreach ($people as $person) {
        array_push($queue, $person);
    }
}

function isMangoSeller(string $name) {

    return $name[0] === 'm';
}

$links = [
    'you'    => ['alice', 'bob', 'claire'],
    'bob'    => ['anuj', 'peggy'],
    'alice'  => ['peggy'],
    'claire' => ['tom', 'john'],
    'anuj'   => [],
    'peggy'  => [],
    'tom'    => [],
    'john'   => [],
];

$result = search($links);

echo $result;