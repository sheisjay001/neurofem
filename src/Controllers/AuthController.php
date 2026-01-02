<?php

namespace Controllers;

use Helpers\Security;
use Models\User;
use Helpers\RateLimiter;

class AuthController {
    private $rateLimiter;

    public function __construct() {
        $this->rateLimiter = new RateLimiter(5, 300); // 5 attempts per 5 minutes
    }
    
    // Show Login Form
    public function login() {
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    // Handle Login Submission
    public function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        $ip = $_SERVER['REMOTE_ADDR'];
        if (!$this->rateLimiter->check($ip . '_login')) {
            $wait = $this->rateLimiter->getRemainingTime($ip . '_login');
            die("Too many login attempts. Please try again in $wait seconds.");
        }

        // Validate CSRF
        if (!Security::verifyCsrfToken($_POST['csrf_token'] ?? '')) {
            die('Invalid CSRF Token');
        }

        $email = Security::sanitize($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        $user = new User();
        $user->email = $email;

        if ($user->emailExists() && password_verify($password, $user->password)) {
            // Login Success
            Security::startSession();
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_name'] = $user->name;
            
            header('Location: ' . BASE_URL . '/dashboard');
            exit;
        } else {
            // Login Failed
            // In a real app, pass error message to view
            echo "<script>alert('Invalid email or password'); window.location.href='" . BASE_URL . "/auth/login';</script>";
        }
    }

    // Show Signup Form
    public function signup() {
        require VIEW_PATH . '/auth/signup.php';
    }

    // Handle Signup Submission
    public function handleSignup() {
        if (!Security::verifyCsrfToken($_POST['csrf_token'] ?? '')) {
            die('Invalid CSRF Token');
        }

        $name = Security::sanitize($_POST['name'] ?? '');
        $email = Security::sanitize($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        // Validation
        if (empty($name) || empty($email) || empty($password)) {
            die('Please fill all fields');
        }
        
        // Enforce Password Strength (Backend)
        if (strlen($password) < 8 || !preg_match('/[A-Z]/', $password) || !preg_match('/[0-9]/', $password)) {
             echo "<script>alert('Password must be at least 8 characters and include a number and an uppercase letter.'); window.location.href='" . BASE_URL . "/auth/signup';</script>";
             exit;
        }

        // Rate Limit Signup too
        $ip = $_SERVER['REMOTE_ADDR'];
        if (!$this->rateLimiter->check($ip . '_signup')) {
            die("Too many signup attempts.");
        }

        $user = new User();
        $user->name = $name;
        $user->email = $email;

        if ($user->emailExists()) {
            echo "<script>alert('Email already registered'); window.location.href='" . BASE_URL . "/auth/signup';</script>";
            exit;
        }

        $user->password = password_hash($password, PASSWORD_BCRYPT);

        if ($user->create()) {
            // Auto-login after signup
            $user->emailExists(); // Re-fetch to get ID
            $userData = $user->conn->prepare("SELECT id, name FROM users WHERE email = ?");
            $userData->execute([$email]);
            $loggedInUser = $userData->fetch(\PDO::FETCH_ASSOC);
            
            Security::regenerateSession();
            $_SESSION['user_id'] = $loggedInUser['id'];
            $_SESSION['user_name'] = $loggedInUser['name'];
            
            header("Location: " . BASE_URL . "/dashboard");
            exit;
        } else {
            die("Registration failed.");
        }
    }
    
    // Logout
    public function logout() {
        Security::startSession();
        session_destroy();
        header('Location: ' . BASE_URL . '/');
        exit;
    }
}
