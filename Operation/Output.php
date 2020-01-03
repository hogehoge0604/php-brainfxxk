<?php

namespace Operation;

use Operation\Concern\Operation;
use Values\Buffer;
use Values\InputContents;

class Output implements Operation
{
    /**
     * @param Buffer $buffer
     * @param InputContents $inputContents
     */
    public function evaluation(
        Buffer $buffer,
        InputContents $inputContents
    ): void {
        echo chr(
            $buffer->get()
        );
    }
}
