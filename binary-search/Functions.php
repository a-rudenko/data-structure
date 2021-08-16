<?php

/**
 * @param array $array
 * @param int|string $searchValue
 * @param int $start
 *
 * @return bool
 */
function binarySearch(array $array, int|string $searchValue, int $start = 0): bool
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
 * @param int|string $searchValue
 * @param int $start
 * @param int|null $end
 *
 * @return bool
 */
function binarySearchRecursive(array $array, int|string $searchValue, int $start = 0, ?int $end = null): bool
{
    $count = count($array);
    if ($count === 0) return false;
    if ($end === null) $end = $count - 1;
    if ($end < $start) return false;

    $mid = floor(($end + $start) / 2);
    if ($array[$mid] === $searchValue) return true;
    if ($array[$mid] > $searchValue) return binarySearchRecursive($array, $searchValue, $start, $mid - 1);

    return binarySearchRecursive($array, $searchValue, $mid + 1, $end);
}

/**
 * @param bool $found
 * @param string $value
 */
function printResult(bool $found, string $value): void
{
    if ($found) {
        echo sprintf('Value - %s was found in the array<br>', $value);
    } else {
        echo sprintf('Value - %s was not found in the array<br>', $value);
    }
}
