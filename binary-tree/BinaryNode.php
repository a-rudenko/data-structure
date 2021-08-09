<?php

class BinaryNode
{
    /**
     * @param int|null $value
     * @param null $left
     * @param null $right
     */
    public function __construct(
        public ?int $value,
        public      $left = null,
        public      $right = null
    )
    {
    }
}
