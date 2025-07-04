<?php

function db_connect() {
    static $pdo;

    if ($pdo) return $pdo;

    $host = 'mysql-b1.fs.cvut.cz';
    $port = 61000;
    $dbname = 'COSC4806001_Assignment2_Users';
    $user = 'COSC4806001JS2_figurewhom';
    $pass = '3d3609d66a573a2d6fbfc82643ef3b46b035d711';

    try {
        $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}
