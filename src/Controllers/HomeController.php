<?php

namespace Controllers;

class HomeController {
    public function index() {
        if (isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/dashboard');
            exit;
        }
        require VIEW_PATH . '/home.php';
    }
}
