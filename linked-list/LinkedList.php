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
     * @param string $value
     */
    public function addNode(string $value): void
    {
        if ($this->head) {
            $node = new ListNode($value, $this->head);
            $this->head = $node;
        } else {
            $this->head = new ListNode($value, null);
        }
    }

    /**
     * @param string $value
     */
    public function removeNode(string $value): void
    {
        if ($this->isExists($value)) {
            $this->remove($this->head, $value);
        } else {
            echo "Node for removing with this value - $value not found<br>";
        }
    }

    /**
     * @param ListNode|null $node
     * @param string $value
     */
    private function remove(?ListNode $node, string $value): void
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
        if ($head?->next === null) return $head;
        $next = $this->reverseList($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $next;
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function findNode(string $value): string
    {
        if ($this->isExists($value)) {
            return "Node with this value - $value found";
        }

        return "Node with this value - $value not found";
    }

    /**
     * @param string $value
     *
     * @return bool
     */
    private function isExists(string $value): bool
    {
        for ($node = $this->head; $node; $node = $node->next) {
            if ($node->value === $value) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return string|null
     */
    public function getHeadValue(): ?string
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

    /**
     * @return int
     */
    public function getCountNodes(): int
    {
        return $this->getCount($this->head);
    }

    /**
     * @param ListNode|null $node
     *
     * @return int
     */
    private function getCount(?ListNode $node): int
    {
        $count = 0;
        if ($node === null) return $count;

        while ($node) {
            $node = $node->next;
            $count++;
        }

        return $count;
    }
}
