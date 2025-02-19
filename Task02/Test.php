<?php

function runTest()
{
    // String representation test
    $v1 = new Vector(1, 2, 3);
    $expected = "(1; 2; 3)";
    $actual = (string)$v1;
    echo "Ожидается: $expected" . PHP_EOL;
    echo "Получено: $actual" . PHP_EOL;
    if ($actual == $expected) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    // Adding test
    $v2 = new Vector(1, 4, -2);
    $v3 = $v1->add($v2);
    $expected = "(2; 6; 1)";
    $actual = (string)$v3;
    echo "Ожидается: $expected" . PHP_EOL;
    echo "Получено: $actual" . PHP_EOL;
    if ($actual == $expected) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    // Subtraction test
    $v4 = $v1->sub($v2);
    $expected = "(0; -2; 5)";
    $actual = (string)$v4;
    echo "Ожидается: $expected" . PHP_EOL;
    echo "Получено: $actual" . PHP_EOL;
    if ($actual == $expected) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    // Multiplication by number test
    $v5 = $v1->product(2);
    $expected = "(2; 4; 6)";
    $actual = (string)$v5;
    echo "Ожидается: $expected" . PHP_EOL;
    echo "Получено: $actual" . PHP_EOL;
    if ($actual == $expected) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    // Scalar product test
    $scalar = $v1->scalarProduct($v2);
    $expected = 3;
    $actual = $scalar;
    echo "Ожидается: $expected" . PHP_EOL;
    echo "Получено: $actual" . PHP_EOL;
    if ($actual == $expected) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }

    // Vector product test
    $v6 = $v1->vectorProduct($v2);
    $expected = "(-16; 5; 2)";
    $actual = (string)$v6;
    echo "Ожидается: $expected" . PHP_EOL;
    echo "Получено: $actual" . PHP_EOL;
    if ($actual == $expected) {
        echo "Тест пройден" . PHP_EOL;
    } else {
        echo "Тест НЕ ПРОЙДЕН" . PHP_EOL;
    }
}