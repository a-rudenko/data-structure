<?php

class ListNode
{
    /**
     * @param string|null $value
     * @param ListNode|null $next
     */
    public function __construct(
        public ?string $value,
        public ?self   $next = null
    )
    {
    }
}
