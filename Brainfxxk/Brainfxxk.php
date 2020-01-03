<?php

namespace Brainfxxk;

use Exceptions\OperationNotFoundException;
use Operation\Manager\OperationManager;
use Values\Buffer;
use Values\InputContents;

class Brainfxxk
{
    /**
     * @var Buffer
     */
    private Buffer $buffer;

    /**
     * @var OperationManager
     */
    private OperationManager $operationManager;

    /**
     * Brainfxxk constructor.
     * @param Buffer $buffer
     * @param OperationManager $operationManager
     */
    public function __construct(
        Buffer $buffer,
        OperationManager $operationManager
    ) {
        $this->buffer = $buffer;
        $this->operationManager = $operationManager;
    }

    /**
     * @param InputContents $inputContents
     * @throws OperationNotFoundException
     */
    public function read(InputContents $inputContents)
    {
        while ($inputContents->has($this->buffer->getSequence())) {
            $char = $inputContents->fetch($this->buffer->getSequence());
            $this->operationManager->get($char)->evaluation(
                $this->buffer,
                $inputContents
            );
            $this->buffer->getSequence()->increment();
        }
    }
}
