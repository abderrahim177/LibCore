<?php

require_once '../config/database.php';

class Library {

    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function searchBook($keyword){

        $sql = "SELECT * FROM books 
                WHERE title LIKE :kw
                OR isbn LIKE :kw";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'kw' => "%$keyword%"
        ]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}