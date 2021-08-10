<?php

/**
 * @param array $array
 * @param int $searchValue
 * @param int $start
 *
 * @return bool
 */
function binarySearch(array $array, int $searchValue, int $start = 0): bool
{
    $count = count($array);
    if ($count === 0) return false;

    $end = $count - 1;
    while ($start <= $end) {
        $mid = floor(($start + $end) / 2);
        if ($array[$mid] === $searchValue) {
            return true;
        }
        if ($searchValue < $array[$mid]) {
            $end = $mid - 1;
        } else {
            $start = $mid + 1;
        }
    }

    return false;
}

/**
 * @param array $array
 * @param int $searchValue
 * @param int $start
 * @param int|null $end
 *
 * @return bool
 */
function binarySearchRecursive(array $array, int $searchValue, int $start = 0, ?int $end = null): bool
{
    $count = count($array);
    if ($count === 0) return false;
    if ($end === null) $end = $count - 1;
    if ($end < $start) return false;

    $mid = (int)floor(($end + $start) / 2);
    if ($array[$mid] === $searchValue) return true;
    if ($array[$mid] > $searchValue) return binarySearchRecursive($array, $searchValue, $start, $mid - 1);

    return binarySearchRecursive($array, $searchValue, $mid + 1, $end);
}

/**
 * @param bool $found
 * @param int $value
 */
function printResult(bool $found, int $value)
{
    if ($found) {
        echo sprintf('Value - %d was found in the array<br>', $value);
    } else {
        echo sprintf('Value - %d was not found in the array<br>', $value);
    }
}
