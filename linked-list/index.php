<?php
require_once 'LinkedList.php';

$array = range(1,20);
$linkedList = new LinkedList();
$linkedList->createLinkedList($array);
$linkedList->addNode(21);
$linkedList->addNode('value1');
$linkedList->addNode('value2');
echo 'Linked list:<br>' . $linkedList->printList() . '<br>';
echo 'Head value is - ' . $linkedList->getHeadValue() . '<br><br>';
$linkedList->reverseLinkedList();
echo 'Reversing linked list:<br>' . $linkedList->printList() . '<br>';
echo 'Count of nodes - ' . $linkedList->getCountNodes() . '<br>';
echo 'Head value is - ' . $linkedList->getHeadValue() . '<br><br>';
echo $linkedList->findNode(21) . '<br><br>';
$linkedList->removeNode(21);
echo 'Linked list:<br>' . $linkedList->printList() . '<br>';
echo 'Count of nodes - ' . $linkedList->getCountNodes() . '<br>';
