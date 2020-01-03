<?php

namespace Operation\Concern;

use Values\Buffer;
use Values\InputContents;

Interface Operation
{
    /**
     * @param Buffer $buffer
     * @param InputContents $inputContents
     */
    public function evaluation(
        Buffer $buffer,
        InputContents $inputContents
    ): void;
}
