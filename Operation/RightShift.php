<?php

namespace Operation;

use Operation\Concern\Operation;
use Values\Buffer;
use Values\InputContents;

class RightShift implements Operation
{
    /**
     * @param Buffer $buffer
     * @param InputContents $inputContents
     */
    public function evaluation(
        Buffer $buffer,
        InputContents $inputContents
    ): void {
        $buffer->next();
    }
}
