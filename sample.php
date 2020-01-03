<?php

require_once __DIR__ . '/vendor/autoload.php';

use Brainfxxk\Brainfxxk;
use Converter\InputConverter;
use Operation\Manager\OperationManager;
use Values\Buffer;
use Values\InputContents;
use Values\Pointer;
use Values\Sequence;

//
// simple case
// output) Hello World!
//
$str = <<< __EOL__
+++++++++[>++++++++>+++++++++++>+++>+<<<<-]>.>++.+++++++..+++.
>+++++.<<+++++++++++++++.>.+++.------.--------.>+.>+.
__EOL__;

$brainfxxk = new Brainfxxk(
    new Buffer(
        new Pointer(),
        new Sequence()
    ),
    new OperationManager()
);

$brainfxxk->read(
    new InputContents($str)
);

//
// Change operation case
// output) Hello World!
//
$str = <<< __EOL__
Hello Hello Hello Hello Hello Hello Hello Hello Hello World !! Hello Hello Hello Hello Hello Hello Hello Hello !! Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello !! Hello Hello Hello !! Hello Yeah Yeah Yeah Yeah and ]!! . !! Hello Hello . Hello Hello Hello Hello Hello Hello Hello . . Hello Hello Hello . !! 
Hello Hello Hello Hello Hello . Yeah Yeah Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello Hello . !! . Hello Hello Hello . and and and and and and . and and and and and and and and . !! Hello . !! Hello . 
__EOL__;

$converter = new InputConverter();
$converter->addConvertCondition('Hello ', '+');
$converter->addConvertCondition('and ', '-');
$converter->addConvertCondition('World ', '[');
$converter->addConvertCondition('Hey ', ']');
$converter->addConvertCondition('!! ', '>');
$converter->addConvertCondition('Yeah ', '<');
$converter->addConvertCondition('. ', '.');
$converter->addConvertCondition(', ', ',');

$brainfxxk = new Brainfxxk(
    new Buffer(
        new Pointer(),
        new Sequence()
    ),
    new OperationManager()
);
$brainfxxk->read(
    new InputContents(
        $converter->convert($str)
    )
);
