<?php
// Shared database connection. Usage: $pdo = db();

function db(): PDO
{
    static $pdo = null;          // remembers the connection, so it only connects once
    if ($pdo !== null) {
        return $pdo;
    }

    $cfg = require __DIR__ . '/settings.php';

    try {
        $pdo = new PDO(
            "mysql:host={$cfg['host']};dbname={$cfg['name']};charset=utf8mb4",
            $cfg['user'],
            $cfg['pass'],
            [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]
        );
    } catch (PDOException $e) {
        // Log the real reason privately, show visitors a generic message.
        error_log('DB connection failed: ' . $e->getMessage());
        die('Database connection failed.');
    }

    return $pdo;
}