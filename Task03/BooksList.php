<?php

namespace Task03;

class BooksList
{
    private $books = [];

    public function add(Book $book)
    {
        $this->books[] = $book;
        return $this;
    }

    public function count()
    {
        return count($this->books);
    }

    public function get($n)
    {
        return $this->books[$n] ?? null;
    }

    public function store($fileName)
    {
        file_put_contents($fileName, serialize($this->books));
    }

    public function load($fileName)
    {
        if (file_exists($fileName)) {
            $this->books = unserialize(file_get_contents($fileName));
        }
    }
}