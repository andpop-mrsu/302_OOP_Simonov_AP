<?php

namespace App\Tests;

use App\Book;
use App\BooksList;
use PHPUnit\Framework\TestCase;

class BooksListTest extends TestCase
{
    public function testIterator(): void
    {
        $booksList = new BooksList();

        // Передаем 3 аргумента в конструктор Book
        $book1 = new Book(1, "Book One", "Author One");
        $book2 = new Book(2, "Book Two", "Author Two");
        $booksList->addBook($book1);
        $booksList->addBook($book2);

        $expected = [
            1 => $book1,
            2 => $book2,
        ];

        $result = [];
        foreach ($booksList as $id => $book) {
            $result[$id] = $book;
        }

        $this->assertEquals($expected, $result);
    }

    public function testEmptyIterator(): void
    {
        $booksList = new BooksList();
        $result = iterator_to_array($booksList);
        $this->assertEmpty($result);
    }

    public function testIteratorMethods(): void
    {
        $booksList = new BooksList();
        $book = new Book(1, "Test Book", "Test Author");
        $booksList->addBook($book);

        $booksList->rewind();
        $this->assertTrue($booksList->valid());
        $this->assertEquals(1, $booksList->key());
        $this->assertSame($book, $booksList->current());

        $booksList->next();
        $this->assertFalse($booksList->valid());
    }
}