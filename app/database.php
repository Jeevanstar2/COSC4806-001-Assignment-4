<?php
function db_connect() 
{
    static $pdo;
    if ($pdo) 
    {
        return $pdo;
    }
    try 
    {
        $host = 'c0tme.h.filess.io';
        $port = 61000;
        $dbname = 'COSC4806001JS2_figurewhom';
        $user = 'COSC4806001JS2_figurewhom';
        $pass = getenv('password');
        $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) 
    {
        die("Database connection failed.");
    }
    return $pdo;
}