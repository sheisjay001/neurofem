<?php
namespace Helpers;

class RateLimiter {
    private $limit;
    private $timeWindow;
    private $storageDir;

    public function __construct($limit = 5, $timeWindow = 60) {
        $this->limit = $limit;
        $this->timeWindow = $timeWindow;
        $this->storageDir = sys_get_temp_dir() . '/neurofem_ratelimit';
        
        if (!is_dir($this->storageDir)) {
            mkdir($this->storageDir, 0777, true);
        }
    }

    public function check($key) {
        $file = $this->storageDir . '/' . md5($key) . '.json';
        $data = ['attempts' => 0, 'startTime' => time()];

        if (file_exists($file)) {
            $data = json_decode(file_get_contents($file), true);
        }

        // Reset if window passed
        if (time() - $data['startTime'] > $this->timeWindow) {
            $data = ['attempts' => 0, 'startTime' => time()];
        }

        if ($data['attempts'] >= $this->limit) {
            return false;
        }

        $data['attempts']++;
        file_put_contents($file, json_encode($data));
        return true;
    }
    
    public function getRemainingTime($key) {
        $file = $this->storageDir . '/' . md5($key) . '.json';
        if (file_exists($file)) {
             $data = json_decode(file_get_contents($file), true);
             return $this->timeWindow - (time() - $data['startTime']);
        }
        return 0;
    }
}
