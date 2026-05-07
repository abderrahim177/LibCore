<?php

require 'config/database.php';
require 'src/Services/Library.php';

$library = new Library($pdo);

while (true) {

    echo "\n===== ADMIN DASHBOARD =====\n";
    echo "1 - Ajouter un livre\n";
    echo "2 - Ajouter un membre\n";
    echo "3 - Liste des livres\n";
    echo "4 - Mettre livre en réparation\n";
    echo "5 - Supprimer un livre\n";
    echo "0 - Quitter\n";

    
}