<?php

class Connection {

    private $host;
    private $dbname;
    private $username;
    private $password;

    public $conn;

    public function __construct() {
        $this->host = 'localhost';
        $this->dbname = 'id14729748_test';
        $this->username = 'id14729748_root';
        $this->password = 'c!1<0+YNRzx}C]D%';
    }

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new \PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                
            );
        } catch(\PDOException $exp) {
            echo "Connection Error: " . $exp->getMessage();
        }

        return $this->conn;
    }
}
?>