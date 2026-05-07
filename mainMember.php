<?php

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/src/Services/Library.php';

$db = $pdo;
$library = new Library($db);

while (true) {

    echo "\n=====================\n";
    echo " LIBCORE - MENU MEMBER\n";
    echo "=====================\n";

    echo "1. Search Book\n";
    echo "2. Exit\n";
    echo "3. returner\n";
    echo "4. My Borrowed Books\n";
    echo "5. Exit\n";
    $choice = readline("Choose option: ");
    if ($choice == 1) {
        $q = readline("Enter title or ISBN: ");
        $book = $library->searchBook($q);
        echo "\nRESULT:\n";
        if ($book) {
            echo "- " . $book['title'] . " | " . $book['isbn'] . "\n";
        }
        else {
            echo " No book found\n";
        }
    }
    elseif ($choice == 2) {

    $memberId = readline("Member ID: ");
    $isbn = readline("ISBN: ");

    $result = $library->borrowBook($memberId, $isbn);

    if ($result) {
        echo "✔ Book borrowed successfully\n";
    }
    else {
        echo "❌ Book not available\n";
    }
}

     elseif ($choice == 3) {

        $isbn = readline("Enter ISBN: ");

        $result = $library->returnBook($isbn);

        if ($result) {

            echo "✔ Book returned successfully\n";
        }
        else {

            echo " Return failed\n";
        }
    }

    // EXIT
    elseif ($choice == 4) {

    $memberId = readline("Enter Member ID: ");

    $books = $library->getBorrowedBooks($memberId);

    if ($books) {

        echo "\n=== MY BOOKS ===\n";

        foreach ($books as $book) {

            echo "Title: " . $book['title'] . "\n";
            echo "ISBN: " . $book['isbn'] . "\n";
            echo "Borrow Date: " . $book['borrow_date'] . "\n";
            echo "----------------------\n";
        }
    }
        else {

            echo "❌ No borrowed books\n";
        }
    }
    else{
        echo "not fount";
    }

}