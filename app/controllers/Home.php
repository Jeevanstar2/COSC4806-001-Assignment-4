<?php
class Home extends Controller {
    public function index(): void {
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit();
        }

        $this->view('home/index');
    }
}
