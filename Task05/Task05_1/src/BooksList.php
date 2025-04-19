<?php

namespace App;

use Iterator;

class BooksList implements Iterator
{
    private array $books = [];
    private int $position = 0;

    public function addBook(Book $book): void
    {
        $this->books[] = $book;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): Book
    {
        return $this->books[$this->position];
    }

    public function key(): int
    {
        return $this->books[$this->position]->getId();
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->books[$this->position]);
    }
}