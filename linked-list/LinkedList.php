<?php

require_once 'ListNode.php';

class LinkedList
{
    /**
     * @param ListNode|null $head
     */
    public function __construct(private ?ListNode $head = null)
    {
    }

    /**
     * @param array $values
     */
    public function createLinkedList(array $values): void
    {
        foreach ($values as $value) {
            $this->addNode($value);
        }
    }

    /**
     * @param int $value
     */
    public function addNode(int $value): void
    {
        if ($this->head) {
            $node = new ListNode($value, $this->head);
            $this->head = $node;
        } else {
            $this->head = new ListNode($value, null);
        }
    }

    /**
     * @param int $value
     */
    public function removeNode(int $value): void
    {
        if ($this->isExists($value)) {
            $this->remove($this->head, $value);
        } else {
            echo "Node for removing with this value - $value not found<br>";
        }
    }

    /**
     * @param ListNode|null $node
     * @param int $value
     */
    private function remove(?ListNode $node, int $value): void
    {
        if ($node->next->value === $value) {
            $node->next = $node->next->next;
        } else {
            $this->remove($node->next, $value);
        }
    }

    /**
     * Reverse linked list
     */
    public function reverseLinkedList(): void
    {
        $this->head = $this->reverseList($this->head);
    }

    /**
     * @param ListNode|null $head
     *
     * @return ListNode|null
     */
    private function reverseList(?ListNode $head): ?ListNode
    {
        if ($head?->next === null) {
            return $head;
        }

        $next = $this->reverseList($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $next;
    }

    /**
     * @param int $value
     *
     * @return string
     */
    public function findNode(int $value): string
    {
        if ($this->isExists($value)) {
            return "Node with this value - $value found";
        }

        return "Node with this value - $value not found";
    }

    /**
     * @param int $value
     *
     * @return bool
     */
    private function isExists(int $value): bool
    {
        for ($node = $this->head; $node; $node = $node->next) {
            if ($node->value === $value) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return int|null
     */
    public function getHeadValue(): ?int
    {
        return $this->head?->value;
    }

    /**
     * @return string
     */
    public function printList(): string
    {
        $result = [];
        for ($node = $this->head; $node; $node = $node->next) {
            $result[] = $node->value;
        }

        return implode('==>', $result);
    }
}
