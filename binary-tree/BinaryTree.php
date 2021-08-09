<?php

require_once 'BinaryNode.php';

class BinaryTree
{
    /**
     * @param null $root
     */
    public function __construct(
        private $root = null
    )
    {
    }

    /**
     * @param array $values
     */
    public function createTree(array $values)
    {
        foreach ($values as $value) {
            $this->root = $this->add($this->root, $value);
        }
    }

    /**
     * @param int $value
     */
    public function addNode(int $value)
    {
        $this->root = $this->add($this->root, $value);
    }

    /**
     * @param int $value
     */
    public function removeNode(int $value)
    {
        $this->root = $this->remove($this->root, $value);
    }

    /**
     * @param int $value
     *
     * @return string
     */
    public function findNode(int $value): string
    {
        if ($this->find($this->root, $value)) {
            return "Node with this value - $value was found";
        }

        return "Node with this value - $value was not found";
    }

    /**
     * @param int $value
     *
     * @return int|string
     */
    public function getLeftValue(int $value): int|string
    {
        $node = $this->find($this->root, $value);
        if ($node) {
            $leftSubNode = $node->left;
            if ($leftSubNode) {
                return $leftSubNode->value;
            }

            return 'Node has no left subnode';
        }

        return 'Node with this value was not found';
    }

    /**
     * @param int $value
     *
     * @return int|string
     */
    public function getRightValue(int $value): int|string
    {
        $node = $this->find($this->root, $value);
        if ($node) {
            $rightSubNode = $node->right;
            if ($rightSubNode) {
                return $rightSubNode->value;
            }

            return 'Node has no right subnode';
        }

        return 'Node with this value was not found';
    }

    /**
     * @return int|string
     */
    public function getMinNode(): int|string
    {
        $node = $this->root;
        if ($node === null) {
            return 'Tree is empty';
        }

        while ($node->left) {
            $node = $node->left;
        }

        return $node->value;
    }

    /**
     * @return int|string
     */
    public function getMaxNode(): int|string
    {
        $node = $this->root;
        if ($node === null) {
            return 'Tree is empty';
        }

        while ($node->right) {
            $node = $node->right;
        }

        return $node->value;
    }

    /**
     * @param BinaryNode|null $node
     * @param int $value
     *
     * @return BinaryNode|null
     */
    private function add(?BinaryNode $node, int $value): ?BinaryNode
    {
        if ($node === null) {
            $node = new BinaryNode($value);
        }
        if ($value < $node->value) {
            $node->left = $this->add($node->left, $value);
        }
        if ($value > $node->value) {
            $node->right = $this->add($node->right, $value);
        }

        return $node;
    }

    /**
     * @param BinaryNode|null $node
     * @param int $value
     *
     * @return BinaryNode|void
     */
    private function remove(?BinaryNode $node, int $value)
    {
        if ($node === null) {
            die('Node is not found or tree is empty');
        }

        if ($node->value > $value) {
            $node->left = $this->remove($node->left, $value);
        }

        if ($node->value < $value) {
            $node->right = $this->remove($node->right, $value);
        }

        if ($value === $node->value) {
            $node = $this->removeNodeAndReorderTree($node);
        }

        return $node;
    }

    /**
     * @param BinaryNode|null $node
     *
     * @return BinaryNode|null
     */
    private function removeNodeAndReorderTree(?BinaryNode $node): ?BinaryNode
    {
        if ($node->left === null && $node->right === null) {
            $node = null;
        } elseif ($node->left === null) {
            $node = $node->right;
        } elseif ($node->right === null) {
            $node = $node->left;
        } else {
            if ($node->right->left === null) {
                $node->right->left = $node->left;
                $node = $node->right;
            } else {
                $node->value = $node->right->left->value;
                $this->removeNodeAndReorderTree($node->right->left);
            }
        }

        return $node;
    }

    /**
     * @param BinaryNode|null $node
     * @param int $value
     *
     * @return BinaryNode|null
     */
    private function find(?BinaryNode $node, int $value): ?BinaryNode
    {
        if ($node === null) {
            return null;
        }
        if ($node->value > $value) {
            return $this->find($node->left, $value);
        }
        if ($node->value < $value) {
            return $this->find($node->right, $value);
        }

        return $node;
    }

    /**
     * @return int
     */
    public function getMaxDepth(): int
    {
        return $this->getDepth($this->root);
    }

    /**
     * @param BinaryNode|null $node
     *
     * @return int
     */
    private function getDepth(?BinaryNode $node): int
    {
        if ($node === null || ($node->left === null && $node->right === null)) {
            $max = 0;
        } else {
            $max = max($this->getDepth($node->left), $this->getDepth($node->right)) + 1;
        }

        return $max;
    }

    /**
     * @param string $type
     */
    public function traversal(string $type)
    {
        match ($type) {
            'pre-order' => $this->preOrderTraversal(),
            'in-order' => $this->inOrderTraversal(),
            'post-order' => $this->postOrderTraversal(),
            'bfs' => $this->bfs(),
            default => null,
        };
    }

    /**
     * In order traversal
     */
    private function inOrderTraversal()
    {
        $this->recursionInOrderTraversal($this->root);
    }

    /**
     * @param BinaryNode|null $node
     * @param int $count
     */
    private function recursionInOrderTraversal(?BinaryNode $node, int $count = 0)
    {
        if ($node === null) {
            return;
        }
        $this->recursionInOrderTraversal($node->left, $count + 1);
        echo str_repeat('---', $count) . $node->value . '<br>';
        $this->recursionInOrderTraversal($node->right, $count + 1);
    }

    /**
     * Post order traversal
     */
    private function postOrderTraversal()
    {
        $this->recursionPostOrderTraversal($this->root);
    }

    /**
     * @param BinaryNode|null $node
     * @param int $count
     */
    private function recursionPostOrderTraversal(?BinaryNode $node, int $count = 0)
    {
        if ($node === null) {
            return;
        }
        $this->recursionPostOrderTraversal($node->left, $count + 1);
        $this->recursionPostOrderTraversal($node->right, $count + 1);
        echo str_repeat('---', $count) . $node->value . '<br>';
    }

    /**
     * Pre order traversal
     */
    private function preOrderTraversal()
    {
        $this->recursionPreOrderTraversal($this->root);
    }

    /**
     * @param BinaryNode|null $node
     * @param int $count
     */
    private function recursionPreOrderTraversal(?BinaryNode $node, int $count = 0)
    {
        if ($node === null) {
            return;
        }
        echo str_repeat('---', $count) . $node->value . '<br>';
        $this->recursionPreOrderTraversal($node->left, $count + 1);
        $this->recursionPreOrderTraversal($node->right, $count + 1);
    }

    /**
     * Breadth-first search
     */
    private function bfs()
    {
        if ($this->root === null) {
            return 'Tree is empty';
        }

        $this->root->level = 1;
        $queue[] = $this->root;
        $output = '';
        $currentLevel = $this->root->level;

        while (count($queue) > 0) {
            $node = array_shift($queue);
            if ($node->level > $currentLevel) {
                $currentLevel++;
                $output .= '<br>';
            }

            $output .= $node->value . ' ';
            if ($node->left) {
                $node->left->level = $currentLevel + 1;
                array_push($queue, $node->left);
            }

            if ($node->right) {
                $node->right->level = $currentLevel + 1;
                array_push($queue, $node->right);
            }
        }

        echo $output;
    }

    /**
     * @return int
     */
    public function getCountLeafNodes(): int
    {
        return $this->getLeafCount($this->root);
    }

    /**
     * @param BinaryNode|null $node
     *
     * @return int
     */
    private function getLeafCount(?BinaryNode $node): int
    {
        if ($node === null) {
            return 0;
        }
        if ($node->left === null && $node->right === null) {
            return 1;
        }

        return $this->getLeafCount($node->left) + $this->getLeafCount($node->right);
    }

    /**
     * @return int
     */
    public function getCountAllNodes(): int
    {
        return $this->getCountNodes($this->root);
    }

    /**
     * @param BinaryNode|null $node
     *
     * @return int
     */
    private function getCountNodes(?BinaryNode $node): int
    {
        if ($node === null) {
            return 0;
        }

        return 1 + $this->getCountNodes($node->left) + $this->getCountNodes($node->right);
    }
}
