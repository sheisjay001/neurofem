<?php

namespace Controllers;

use Models\Post;
use Helpers\Security;

class CommunityController {
    public function index() {
        $postModel = new Post();
        $stmt = $postModel->readAll();
        $posts = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        require VIEW_PATH . '/community.php';
    }

    public function create() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/auth/login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!Security::verifyCsrfToken($_POST['csrf_token'] ?? '')) {
                die('Invalid CSRF Token');
            }

            $content = $_POST['content'] ?? '';
            $category = $_POST['category'] ?? 'general';

            // Content Moderation (Basic)
            $badWords = ['badword', 'hate', 'stupid']; // Placeholder list
            foreach ($badWords as $word) {
                if (stripos($content, $word) !== false) {
                    die("Please keep the community safe and kind. Profanity is not allowed.");
                }
            }

            if (!empty($content)) {
                $post = new Post();
                $post->user_id = $_SESSION['user_id'];
                $post->content = $content;
                $post->category = $category;
                $post->create();
            }

            header('Location: ' . BASE_URL . '/community');
            exit;
        }
    }
}
