<?php
require_once __DIR__ . '/../database.php';

class Reminder {
    private $db;

    public function __construct() {
        $this->db = db_connect();
    }

    public function create($userId, $subject) {
        $stmt = $this->db->prepare("INSERT INTO reminders (user_id, subject) VALUES (:uid, :subject)");
        return $stmt->execute(['uid' => $userId, 'subject' => $subject]);
    }

    public function getAllByUser($userId) {
        $stmt = $this->db->prepare("SELECT * FROM reminders WHERE user_id = :uid");
        $stmt->execute(['uid' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id, $userId) {
        $stmt = $this->db->prepare("SELECT * FROM reminders WHERE id = :id AND user_id = :uid");
        $stmt->execute(['id' => $id, 'uid' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $userId, $subject) {
        $stmt = $this->db->prepare("UPDATE reminders SET subject = :subject WHERE id = :id AND user_id = :uid");
        return $stmt->execute(['id' => $id, 'uid' => $userId, 'subject' => $subject]);
    }

    public function delete($id, $userId) {
        $stmt = $this->db->prepare("DELETE FROM reminders WHERE id = :id AND user_id = :uid");
        return $stmt->execute(['id' => $id, 'uid' => $userId]);
    }
}
