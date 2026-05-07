<?php

require_once __DIR__ . '/../Entities/Book.php';

class Library
{

    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function addBook()
    {
        $isbn = readline("ISBN: ");
        $title = readline("Titre: ");
        $author = readline("Auteur: ");
        $idLibrary = readline("ID Library: ");
        $sql = "INSERT INTO books (isbn, title, author, id_library)
            VALUES (:isbn, :title, :author, :id_library)";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':isbn' => $isbn,
            ':title' => $title,
            ':author' => $author,
            ':id_library' => $idLibrary
        ]);

        echo "Livre ajouté";
    }
}
