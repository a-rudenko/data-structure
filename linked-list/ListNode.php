<?php

class ListNode
{
    /**
     * @param int|null $value
     * @param ListNode|null $next
     */
    public function __construct(
        public ?int  $value,
        public ?self $next = null
    )
    {
    }
}
