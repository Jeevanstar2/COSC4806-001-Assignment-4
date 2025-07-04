<?php
if (headers_sent($file, $line)) {
    die("Headers already sent in $file on line $line");
}

class Verify extends Controller {
    public function index(): void {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header("Location: index.php?action=login");
            exit();
        }

        $u     = trim($_POST['username'] ?? '');
        $pw    = $_POST['password'] ?? '';
        $userM = $this->model('User');

        // Check last failed attempt
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
        if (!$user || !password_verify($pw, $user['Password'])) {
            $userM->recordLoginAttempt($u, 'bad');
            $this->view('login/index', [
                'error'    => 'Invalid username or password.',
                'username' => $u
            ]);
            return;
        }

        // SUCCESSFUL LOGIN
        $userM->recordLoginAttempt($u, 'good');
        $_SESSION['user_id']    = $user['ID'];
        $_SESSION['username']   = $user['Username'];
        $_SESSION['login_time'] = date('Y-m-d H:i:s');

        header("Location: index.php?action=home");
        exit();
    }
}
