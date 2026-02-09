<?php

    require_once __DIR__ . '/../model/data.php';

    // 1) Retrieve data from the form
    if( isset($_POST['email']) ){
        $email = $_POST['email'];
    }else{
        // ...
    }
    if( isset($_POST['password']) ){
        $password = $_POST['password'];
    }else{
        // ...
    }

    try{
        logUser($email, $password);
        if( isset($_SESSION['logged_user']) ){
            $username = $_SESSION['logged_user']['username'];
            echo "Welcome $username";
            echo(
                        "<a href='/logout.php'>LOGOUT</a>"
            );
        }
    }catch(Exception $e){
        echo("Error: " . $e->getMessage());
    }
    

    require_once __DIR__ . '/../view/login_view.php';

?>