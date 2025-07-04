<?php
require_once __DIR__ . '/../database.php';
class User 
{
    private $db;
    public function __construct() 
    {
        $this->db = db_connect();
    }
    public function findByUsername(string $username) 
    {
        $stmt = $this->db->prepare("SELECT * FROM COSC4806001_Assignment2_Users WHERE Username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create(string $username, string $password) 
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare(
            "INSERT INTO COSC4806001_Assignment2_Users (Username, Password) VALUES (:username, :hash)"
        );
        return $stmt->execute(['username' => $username, 'hash' => $hash]);
    }
    public function recordLoginAttempt(string $username, string $status) 
    {
        $stmt = $this->db->prepare(
            "INSERT INTO login_log (username, status) VALUES (:username, :status)"
        );
        $stmt->execute(['username' => $username, 'status' => $status]);
    }
    public function getLastFailed(string $username) 
    {
        $stmt = $this->db->prepare(
            "SELECT timestamp FROM login_log
             WHERE username = :username AND status = 'bad'
             ORDER BY timestamp DESC LIMIT 1"
        );
        $stmt->execute(['username' => $username]);
        return $stmt->fetchColumn();
    }
}