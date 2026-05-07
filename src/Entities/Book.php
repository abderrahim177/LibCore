<?php

class Books {
    private $title;
    private $isbn;
    private $isavailable;

    public function __construct($title , $isbn , $isavailable)
    {
        $this->title = $title;
        $this->isbn= $isbn;
        $this->isavailable = $isavailable;
    }
    public function getTitle(){
        return $this->title;
    }
     
    public function getIsbn(){
        return $this->isbn;
    }
    public function getIsavailable(){
        return $this->isavailable;
    }

    public function settitle(){
        return $this->title;
    }
    public function setIsbn(){
        return $this->isbn;
    }
    public function setIsavailable(){
        return $this->isavailable;
    }
}