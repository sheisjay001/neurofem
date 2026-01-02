<?php
// Enable error reporting for development
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define paths
define('ROOT_PATH', dirname(__DIR__));
define('SRC_PATH', ROOT_PATH . '/src');
define('VIEW_PATH', SRC_PATH . '/Views');

// Load Database Configuration
require_once ROOT_PATH . '/config/database.php';

// Determine Base URL
$script_name = $_SERVER['SCRIPT_NAME'];
$base_url = dirname($script_name);
// Ensure no trailing slash unless it's just root
if ($base_url === '/' || $base_url === '\\' || $base_url === '/api') {
    $base_url = '';
}
// Fix backslashes on Windows if needed
$base_url = str_replace('\\', '/', $base_url);
define('BASE_URL', $base_url);

// Simple Autoloader since we don't have Composer
spl_autoload_register(function ($class_name) {
    // Convert namespace to full file path
    // Example: Controllers\HomeController -> src/Controllers/HomeController.php
    $file = SRC_PATH . '/' . str_replace('\\', '/', $class_name) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

// Security Headers
header("X-Frame-Options: SAMEORIGIN");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("Referrer-Policy: strict-origin-when-cross-origin");
header("Content-Security-Policy: default-src 'self' https:; script-src 'self' 'unsafe-inline' 'unsafe-eval'; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://fonts.cdnfonts.com; font-src 'self' https://fonts.gstatic.com https://fonts.cdnfonts.com; img-src 'self' data: https:;");

// Initialize Session Security
\Helpers\Security::startSession();

// Basic Router
$request = $_SERVER['REQUEST_URI'];
// Remove query string
$request = strtok($request, '?');
// Remove base path if strictly in a subdirectory (e.g. /neurofem/public)
// This is a hacky way to handle XAMPP subdirectory deployment
$script_name = dirname($_SERVER['SCRIPT_NAME']);
$script_name = str_replace('\\', '/', $script_name); // Fix windows backslashes

// Only remove script path if it's not root to avoid stripping all slashes
if ($script_name !== '/' && $script_name !== '/api') {
    $request = str_replace($script_name, '', $request);
}

if ($request == '/' || $request == '') {
    $controllerName = 'Controllers\HomeController';
    $actionName = 'index';
} else {
    // simplistic routing: /controller/action
    $parts = explode('/', trim($request, '/'));
    
    // Capitalize first letter for Controller
    $controllerName = 'Controllers\\' . ucfirst($parts[0]) . 'Controller';
    $actionName = isset($parts[1]) ? $parts[1] : 'index';
    
    // Handle kebab-case actions (e.g., handle-login -> handleLogin)
    if (strpos($actionName, '-') !== false) {
        $actionName = lcfirst(str_replace('-', '', ucwords($actionName, '-')));
    }
}

// Special Route for Tools (since it's a subdirectory in views but controller is flat)
if ($controllerName == 'Controllers\ToolsController' && $actionName == 'focus') {
    // Allow default dispatch
}

// Dispatch
if (class_exists($controllerName)) {
    $controller = new $controllerName();
    if (method_exists($controller, $actionName)) {
        $controller->$actionName();
    } else {
        // 404
        http_response_code(404);
        require VIEW_PATH . '/404.php';
    }
} else {
    // 404
    http_response_code(404);
    // Ensure 404 view exists or fallback
    if (file_exists(VIEW_PATH . '/404.php')) {
        require VIEW_PATH . '/404.php';
    } else {
        echo "404 Not Found";
    }
}
