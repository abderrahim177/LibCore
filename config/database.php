<?php

class Database {

    private static ?PDO $conn = null;

    public static function connect(): PDO {

        if (self::$conn === null) {

            $host = "localhost";
            $dbname = "libcore";
            $username = "root";
            $password = "";

            self::$conn = new PDO(
                "mysql:host=$host;dbname=$dbname",
                $username,
                $password
            );

            self::$conn->setAttribute(
                PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION
            );
        }

        return self::$conn;
    }
}