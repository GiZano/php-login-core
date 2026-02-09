<?php

    require_once __DIR__ . '/../model/data.php';

    // 1) Retrieve data from POST request
    if ( isset($_POST['email'] )){
            $email = $_POST['email'];
        }else{
            // ...
        }

    if( isset($_POST['password'] )){
        // Cryptography
        /*
            Mechanism to hide data by transforming it into another form
            to make it accessible ONLY by the receiver
        */
        $password = $_POST['password'];
    }else{
        // ...
    }

    if( isset($_POST['username']) ){
        $username = $_POST['username'];
    }else{
        //...
    }
    if( isset($_POST['tax_code']) ){
        $tax_code = $_POST['tax_code'];
    }
    $tmp = [
        "email"    => $email,
        "password" => $password,
        "username" => $username,
        "tax_code" => $tax_code
    ];
    try{
        registerUser($tmp);
        echo("User correctly registered!");
    }catch(InvalidArgumentException $e){
        echo("Error: " . $e->getMessage());
    }

    require_once __DIR__ . '/../view/login_view.php';

?>