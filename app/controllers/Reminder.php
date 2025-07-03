<?php
require_once __DIR__ . '/../models/ReminderModel.php';

class Reminder extends Controller {
    private $reminder;

    public function __construct() {
        session_start();
        if (!isset($_SESSION['USER'])) {
            header("Location: index.php?action=login");
            exit();
        }

        $this->reminder = new ReminderModel(); // Use your model directly
    }

    public function index() {
        $user_id = $_SESSION['USER']['id'];
        $data['reminders'] = $this->reminder->getAllByUser($user_id);
        $this->view('reminders/index', $data);
    }

    public function create() {
        $this->view('reminders/create');
    }

    public function store() {
        $user_id = $_SESSION['USER']['id'];
        $subject = trim($_POST['subject']);
        if ($subject) {
            $this->reminder->create($user_id, $subject);
        }
        header("Location: index.php?action=reminder");
    }

    public function edit($id) {
        $user_id = $_SESSION['USER']['id'];
        $reminder = $this->reminder->get($id, $user_id);
        if (!$reminder) die("Reminder not found or unauthorized.");
        $this->view('reminders/edit', ['reminder' => $reminder]);
    }

    public function update($id) {
        $user_id = $_SESSION['USER']['id'];
        $subject = trim($_POST['subject']);
        $this->reminder->update($id, $user_id, $subject);
        header("Location: index.php?action=reminder");
    }

    public function delete($id) {
        $user_id = $_SESSION['USER']['id'];
        $this->reminder->delete($id, $user_id);
        header("Location: index.php?action=reminder");
    }
}
