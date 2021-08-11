<?php
require_once 'Functions.php';

$array = range(1, 10);
$value = 4;

printResult(binarySearch($array, $value), $value);
printResult(binarySearchRecursive($array, $value), $value);
