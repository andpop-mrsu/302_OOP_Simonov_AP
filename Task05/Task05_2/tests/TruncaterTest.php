<?php

namespace App\Tests;

use App\Truncater;
use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    private string $name = 'Иванов Иван Иванович';

    public function testTruncateEmptyString(): void
    {
        $truncater = new Truncater();
        $this->assertEquals('', $truncater->truncate(''));
    }

    public function testTruncateWithDefaultConfig(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->name);
        $this->assertEquals($this->name, $result); // Длина ФИО < 50
    }

    public function testTruncateWithLength10(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->name, ['length' => 10]);
        $this->assertEquals('Иванов Ива...', $result);
    }

    public function testTruncateWithLength50(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->name, ['length' => 50]);
        $this->assertEquals($this->name, $result);
    }

    public function testTruncateWithNegativeLength(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->name, ['length' => -10]);
        $this->assertEquals('...', $result); // length = 0
    }

    public function testTruncateWithCustomSeparator(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->name, ['length' => 10, 'separator' => '*']);
        $this->assertEquals('Иванов Ива*', $result);
    }

    public function testTruncateWithOnlySeparator(): void
    {
        $truncater = new Truncater();
        $result = $truncater->truncate($this->name, ['separator' => '*']);
        $this->assertEquals($this->name, $result); // Длина ФИО < 50
    }

    public function testTruncateWithCustomConfig(): void
    {
        $truncater = new Truncater(['length' => 10]);
        $result = $truncater->truncate($this->name);
        $this->assertEquals('Иванов Ива...', $result);
    }
}