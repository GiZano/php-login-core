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