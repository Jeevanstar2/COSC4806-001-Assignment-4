<?php
require_once 'app/models/ReminderModel.php';
class Reminder extends Controller 
{
    private $model;
    public function __construct() 
    {
        if (!isset($_SESSION['user_id'])) 
        {
            header("Location: index.php?action=login");
            exit();
        }
        $this->model = new ReminderModel();
    }
    public function index() 
    {
        $reminders = $this->model->getAllByUser($_SESSION['user_id']);
        $this->view('reminders/index', ['reminders' => $reminders]);
    }
    public function create() 
    {
        $this->view('reminders/create');
    }
    public function store() 
    {
        $subject = trim($_POST['subject']);
        if (!empty($subject)) {
            $this->model->create($_SESSION['user_id'], $subject);
        }
        header("Location: index.php?action=reminder");
    }
    public function edit() 
    {
        $id = $_GET['id'] ?? 0;
        $reminder = $this->model->get($id, $_SESSION['user_id']);
        if (!$reminder) {
            echo "Reminder not found.";
            return;
        }
        $this->view('reminders/edit', ['reminder' => $reminder]);
    }
    public function update() 
    {
        $id = $_POST['id'];
        $subject = $_POST['subject'];
        $this->model->update($id, $_SESSION['user_id'], $subject);
        header("Location: index.php?action=reminder");
    }
    public function delete() 
    {
        $id = $_GET['id'] ?? 0;
        $this->model->delete($id, $_SESSION['user_id']);
        header("Location: index.php?action=reminder");
    }
}
