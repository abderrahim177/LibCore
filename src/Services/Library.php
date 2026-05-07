<?php

require_once __DIR__ . '/../Entities/Book.php';

class Library
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

}
