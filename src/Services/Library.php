<?php

class Library {

    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    // 🔎 Search Book (one result only)
    public function searchBook($keyword){

        $sql = "SELECT * FROM books 
                WHERE title LIKE :kw
                OR isbn LIKE :kw
                LIMIT 1";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([
            'kw' => "%$keyword%"
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 📚 US6: Borrow Book
public function borrowBook($memberId, $isbn){

    $isbn = trim($isbn);

    // 1. get book
    $sql = "SELECT * FROM books WHERE isbn = :isbn";
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['isbn' => $isbn]);

    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$book || $book['is_available'] != 1) {
        return false;
    }

    // 2. update book
    $update = "UPDATE books 
               SET is_available = 0,
                   status = 'emprunté'
               WHERE isbn = :isbn";

    $stmt2 = $this->db->prepare($update);
    $stmt2->execute(['isbn' => $isbn]);

    // 3. insert borrow
    $insert = "INSERT INTO emprunts (id_member, id_book, borrow_date)
               VALUES (:id_member, :id_book, NOW())";

    $stmt3 = $this->db->prepare($insert);

    $stmt3->execute([
        'id_member' => $memberId,
        'id_book' => $book['id']
    ]);

    return true;
}
}