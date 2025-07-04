<?php
class Logout extends Controller 
{
    public function index(): void 
    {
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }
}