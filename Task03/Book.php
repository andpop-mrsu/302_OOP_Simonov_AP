<?php

namespace Task03;

class Book
{
    private static $nextId = 1;

    private $id;
    private $title;
    private $authors = [];
    private $publisher;
    private $year;

    public function __construct($title, $authors, $publisher, $year)
    {
        $this->id = self::$nextId++;
        $this->title = $title;
        $this->authors = $authors;
        $this->publisher = $publisher;
        $this->year = $year;
    }

    public static function resetId()
    {
        self::$nextId = 1;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAuthors()
    {
        return $this->authors;
    }

    public function getPublisher()
    {
        return $this->publisher;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setAuthors($authors)
    {
        $this->authors = $authors;
        return $this;
    }

    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
        return $this;
    }

    public function setYear($year)
    {
        $this->year = $year;
        return $this;
    }

    public function __toString()
    {
        $output = "Id: " . $this->id . PHP_EOL;
        $output .= "Название: " . $this->title . PHP_EOL;
        foreach ($this->authors as $index => $author) {
            $output .= "Автор" . ($index + 1) . ": " . $author . PHP_EOL;
        }
        $output .= "Издательство: " . $this->publisher . PHP_EOL;
        $output .= "Год: " . $this->year . PHP_EOL;
        return $output;
    }
}