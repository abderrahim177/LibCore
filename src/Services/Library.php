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

    $sql = "SELECT * FROM books WHERE isbn = :isbn";

    $stmt = $this->db->prepare($sql);

    $stmt->execute(['isbn' => $isbn]);

    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    if (trim(strtolower($book['status'])) !== 'disponible') {
        return false;
    }

    $update = "UPDATE books 
               SET status = 'emprunté'
               WHERE isbn = :isbn";

    $stmt2 = $this->db->prepare($update);

    $stmt2->execute(['isbn' => $isbn]);

    $insert = "INSERT INTO emprunts (id_member, id_book, borrow_date)
               VALUES (:member_id, :isbn, NOW())";

    $stmt3 = $this->db->prepare($insert);

    $stmt3->execute([
        'id_member' => $memberId,
        'isbn' => $isbn
    ]);

    return true;
}
}