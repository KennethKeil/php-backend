<?php    
    include_once 'config/database.php';
    include_once 'models/book.php';

    $database = new Database();
    $connection = $database->getConnection();

    $book = new Book($connection);
    $result = $book->getAllBooks();

    if($result->num_rows > 0){
        
        $data = array();
       
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        response(200,"Books Found",$data);
        // echo json_encode($data);
    } else {
        response(400,"Invalid Request",NULL);
        // echo json_encode(array("error"=>"no results found"));
    }

    function response($status,$status_message,$data)
    {
        header("HTTP/1.1 ".$status);
        header('Access-Control-Allow-Origin: *');
        
        $json_response = json_encode($data);
        echo $json_response;
    }

    $connection->close();
?>