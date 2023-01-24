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
            $sqlQuery = "SELECT * FROM " . $this->dbTable . "";
            $result = $this->connection->query($sqlQuery);
            return $result;
        }

         // UPDATE Book
         public function updateBook(){
            $sqlQuery = "UPDATE books SET inventory = ? WHERE id = ?";
            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->bind_param("ii", $this->inventory, $this->id);

            if($stmt->execute()){
                return true;
             }
             return false;
        }
    }  
?>