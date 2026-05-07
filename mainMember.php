<?php

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/src/Services/Library.php';

$db = Database::connect();
$library = new Library($db);

while (true) {

    echo "\n=====================\n";
    echo " LIBCORE - MENU MEMBER\n";
    echo "=====================\n";

    echo "1. Search Book\n";
    echo "2. Exit\n";
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

    else {

        echo "Invalid option\n";
    }
}