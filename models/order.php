<?php 
        class Order {

        // Connection
        private $connection;

        // Table
        private $dbTable = "orders";

        // Columns
        public $id;
        public $name;
        public $street;
        public $zip;
        public $city;
      
        // Database Connection
        public function __construct($connection){
            $this->connection = $connection;
        }

        // CREATE Order
        public function createOrder(){
            $sqlQuery = "INSERT INTO orders SET name = ?, street = ?, zip = ?, city = ?";
            $stmt = $this->connection->prepare($sqlQuery);
            $stmt->bind_param("ssss", $this->name, $this->street, $this->zip, $this->city);   
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }       
    }  
?>