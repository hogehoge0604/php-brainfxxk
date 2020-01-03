<?php

namespace Converter;

class InputConverter
{
    /**
     * @var array
     */
    private array $beforeStringList = [];

    /**
     * @var array
     */
    private array $afterStringList = [];

    /**
     * @param string $beforeString
     * @param string $afterString
     * @return $this
     */
    public function addConvertCondition(
        string $beforeString,
        string $afterString
    ): self {
        $this->beforeStringList[] = $beforeString;
        $this->afterStringList[] = $afterString;

        return $this;
    }

    /**
     * @param string $string
     * @return string
     */
    public function convert(
        string $string
    ): string {
        return (string)str_replace(
            $this->beforeStringList,
            $this->afterStringList,
            $string
        );
    }
}