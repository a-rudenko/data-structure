<?php

/**
 * Bubble sorting algorithm
 *
 * @param array $array
 *
 * @return array
 */
function bubbleSort(array $array): array
{
    $count = count($array);
    if ($count <= 1) {
        return $array;
    }

    for ($i = 0; $i < $count; $i++) {
        for ($j = $i + 1; $j < $count; $j++) {
            if ($array[$i] > $array[$j]) {
                [$array[$i], $array[$j]] = [$array[$j], $array[$i]];
            }
        }
    }

    return $array;
}

/**
 * Quicksort algorithm
 *
 * @param array $array
 *
 * @return array
 */
function quickSort(array $array): array
{
    $count = count($array);
    if ($count <= 1) {
        return $array;
    }

    $firstValue = $array[0];
    $leftArray = [];
    $rightArray = [];
    for ($i = 1; $i < $count; $i++) {
        if ($array[$i] <= $firstValue) {
            $leftArray[] = $array[$i];
        } else {
            $rightArray[] = $array[$i];
        }
    }

    $leftArray = quickSort($leftArray);
    $rightArray = quickSort($rightArray);

    return array_merge($leftArray, [$firstValue], $rightArray);
}

/**
 * Insertion sorting algorithm
 *
 * @param array $array
 *
 * @return array
 */
function insertionSort(array $array): array
{
    $count = count($array);
    if ($count <= 1) {
        return $array;
    }

    for ($i = 1; $i < $count; $i++) {
        $value = $array[$i];
        for ($j = $i - 1; $j >= 0 && $array[$j] > $value; $j--) {
            $array[$j + 1] = $array[$j];
        }
        $array[$j + 1] = $value;
    }

    return $array;
}

/**
 * Merge sorting algorithm
 *
 * @param array $array
 *
 * @return array
 */
function mergeSort(array $array): array
{
    $count = count($array);
    if ($count <= 1) {
        return $array;
    }

    $left = array_slice($array, 0, (int)($count / 2));
    $right = array_slice($array, (int)($count / 2));
    $left = mergeSort($left);
    $right = mergeSort($right);
    $array = [];
    while (count($left) > 0 && count($right) > 0) {
        if ($left[0] < $right[0]) {
            array_push($array, array_shift($left));
        } else {
            array_push($array, array_shift($right));
        }
    }

    array_splice($array, count($array), 0, $left);
    array_splice($array, count($array), 0, $right);

    return $array;
}

/**
 * Bucket sorting algorithm
 *
 * @param array $array
 *
 * @return array
 */
function bucketSort(array $array): array
{
    $count = count($array);
    if ($count <= 1) {
        return $array;
    }

    $min = $array[0];
    $max = $array[0];
    for ($i = 1; $i < $count; $i++) {
        if ($array[$i] > $max) {
            $max = $array[$i];
        }
        if ($array[$i] < $min) {
            $min = $array[$i];
        }
    }

    $bucketArray = range(0, $max - $min + 1);
    for ($i = 0; $i < count($bucketArray); $i++) {
        $bucketArray[$i] = [];
    }
    for ($i = 0; $i < count($array); $i++) {
        $bucketArray[$array[$i] - $min][] = $array[$i];
    }

    $position = 0;
    for ($i = 0; $i < count($bucketArray); $i++) {
        if (count($bucketArray[$i]) > 0) {
            for ($j = 0; $j < count($bucketArray[$i]); $j++) {
                $array[$position++] = $bucketArray[$i][$j];
            }
        }
    }

    return $array;
}

/**
 * Selection sorting algorithm
 *
 * @param array $array
 *
 * @return array
 */
function selectionSort(array $array): array
{
    $count = count($array);
    if ($count <= 1) {
        return $array;
    }

    for ($i = 0; $i < $count - 1; $i++) {
        $min = $i;

        for ($j = $i + 1; $j < $count; $j++) {
            if ($array[$j] < $array[$min]) {
                $min = $j;
            }
        }

        $temp = $array[$i];
        $array[$i] = $array[$min];
        $array[$min] = $temp;
    }

    return $array;
}
