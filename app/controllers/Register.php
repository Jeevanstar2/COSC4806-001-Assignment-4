<?php
class Register extends Controller {
    public function index(): void {
        $this->view('register/index', ['error' => '']);
    }

    public function store(): void {
        $u  = trim($_POST['username'] ?? '');
        $pw = $_POST['password'] ?? '';
        $cp = $_POST['confirm_password'] ?? '';

        if ($pw !== $cp) {
            $this->view('register/index', ['error' => 'Passwords do not match.']);
            return;
        }

        $user = $this->model('User');
        if ($user->findByUsername($u)) {
            $this->view('register/index', ['error' => 'Username already exists.']);
            return;
        }

        $user->create($u, $pw);
        header("Location: index.php?action=login");
        exit();
    }
}
