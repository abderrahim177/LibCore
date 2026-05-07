<?php
class Books {

    private $title;
    private $isbn;
    private $isavailable;

    public function __construct($title, $isbn, $isavailable) {

        $this->title = $title;
        $this->isbn = $isbn;
        $this->isavailable = $isavailable;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getIsbn() {
        return $this->isbn;
    }

    public function getIsavailable() {
        return $this->isavailable;
    }

    // setters correct
    public function setTitle($title) {
        $this->title = $title;
    }

    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function setIsavailable($isavailable) {
        $this->isavailable = $isavailable;
    }
}