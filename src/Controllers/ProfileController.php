<?php
namespace Controllers;

use Models\User;
use Helpers\Security;

class ProfileController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        // Fetch current user data (assuming name is in session, but better to fetch fresh)
        // For now, we'll rely on session or simple fetch if we had a User::find method.
        // Let's just use session for name to save a query, or add User::findById if needed.
        // Actually, let's implement User::findById to be proper.
        
        $userModel = new User();
        $user = $userModel->findById($_SESSION['user_id']);

        require VIEW_PATH . '/profile.php';
    }

    public function update() {
        if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        if (!Security::verifyCsrfToken($_POST['csrf_token'] ?? '')) {
            die('Invalid CSRF Token');
        }

        $name = htmlspecialchars(strip_tags($_POST['name'] ?? ''));
        
        if (!empty($name)) {
            $userModel = new User();
            if ($userModel->updateName($_SESSION['user_id'], $name)) {
                $_SESSION['user_name'] = $name; // Update session
                $success = "Profile updated successfully.";
            } else {
                $error = "Failed to update profile.";
            }
        }

        // Redirect back to profile
        header('Location: ' . BASE_URL . '/profile');
        exit;
    }

    public function delete() {
        if (!isset($_SESSION['user_id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        if (!Security::verifyCsrfToken($_POST['csrf_token'] ?? '')) {
            die('Invalid CSRF Token');
        }

        $userModel = new User();
        if ($userModel->delete($_SESSION['user_id'])) {
            session_destroy();
            header('Location: ' . BASE_URL . '/');
            exit;
        } else {
            die("Failed to delete account.");
        }
    }
}
