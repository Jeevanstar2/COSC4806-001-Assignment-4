<?php
require_once __DIR__ . '/../database.php';

class Reminder {
    private $db;

    public function __construct() {
        $this->db = db_connect();
    }

    public function get_all_reminders(int $uid): array {
        $stmt = $this->db->prepare(
            "SELECT id, subject, completed, created_at
               FROM reminders
              WHERE user_id = :uid AND deleted = 0
           ORDER BY created_at DESC"
        );
        $stmt->execute(['uid' => $uid]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function create_reminder(int $uid, string $subject): bool {
        $stmt = $this->db->prepare(
            "INSERT INTO reminders (user_id, subject)
                             VALUES (:uid,    :subject)"
        );
        return $stmt->execute(['uid' => $uid, 'subject' => $subject]);
    }

    public function delete_reminder(int $id): bool {
        $stmt = $this->db->prepare(
            "UPDATE reminders SET deleted = 1 WHERE id = :id"
        );
        return $stmt->execute(['id' => $id]);
    }

    public function mark_reminder_complete(int $id): bool {
        $stmt = $this->db->prepare(
            "UPDATE reminders SET completed = 1 WHERE id = :id"
        );
        return $stmt->execute(['id' => $id]);
    }
}
