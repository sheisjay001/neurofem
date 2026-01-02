<?php
namespace Controllers;

class ToolsController {
    public function focus() {
        // Ensure user is logged in
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }
        require VIEW_PATH . '/tools/focus.php';
    }
}
