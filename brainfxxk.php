<?php

$str =<<< __EOL__
++++++++++[>+++++++>++++++++++>+++<<<-]>++.>+.+++++++
..+++.>++.<<+++++++++++++++.>.+++.------.--------.>+.
__EOL__;

$str = str_replace(["\r", "\n"], '', $str);
$seq = 0;
$pos = 0;
$arr = [];
$list = str_split($str);
while(isset($list[$seq])) {
    if(empty($arr[$pos])) {
        $arr[$pos] = 0;
    }
    
    $char = $list[$seq];
    if($char === '+') {
        $arr[$pos]++;
    }
    if($char === '-') {
        $arr[$pos]--;
    }
    if($char === '.') {
        echo chr($arr[$pos]);
    }
    if($char === ',') {
        $arr[$pos] = fgets(STDIN);
    }
    if($char === '>') {
        $pos++;
    }
    if($char === '<') {
        $pos--;
    }
    if($char === '[') {
        if($arr[$pos] === 0) {
            $seq = $while;
            $while = 0;
        }
        else {
            $while = $seq;
        }
    }
    if($char === ']') {
        $tmp = $while;
        $while = $seq;
        $seq = $tmp - 1;
    }
    $seq++;
}
