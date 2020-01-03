<?php

namespace Values;

class InputContents
{
    /**
     * @var string
     */
    private string $str;

    /**
     * @var array
     */
    private array $contents;

    /**
     * Input constructor.
     * @param string $str
     */
    public function __construct(string $str)
    {
        $this->str = (string)str_replace(["\r", "\n"], '', $str);
        $this->contents = str_split($this->str);
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return $this->str;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->contents;
    }

    /**
     * @param Sequence $seq
     * @return bool
     */
    public function has(Sequence $seq): bool
    {
        return isset($this->contents[$seq->get()]);
    }

    /**
     * @param Sequence $seq
     * @return string
     */
    public function fetch(Sequence $seq): string
    {
        return $this->contents[$seq->get()];
    }
}
