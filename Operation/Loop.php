<?php

namespace Operation;

use Operation\Concern\Operation;
use Values\Buffer;
use Values\InputContents;
use Values\LoopAnchor;

class Loop implements Operation
{
    /**
     * @param Buffer $buffer
     * @param InputContents $inputContents
     */
    public function evaluation(
        Buffer $buffer,
        InputContents $inputContents
    ): void {
        $seq = $buffer->getSequence();
        $anchor = $buffer->getLoopAnchor();

        if (is_null($anchor)) {
            $anchor = (new LoopAnchor())->set(
                $buffer->getSequence()->get()
            );
            $buffer->setLoopAnchor($anchor);
        } else {
            $anchor = $anchor->getLastAnchor();
            if ($seq->get() !== $anchor->get()) {
                $anchor->setInner(
                    (new LoopAnchor())->set(
                        $buffer->getSequence()->get()
                    )
                );
            }
        }

        if ($buffer->get() === 0) {
            $loopQueue = 1;
            while (true) {
                $seq->increment();
                if ($inputContents->fetch($seq) === '[') {
                    $loopQueue++;
                }
                if ($inputContents->fetch($seq) === ']') {
                    $loopQueue--;
                    if ($loopQueue === 0) {
                        break;
                    }
                }
            }
            $buffer->clearLoopAnchor();
        }
    }
}
