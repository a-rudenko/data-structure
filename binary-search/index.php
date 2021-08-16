<?php
require_once 'Functions.php';

$array = [1, 2, 3, 4, 5, 6, 7, '8', '9', 'test1', 'test2', 'test3', 'test4'];
$value = 'test1';

printResult(binarySearch($array, $value), $value);
printResult(binarySearchRecursive($array, $value), $value);
