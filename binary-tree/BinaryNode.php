<?php

class BinaryNode
{
    /**
     * @param int|null $value
     * @param BinaryNode|null $left
     * @param BinaryNode|null $right
     */
    public function __construct(
        public ?int  $value,
        public ?self $left = null,
        public ?self $right = null
    )
    {
    }
}
