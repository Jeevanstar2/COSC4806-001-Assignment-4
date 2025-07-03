<?php
class Verify extends Controller {
    public function index(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=login");
            exit();
        }

        $u     = trim($_POST['username'] ?? '');
        $pw    = $_POST['password'] ?? '';
        $userM = $this->model('User');

        $lastFail = $userM->getLastFailed($u);
        if ($lastFail && time() < strtotime($lastFail) + 60) {
            $wait = (strtotime($lastFail) + 60) - time();
            $this->view('login/index', [
                'error'    => "Account locked. Try again in {$wait} seconds.",
                'username' => $u
            ]);
            return;
        }

        $user = $userM->findByUsername($u);
        if (!$user || !password_verify($pw, $user['password_hash'])) {
            $userM->recordLoginAttempt($u, 'failure');
            $this->view('login/index', [
                'error'    => 'Invalid username or password.',
                'username' => $u
            ]);
            return;
        }

        // SUCCESSFUL LOGIN
        $userM->recordLoginAttempt($u, 'success');
        $_SESSION['user_id']    = $user['id'];
        $_SESSION['username']   = $user['username'];
        $_SESSION['login_time'] = date('Y-m-d H:i:s');

        header("Location: index.php?action=home");
        exit();
    }
}
