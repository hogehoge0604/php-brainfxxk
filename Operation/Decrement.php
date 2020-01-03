<?php

namespace Operation;

use Operation\Concern\Operation;
use Values\Buffer;
use Values\InputContents;

class Decrement implements Operation
{
    /**
     * @param Buffer $buffer
     * @param InputContents $inputContents
     */
    public function evaluation(
        Buffer $buffer,
        InputContents $inputContents
    ): void {
        $buffer->set(
            $buffer->get() - 1
        );
    }
}
