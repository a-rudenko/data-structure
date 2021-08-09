### MAIN FUNCTIONS

#### Structure
>BinaryTree.php  
>BinaryNode.php 

#### Creating a binary tree
`$binaryTree->createTree({{ ARRAY }})`

#### Adding the node to a tree
`$binaryTree->addNode({{ NODE VALUE }})`

#### Removing the node from a tree
`$binaryTree->removeNode({{ NODE VALUE }})`

#### Finding the node in a tree
`$binaryTree->findNode({{ NODE VALUE }})`

#### Getting the count of all nodes in a tree
`$binaryTree->getCountAllNodes()`

#### Getting the count of the leaf nodes in a tree (The node is a leaf node if both left and right child nodes of it are NULL)
`$binaryTree->getCountLeafNodes()`

#### Getting the left node value
`$binaryTree->getLeftValue({{ NODE VALUE }})`

#### Getting the right node value
`$binaryTree->getRightValue({{ NODE VALUE }})`

#### Getting maximum tree depth
`$binaryTree->getMaxDepth()`

#### Getting the minimum value of a tree node
`$binaryTree->getMinNode()`

#### Getting the maximum value of a tree node
`$binaryTree->getMaxNode()`

#### Traversing the tree and print it out
There are four types of traversal:
- Pre-order, NLR
- Post-order, LRN
- In-order, LNR
- Breadth-first search, BFS

`$binaryTree->traversal({{ TYPE }}) [TYPE - pre-order, post-order, in-order, bfs]`

Output examples:
###### Pre-order traversal
<pre>
45
---30
------25
---------15
------------3
---------27
------35
---------31
---55
------50
---------48
------65
---------60
---------68
</pre>
###### Post-order traversal
<pre>
------------3
---------15
---------27
------25
---------31
------35
---30
---------48
------50
---------60
---------68
------65
---55
45
</pre>
###### In-order traversal
<pre>
------------3
---------15
------25
---------27
---30
---------31
------35
45
---------48
------50
---55
---------60
------65
---------68
</pre>
###### Breadth-first search
<pre>
45
30 55
25 35 50 65
15 27 31 48 60 68
3
</pre>