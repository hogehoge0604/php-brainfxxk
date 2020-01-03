<?php

namespace Operation\Manager;

use Exceptions\OperationNotFoundException;
use Operation\Concern\Operation;
use Operation\Decrement;
use Operation\EndLoop;
use Operation\Increment;
use Operation\Input;
use Operation\LeftShift;
use Operation\Loop;
use Operation\Output;
use Operation\RightShift;

class OperationManager
{
    /**
     * @var array
     */
    private array $operation;

    /**
     * OperationManager constructor.
     */
    public function __construct()
    {
        $this->set('+', new Increment());
        $this->set('-', new Decrement());
        $this->set('>', new RightShift());
        $this->set('<', new LeftShift());
        $this->set('[', new Loop());
        $this->set(']', new EndLoop());
        $this->set('.', new Output());
        $this->set(',', new Input());
    }

    /**
     * @param string $key
     * @param Operation $operation
     * @return $this
     */
    public function set(
        string $key,
        Operation $operation
    ): self {
        $this->operation[$key] = $operation;
        return $this;
    }

    /**
     * @param string $key
     * @return Operation
     * @throws OperationNotFoundException
     */
    public function get(string $key): Operation
    {
        if (empty($this->operation[$key])) {
            throw new OperationNotFoundException(
                sprintf('Operation not found: %s', $key)
            );
        }
        return $this->operation[$key];
    }
}
