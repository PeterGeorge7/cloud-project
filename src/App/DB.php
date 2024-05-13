<?php

namespace App;

class DB
{
    public static function connect()
    {
        // Database configuration
        $host = 'db';
        $dbName = 'cloud_project';
        $username = 'root';
        $password = 'root';

        try {
            // Create a new PDO instance
            $db = new \PDO("mysql:host=$host;dbname=$dbName", $username, $password);

            // Set PDO error mode to exception
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            // Return the database connection
            return $db;
        } catch (\PDOException $e) {
            // Handle database connection errors
            echo "Database connection failed: " . $e->getMessage();
            exit;
        }
    }
}
