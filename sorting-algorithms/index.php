<?php
require_once 'Functions.php';

$array = range(-1, 12);
shuffle($array);

echo '<pre>';
echo 'Bubble sorting algorithm:<br>';
print_r(bubbleSort($array));
echo '<br>Quicksort algorithm:<br>';
print_r(quicksort($array));
echo '<br>Insertion sorting algorithm:<br>';
print_r(insertionSort($array));
echo '<br>Merge sorting algorithm:<br>';
print_r(mergeSort($array));
echo '<br>Bucket sorting algorithm:<br>';
print_r(bucketSort($array));
echo '<br>Selection sorting algorithm:<br>';
print_r(selectionSort($array));
echo '</pre>';
