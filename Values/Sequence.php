<?php

namespace Values;

class Sequence
{
    /**
     * @var int
     */
    private int $value = 0;

    /**
     * @return int
     */
    public function get(): int
    {
        return $this->value;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function set(int $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function increment(): int
    {
        return ++$this->value;
    }

    /**
     * @return int
     */
    public function decrement(): int
    {
        return --$this->value;
    }
}
