LibCore - Système de Gestion de Bibliothèque
 Contexte du Projet

LibCore est une application backend développée en PHP orienté objet permettant la gestion d’une bibliothèque associative.

Le projet a été réalisé dans le cadre du brief de formation Développeur Web & Web Mobile afin d’appliquer :

La Programmation Orientée Objet (POO)
La gestion d’une base de données MySQL avec PDO
La modélisation UML
Les principes d’architecture logicielle

L’objectif principal est de remplacer la gestion manuelle des ouvrages via Excel par un système intelligent et sécurisé.

-- Fonctionnalités
-- Dashboard Bibliothécaire
 
-- Gestion du catalogue
Ajouter un livre
Supprimer un livre
Mettre un livre en réparation
Consulter la liste des livres
-- Gestion des membres
Créer un membre
Définir le type d’emprunteur

-- Dashboard Membre
 --Gestion des emprunts
Rechercher un livre
Emprunter un livre
Retourner un livre
Afficher les livres empruntés
-- Concepts POO utilisés
Classes & Objets
Encapsulation
Héritage
Classes abstraites
Composition
Services métiers
Getters & Setters
-- Architecture du Projet
LibCore/
│
├── config/
│   └── database.php
│
├── src/
│   ├── Entities/
│   │   ├── Book.php
│   │   ├── User.php
│   │   ├── Member.php
│   │   
│   │   
│   │   └── Librarian.php
│   │
│   └── Services/
│       └── Library.php
│
├── docs/
│   ├── use-case.png
│   ├── class-diagram.png
│   └── er-diagram.png
│
├── mainAdmin.php
├── mainMember.php
├── README.md
└── .gitignore
-- Base de Données
Tables utilisées
libraries
users
members
librarians
books
emprunts

 --Relations
Une bibliothèque possède plusieurs livres
Un membre peut emprunter plusieurs livres
Un livre peut avoir plusieurs emprunts
Member et Librarian héritent de User
-- Technologies Utilisées
PHP 8
MySQL
PDO
UML
Git & GitHub
-- UML

Le dossier docs contient :
Diagramme de cas d’utilisation
Diagramme de classes
Diagramme ERD

-- Réalisé par
MOHAMED BEN IZZA
ABD ELRAHIM AKERCHACH

--- Conclusion

LibCore nous a permis de mettre en pratique les concepts fondamentaux du développement backend orienté objet avec PHP et MySQL tout en respectant une architecture claire et maintenable.
