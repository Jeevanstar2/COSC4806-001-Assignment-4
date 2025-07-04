<?php
require_once __DIR__ . '/../database.php';

class ReminderModel {
    private $db;

    public function __construct() {
        $this->db = db_connect();
    }

    public function create($userId, $subject) {
        $stmt = $this->db->prepare(
            "INSERT INTO reminders (user_id, subject, created_at, status) 
             VALUES (:uid, :subject, NOW(), 'pending')"
        );
        return $stmt->execute([
            'uid'     => $userId,
            'subject' => $subject
        ]);
    }

    public function getAllByUser($userId) {
        $stmt = $this->db->prepare(
            "SELECT * FROM reminders 
             WHERE user_id = :uid AND deleted_at IS NULL 
             ORDER BY created_at DESC"
        );
        $stmt->execute(['uid' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id, $userId) {
        $stmt = $this->db->prepare(
            "SELECT * FROM reminders 
             WHERE id = :id AND user_id = :uid AND deleted_at IS NULL"
        );
        $stmt->execute(['id' => $id, 'uid' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $userId, $subject, $status) {
        $stmt = $this->db->prepare(
            "UPDATE reminders 
             SET subject = :subject, status = :status 
             WHERE id = :id AND user_id = :uid"
        );
        return $stmt->execute([
            'id'      => $id,
            'uid'     => $userId,
            'subject' => $subject,
            'status'  => $status
        ]);
    }

    public function softDelete($id, $userId) {
        $stmt = $this->db->prepare(
            "UPDATE reminders 
             SET deleted_at = NOW() 
             WHERE id = :id AND user_id = :uid"
        );
        return $stmt->execute([
            'id'  => $id,
            'uid' => $userId
        ]);
    }
}
