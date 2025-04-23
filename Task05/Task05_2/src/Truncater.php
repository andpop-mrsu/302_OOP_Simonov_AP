<?php

namespace App;

class Truncater
{
    public static array $defaultOptions = [
        'length' => 50,
        'separator' => '...',
    ];

    private array $options;

    public function __construct(array $options = [])
    {
        $this->options = array_merge(self::$defaultOptions, $options);
    }

    public function truncate(string $text, array $options = []): string
    {
        $currentOptions = array_merge($this->options, $options);

        $length = max(0, $currentOptions['length']);
        $separator = $currentOptions['separator'];

        if (mb_strlen($text) <= $length) {
            return $text;
        }

        return mb_substr($text, 0, $length) . $separator;
    }
}