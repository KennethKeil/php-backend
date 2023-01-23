<?php 
    class Database {

        /* Properties */
        private string $host;
        private string $username;
        private string $password;
        private string $dbname;
        public $connection;


        public function __construct() {
            $this->host = "localhost";
            $this->username = "g17";
            $this->password = "or63sinus";
            $this->dbname = "g17";
            $this->connection = null;
        }

        public function getConnection() {

            // Create a new connection
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->dbname);

            // Check connection
            if (!$this->connection) {
                die("Connection failed!");
            }

            return $this->connection;
        }
    }  
?>