<?php

namespace Values;

class LoopAnchor
{
    /**
     * @var int
     */
    private int $begin = 0;

    /**
     * @var LoopAnchor|null
     */
    private ?LoopAnchor $inner = null;

    /**
     * @param int $begin
     * @return $this
     */
    public function set(int $begin): self
    {
        $this->begin = $begin;
        return $this;
    }

    /**
     * @return int
     */
    public function get(): int
    {
        return $this->begin;
    }

    /**
     * @return bool
     */
    public function hasInner(): bool
    {
        return !is_null($this->inner);
    }

    /**
     * @return $this
     */
    public function getInner(): self
    {
        return $this->inner ?? new self();
    }

    /**
     * @param LoopAnchor|null $self
     * @return $this
     */
    public function setInner(?self $self): self
    {
        $this->inner = $self;
        return $this;
    }

    /**
     * @return LoopAnchor
     */
    public function getLastAnchor(): self
    {
        $anchor = $this;
        while ($anchor->hasInner()) {
            $anchor = $anchor->getInner();
        }
        return $anchor;
    }
}
