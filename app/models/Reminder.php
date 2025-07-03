<?php
class Reminder {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getAllByUser($user_id) {
        $stmt = $this->db->prepare("SELECT * FROM reminders WHERE user_id = ?");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($user_id, $subject) {
        $stmt = $this->db->prepare("INSERT INTO reminders (user_id, subject) VALUES (?, ?)");
        return $stmt->execute([$user_id, $subject]);
    }

    public function get($id, $user_id) {
        $stmt = $this->db->prepare("SELECT * FROM reminders WHERE id = ? AND user_id = ?");
        $stmt->execute([$id, $user_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $user_id, $subject) {
        $stmt = $this->db->prepare("UPDATE reminders SET subject = ? WHERE id = ? AND user_id = ?");
        return $stmt->execute([$subject, $id, $user_id]);
    }

    public function delete($id, $user_id) {
        $stmt = $this->db->prepare("DELETE FROM reminders WHERE id = ? AND user_id = ?");
        return $stmt->execute([$id, $user_id]);
    }
}
?>
