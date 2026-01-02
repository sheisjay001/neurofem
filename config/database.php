<?php

class Database {
    private $host = "gateway01.eu-central-1.prod.aws.tidbcloud.com";
    private $db_name = "test";
    private $username = "nLnLCWffRhCH9pc.root";
    private $password = "0h3V36w1anZxs6mJ";
    private $port = "4000";
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            // TiDB / MySQL Connection with SSL
            $options = [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::MYSQL_ATTR_SSL_CA => __DIR__ . '/cacert.pem',
                PDO::MYSQL_ATTR_SSL_VERIFY_SERVER_CERT => true
            ];
            
            $dsn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name;
            
            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            
        } catch(PDOException $exception) {
            // In a production app, log this instead of showing it
            error_log("Connection error: " . $exception->getMessage());
            die("Database connection failed. Please check logs.");
        }

        return $this->conn;
    }
}
