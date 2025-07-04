<?php
function db_connect() {
    static $pdo = null;
    if ($pdo === null) {
        $host = "c0tme.h.filess.io";
        $dbname = "COSC4806001JS2_figurewhom";
        $username = "COSC4806001JS2_figurewhom";
        $password = "3d3609d66a573a2d6fbfc82643ef3b46b035d711";
        $port = "61000";
        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";

        try {
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed.");
        }
    }
    return $pdo;
}
