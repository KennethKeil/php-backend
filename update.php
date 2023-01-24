<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json;");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type,
     Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once 'config/database.php';
    include_once 'models/book.php';

    $database = new Database();
    $connection = $database->getConnection();

    $book = new Book($connection);
    
    $data = json_decode(file_get_contents("php://input"));

    $book->id = $data->id;
    $book->inventory = $data->inventory;
    
    if($book->updateBook()){
        echo json_encode("Book updated.");
    } else{
        echo json_encode("Book could not be updated.");
    }

    $connection->close();
?>