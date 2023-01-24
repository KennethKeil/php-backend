<?php
    // Set your secret key: remember to change this to your live secret key in production
    // See your keys here: https://dashboard.stripe.com/account/apikeys
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods, GET, POST, PUT, DELETE, OPTIONS");

    require_once('./stripe-php-10.3.0/init.php');

    $currency = 'eur';

    $data = json_decode(file_get_contents('php://input'), true);

        \Stripe\Stripe::setApiKey('sk_test_51MND5gKoOKXyGCYuQic8DkuI3pIRZ3gUYHtwO7IE4U6UdOBYsZfxkDKL6vec4nomchqioECr1miivcateaNTbxKS0093a6YYqx');
        
        $public_key_for_js="pk_test_51MND5gKoOKXyGCYuJMbwP5hV8wuibN9R3nGMLPJWu44LG6egap9tuQ53W4fMsTil61AaPmoRuGpXUsymfMlLYGi200ZDLuStVK"; 
    try {
        $session = \Stripe\Checkout\Session::create([
            'mode' => 'payment',
            'payment_method_types' => ['card'],
            'success_url' => 'https://ivm108.informatik.htw-dresden.de/ewa/g19/shop/success?session_id=' . '{CHECKOUT_SESSION_ID}',
            'cancel_url'  =>  'https://ivm108.informatik.htw-dresden.de/ewa/g19/shop/cancel?session_id=' . '{CHECKOUT_SESSION_ID}',
            'line_items' => [$data],
        ]);
    } catch (\Stripe\Exception\ApiErrorException $e) {
        echo "Error in Session::create()" . $e;
    }

    header("HTTP/1.1 200 OK");
    $data = ['pk' => $public_key_for_js, 'sessionId' =>  $session['id']];
    header('Content-type: Application/json');
    echo json_encode($data);

?>