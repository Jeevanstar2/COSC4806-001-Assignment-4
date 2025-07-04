<?php
require_once 'app/models/ReminderModel.php';

class Reminder extends Controller {
    private $reminderModel;

    public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit();
        }

        $this->reminderModel = new ReminderModel();
    }

    public function index() {
        $userId = $_SESSION['user_id'];
        $reminders = $this->reminderModel->getAllByUser($userId);
        $this->view('reminders/index', ['reminders' => $reminders]);
    }

    public function create() {
        $this->view('reminders/create');
    }

    public function store() {
        $subject = trim($_POST['subject']);
        if (!empty($subject)) {
            $this->reminderModel->create($_SESSION['user_id'], $subject);
        }
        header("Location: index.php?action=reminder");
        exit();
    }

    public function edit($id) {
        $reminder = $this->reminderModel->get($id, $_SESSION['user_id']);
        if (!$reminder) {
            die("Reminder not found.");
        }
        $this->view('reminders/edit', ['reminder' => $reminder]);
    }

    public function update($id) {
        $subject = trim($_POST['subject']);
        if (!empty($subject)) {
            $this->reminderModel->update($id, $_SESSION['user_id'], $subject);
        }
        header("Location: index.php?action=reminder");
        exit();
    }

    public function delete($id) {
        $this->reminderModel->delete($id, $_SESSION['user_id']);
        header("Location: index.php?action=reminder");
        exit();
    }

    public function complete($id) {
        $this->reminderModel->markComplete($id, $_SESSION['user_id']);
        header("Location: index.php?action=reminder");
        exit();
    }
}
