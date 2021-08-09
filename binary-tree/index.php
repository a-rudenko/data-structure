<?php
require_once 'BinaryTree.php';

$array = [45, 30, 55, 25, 35, 50, 65, 15, 27, 31, 48, 60, 68];
$binaryTree = new BinaryTree();
$binaryTree->createTree($array);
$binaryTree->addNode(3);
$binaryTree->removeNode(48);
echo $binaryTree->findNode(31) . '<br>';
echo $binaryTree->findNode(32) . '<br>';
echo 'Count of nodes - ' . $binaryTree->getCountAllNodes() . '<br>';
echo 'Count of leaf nodes - ' . $binaryTree->getCountLeafNodes() . '<br>';
echo 'Left node value - ' . $binaryTree->getLeftValue(45) . '<br>';
echo 'Right node value - ' . $binaryTree->getRightValue(45) . '<br>';
echo 'Max depth - ' . $binaryTree->getMaxDepth() . '<br>';
echo 'Min node value - ' . $binaryTree->getMinNode() . '<br>';
echo 'Max node value - ' . $binaryTree->getMaxNode() . '<br>';
echo '<br>Traversal pre order:<br>';
$binaryTree->traversal('pre-order');
echo '<br>Traversal post order:<br>';
$binaryTree->traversal('post-order');
echo '<br>Traversal in order:<br>';
$binaryTree->traversal('in-order');
echo '<br>Traversal bfs:<br>';
$binaryTree->traversal('bfs');
