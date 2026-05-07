<?php
<?php

require_once 'src/Config/Database.php';
require_once 'src/Services/Library.php';

$db = Database::connect();
$library = new Library($db);

while (true) {

    echo "\n=====================\n";
    echo " LIBCORE - MENU MEMBER\n";
    echo "=====================\n";

    echo "1. Search Book\n";
    echo "2. Borrow Book\n";
    echo "3. Return Book\n";
    echo "4. Exit\n";

    $choice = readline("Choose option: ");

    if ($choice == 1) {

        $q = readline("Enter title or author: ");

        $books = $library->searchBook($q);

        echo "\nRESULTS:\n";

        foreach ($books as $book) {

            echo "- " . $book['title'] . " | " . $book['author'] . "\n";
        }
    }

    elseif ($choice == 2) {

        $memberId = readline("Member ID: ");
        $isbn = readline("ISBN: ");

        $result = $library->borrowBook($memberId, $isbn);

        echo $result ? "Borrow successful\n" : "Borrow failed\n";
    }

    elseif ($choice == 3) {

        $isbn = readline("ISBN: ");

        $library->returnBook($isbn);

        echo "Book returned\n";
    }

    elseif ($choice == 4) {

        echo "Bye 👋\n";
        break;
    }

    else {

        echo "Invalid option\n";
    }
}