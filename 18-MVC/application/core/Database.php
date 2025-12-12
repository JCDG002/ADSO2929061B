<?php

class Database {
    protected static $conn = null;

    public static function connect() {
        if (self::$conn === null) {
            try {
                $config = require __DIR__ . '/../config/database.php';
                
                $dsn = sprintf(
                    "mysql:host=%s;dbname=%s;charset=%s",
                    $config['host'],
                    $config['database'],
                    $config['charset']
                );

                self::$conn = new PDO($dsn, $config['username'], $config['password']);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Connection error: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}

