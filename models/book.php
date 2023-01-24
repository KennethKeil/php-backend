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
            // $sqlQuery = "UPDATE books SET inventory = :inventory WHERE id = :id";
            // $sqlQuery = "UPDATE books SET inventory = 2 WHERE id = 1";
            $sqlQuery = "UPDATE books SET inventory = ? WHERE id = ?";
            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->bind_param("ii", $this->inventory, $this->id);

            /*
            $this->inventory=htmlspecialchars(strip_tags($this->inventory));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind data
            $stmt->bind_param(":inventory", $this->inventory);
            $stmt->bind_param(":id", $this->id);
            */

            if($stmt->execute()){
                return true;
             }
             return false;
        }
    }  
?>