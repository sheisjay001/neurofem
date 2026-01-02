<?php
namespace Controllers;

use Models\MoodLog;

class DashboardController {
    public function index() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $moodLog = new MoodLog();
        $message = '';

        // Handle POST request
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['log_mood'])) {
            $moodLog->user_id = $user_id;
            $moodLog->mood_level = $_POST['mood_level'];
            $moodLog->energy_level = $_POST['energy_level'];
            $moodLog->note = $_POST['note'] ?? '';

            if ($moodLog->create()) {
                $message = 'Mood logged successfully!';
            } else {
                $message = 'Failed to log mood.';
            }
        }

        // Get History
        $moodHistory = $moodLog->getHistory($user_id);

        require VIEW_PATH . '/dashboard.php';
    }
}
