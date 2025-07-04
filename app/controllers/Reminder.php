<?php
class Reminder extends Controller {
    private $reminder;

    public function __construct() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit();
        }

        $this->reminder = $this->model('Reminder');
    }

    public function index() {
        $data['reminders'] = $this->reminder->getAllByUser($_SESSION['user_id']);
        $this->view('reminders/index', $data);
    }

    public function create() {
        $this->view('reminders/create');
    }

    public function store() {
        $subject = trim($_POST['subject']);
        if ($subject) {
            $this->reminder->create($_SESSION['user_id'], $subject);
        }
        header("Location: index.php?action=reminder");
    }

    public function edit($id) {
        $reminder = $this->reminder->get($id, $_SESSION['user_id']);
        if (!$reminder) die("Reminder not found.");
        $this->view('reminders/edit', ['reminder' => $reminder]);
    }

    public function update($id) {
        $subject = trim($_POST['subject']);
        $this->reminder->update($id, $_SESSION['user_id'], $subject);
        header("Location: index.php?action=reminder");
    }

    public function delete($id) {
        $this->reminder->delete($id, $_SESSION['user_id']);
        header("Location: index.php?action=reminder");
    }
}
