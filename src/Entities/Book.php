<?php

class Book {

    private $id;
    private $isbn;
    private $title;
    private $author;
    private $isAvailable;
    private $status;
    private $idLibrary;

    public function __construct($isbn, $title, $author, $idLibrary) {

        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->idLibrary = $idLibrary;

        $this->isAvailable = true;
        $this->status = "disponible";
    }



}