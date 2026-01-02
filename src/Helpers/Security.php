<?php

namespace Helpers;

class Security {

    /**
     * Start a secure session if one hasn't started yet.
     */
    public static function startSession() {
        if (session_status() === PHP_SESSION_NONE) {
            // Set secure session parameters before starting
            ini_set('session.cookie_httponly', 1);
            ini_set('session.use_only_cookies', 1);
            // In a real production environment with HTTPS, set secure to 1
            // ini_set('session.cookie_secure', 1); 
            session_start();
        }
    }

    /**
     * Generate a CSRF token and store it in the session.
     * @return string The generated token
     */
    public static function generateCsrfToken() {
        self::startSession();
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    /**
     * Verify the CSRF token from the form request.
     * @param string $token The token submitted by the form
     * @return bool True if valid, false otherwise
     */
    public static function verifyCsrfToken($token) {
        self::startSession();
        if (isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token)) {
            return true;
        }
        return false;
    }

    /**
     * Sanitize input data.
     * @param string $data
     * @return string
     */
    public static function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        return $data;
    }
}
