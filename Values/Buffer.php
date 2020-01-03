<?php

namespace Values;

class Buffer
{
    /**
     * @var array
     */
    private array $buffer = [0];

    /**
     * @var Sequence
     */
    private Sequence $sequence;

    /**
     * @var Pointer
     */
    private Pointer $pointer;

    /**
     * @var LoopAnchor|null
     */
    private ?LoopAnchor $loopAnchor = null;

    /**
     * Buffer constructor.
     * @param Pointer $pointer
     * @param Sequence $sequence
     */
    public function __construct(
        Pointer $pointer,
        Sequence $sequence
    ) {
        $this->pointer = $pointer;
        $this->sequence = $sequence;
    }

    /**
     * @param int $value
     * @return $this
     */
    public function set(int $value): self
    {
        $this->buffer[$this->pointer->get()] = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function get(): int
    {
        return (int)$this->buffer[$this->pointer->get()];
    }

    /**
     * @return $this
     */
    public function next(): self
    {
        $pointer = $this->pointer->increment();
        if (!isset($this->buffer[$pointer])) {
            $this->buffer[$pointer] = 0;
        }
        return $this;
    }

    /**
     * @return $this
     */
    public function prev(): self
    {
        $pointer = $this->pointer->decrement();
        if (!isset($this->buffer[$pointer])) {
            $this->buffer[$pointer] = 0;
        }
        return $this;
    }

    /**
     * @return Sequence
     */
    public function getSequence(): Sequence
    {
        return $this->sequence;
    }

    /**
     * @param LoopAnchor $loopAnchor
     */
    public function setLoopAnchor(LoopAnchor $loopAnchor)
    {
        $this->loopAnchor = $loopAnchor;
    }

    /**
     * @return LoopAnchor|null
     */
    public function getLoopAnchor(): ?LoopAnchor
    {
        return $this->loopAnchor;
    }

    /**
     * @return $this
     */
    public function clearLoopAnchor(): self
    {
        if ($this->loopAnchor->hasInner()) {
            $targetAnchor = $anchor = $this->loopAnchor;
            while ($anchor->hasInner()) {
                $targetAnchor = $anchor;
                $anchor = $anchor->getInner();
            }
            $targetAnchor->setInner(null);
        } else {
            $this->loopAnchor = null;
        }
        return $this;
    }
}
