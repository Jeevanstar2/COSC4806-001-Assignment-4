<?php
require_once __DIR__ . '/../database.php';

class User {
    private $db;

    public function __construct() {
        $this->db = db_connect();
    }

    public function findByUsername(string $u) {
        $stmt = $this->db->prepare(
            "SELECT * FROM COSC4806001_Assignment2_Users WHERE Username = :u"
        );
        $stmt->execute(['u' => $u]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(string $u, string $pw) {
        $hash = password_hash($pw, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare(
            "INSERT INTO COSC4806001_Assignment2_Users (Username, Password) VALUES (:u, :h)"
        );
        return $stmt->execute(['u' => $u, 'h' => $hash]);
    }

    public function recordLoginAttempt(string $u, string $status) {
        $stmt = $this->db->prepare(
            "INSERT INTO login_log (username, status) VALUES (:u, :s)"
        );
        $stmt->execute(['u' => $u, 's' => $status]);
    }

    public function getLastFailed(string $u) {
        $stmt = $this->db->prepare(
            "SELECT timestamp
             FROM login_log
             WHERE username = :u AND status = 'bad'
             ORDER BY timestamp DESC
             LIMIT 1"
        );
        $stmt->execute(['u' => $u]);
        return $stmt->fetchColumn();
    }

    public function countRecentFails(string $u, int $secondsAgo) {
        $since = date('Y-m-d H:i:s', time() - $secondsAgo);
        $stmt = $this->db->prepare(
            "SELECT COUNT(*) FROM login_log
             WHERE username = :u
               AND status = 'bad'
               AND timestamp >= :since"
        );
        $stmt->execute(['u' => $u, 'since' => $since]);
        return (int)$stmt->fetchColumn();
    }
}
