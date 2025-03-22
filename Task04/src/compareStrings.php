<?php

namespace App;

function compareStrings(string $str1, string $str2): bool
{
    $processString = function ($str) {
        $stack = new Stack();
        for ($i = 0; $i < strlen($str); $i++) {
            $char = $str[$i];
            if ($char === '#') {
                $stack->pop();
            } else {
                $stack->push($char);
            }
        }
        return $stack;
    };

    $stack1 = $processString($str1);
    $stack2 = $processString($str2);

    return $stack1->__toString() === $stack2->__toString();
}