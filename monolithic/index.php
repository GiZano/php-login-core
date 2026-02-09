<!-- REGISTER -->

<!-- 

    Data format

    version 1
    [
        "name" => "X",
        "surname" => "Y",
        ...
    ]

    version 2
    [
        "id" => 1,
        "data" => [
            "name" => "X",
            "surname => "Y",
            ...        
        ]
    ]

-->

<?php

    session_start();
    // all .php script where we find session_start()
    // will share the superglobal variable $_SESSION (including the content)

    if( !isset($_SESSION['users']) ){

        // executed only the first time the script receives an HTTP request

        // the first time the page is reloaded, the empty array is initialized

        $users = [];
        $_SESSION['users'] = $users; // put the user list in the session
    }

?>

<?php

    // version 1 

    $users = [];

    // 1) check request type

    // if a POST request was sent with register action
    if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action'] == 'register'){
        // operations to execute with POST method

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

        // check that an user with the same email doesn't exist
        
        // get $users from session
        $users = $_SESSION['users'];

        $found = false;
        foreach($users as $index => $data ){
            if ($data['email'] == $email){

                echo("USER EXISTS ALREADY");
                $found = true;
                break;

            }
        }

        if ( !$found ){
            // insert user into users list -> SAVE -> REGISTER
            
            $tmp = [
                "email"    => $email,
                "password" => $password,
                "username" => $username,
                "tax_code" => $tax_code
            ];

            // add tmp to users list
            array_push($users, $tmp);
            // same as -> $users[] = $tmp

            // update users in session
            $_SESSION['users'] = $users;

            echo("USER CORRECTLY REGISTERED");
            /*
            echo    ('<pre>');
            print_r ($users);
            echo    ('</pre>');
            */
        }
    }

    // if a POST request was sent with login action
    if( $_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['action'] == 'login'){

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

        // 2) Check sent data against saved data
        //          If existing --> set username in session
        // 2a) retrieve array from session

        $users = $_SESSION['users'];

        // If not empty

        if( count($users) != 0 ){
            
            foreach( $users as $user ){
                if( $user['email'] == $email && $user['password'] == $password){
                    $_SESSION['logged_user'] = $user; // insert user in session (logged user)
                    $username = $user['username'];
                    echo("Welcome $username ");
                    echo(
                        "<a href='logout.php'>LOGOUT</a>"
                    );
                }
            }

            if( !isset($_SESSION['logged_user']) ){
                echo("User Not Found!");
            }

        }else{
            echo("No Registered Users!");
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

    <h1>Registration Form</h1>

    <!--
        action -> to who
        method -> how
            GET  -> in the HTTP head -> I see data in the URL
            POST -> in the HTTP body -> I can't see data in the URL
    -->

    <!--
        $_<NAME> -> superglobal variables
                 -> present in all the sections of the web server (<folderName>)
                 -> associative arrays
                    TYPICAL STRUCTURE
                    [key => value]
                    SPECIFIC STRUCTURE of $_GET and $_POST
                    [ '&name' => "$input" ]
                    [ "name"  => "Foe"    ]

        $_GET
        $_POST
    -->
    
    <form action="index.php" method="POST">
        <input type="email"    name="email"    placeholder="Email"    required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text"     name="username" placeholder="Username" required>
        <input type="text"     name="tax_code" placeholder="Tax Code" required>

        <input type="hidden"   name="action"   value="register">
        <input type="submit" value="Register">
    </form>

    <h1>Login</h1>
    <form action="index.php" method="POST"> 
        <input type="email"    name="email"    placeholder="Email"    required>
        <input type="password" name="password" placeholder="Password" required>

        <input type="hidden"   name="action"   value="login">
        <input type="submit" value="Log In">
    </form>

</body>
</html>