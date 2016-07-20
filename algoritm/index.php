<?php

namespace App\Solution;

function multi($first, $second)
{
    // BEGIN
    if ($second == 1) {
        return $first;
    }
    return $first + multi($first, $second - 1);
    // END
}
echo multi(3,5);
?>