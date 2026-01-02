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

        // Handle POST request (Mood Log)
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
        
        // Handle Delete Message from redirect
        if (isset($_GET['msg'])) {
             if ($_GET['msg'] === 'deleted') {
                 $message = 'Check-in deleted successfully.';
             }
        }

        // Get History
        $moodHistory = $moodLog->getHistory($user_id);

        require VIEW_PATH . '/dashboard.php';
    }

    public function deleteCheckin() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkin_id'])) {
            $moodLog = new MoodLog();
            $checkin_id = $_POST['checkin_id'];
            $user_id = $_SESSION['user_id'];

            if ($moodLog->delete($checkin_id, $user_id)) {
                // Redirect back to dashboard with success message
                header('Location: ' . BASE_URL . '/dashboard?msg=deleted');
                exit;
            }
        }
        
        // If something went wrong or not a POST, just redirect back
        header('Location: ' . BASE_URL . '/dashboard');
        exit;
    }
}
