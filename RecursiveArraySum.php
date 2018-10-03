<?php

function recursiveArraySum(array $array)
{
    if (count($array) == 1) {
        return array_pop($array);
    }

    if (count($array) == 0) {
        return 0;
    }

    $last = array_pop($array);
    return recursiveArraySum($array) + $last;
}

echo recursiveArraySum([3, 4, 10]);