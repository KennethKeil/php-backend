<?php 
    class Book {

        // Connection
        private $connection;

        // Table
        private $dbTable = "books";

        // Columns
        public $id;
        public $isbn;
        public $title;
        public $author;
        public $discription;
        public $image;
        public $price;
        public $inventory;
      
        // Database Connection
        public function __construct($connection){
            $this->connection = $connection;
        }

        // GET All Books
        public function getAllBooks(){
            $sql = "SELECT * FROM " . $this->dbTable . "";
            $result = $this->connection->query($sql);
            return $result;
        }
    }  
?>