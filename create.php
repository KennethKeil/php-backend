<?php 
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json;");
    header("Access-Control-Allow-Methods: PUT");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type,
     Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once 'config/database.php';
    include_once 'models/order.php';

    $database = new Database();
    $connection = $database->getConnection();

    $order = new Order($connection);
    
    $data = json_decode(file_get_contents("php://input"));

    $order->name = $data->name;
    $order->street = $data->street;
    $order->zip = $data->zip;
    $order->city = $data->city;
    
    if($order->createOrder()){
        echo json_encode("Order created.");
    } else{
        echo json_encode("Order could not be created.");
    }

    $connection->close();
?>