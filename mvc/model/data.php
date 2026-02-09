<?php

    /** 
        * Name: createSession
        * Parameters: None
        * Exceptions: None

        * Description: If not already initialized, set $_SESSION['users'] as an empty array.
    */  
    function createSession(){
        if( !isset($_SESSION['users']) ){
            $users = [];
            $_SESSION['users'] = $users;
        }
    }

    /**
        * Name: createSession
        * Parameters: newUser | Array
        * Exceptions: InvalidArgumentException

        * Description: If not already existing, adds new user to the user list.
    */  
    function registerUser($new_user){
        $users = $_SESSION['users'];
        $found = false;

        foreach($users as $user){
            if( $user['email'] == $new_user['email']){
                $found = true;
                break;
            }
        }

        if( !$found ){
            // Push new user to list
            $users[] = $new_user;
            // Update session
            $_SESSION['users'] = $users;
        }else{
            throw new InvalidArgumentException("User Already Exists");
        }
    }

    /**
        * Name: logUser
        * Parameters: 
        *     $email    | string
        *     $password | string
        * Exceptions: InvalidArgumentException

        * Description: Logs user by checking inserted email and password.
    */  
    function logUser($email, $password){
        // retrieve data from session
        $users = $_SESSION['users'];

        // logout current user
        logoutUser();

        // check array only if not empty
        if( count($users) != 0 ){
            foreach( $users as $user ){
                if( $user['email'] == $email && $user['password'] == $password){
                    $_SESSION['logged_user'] = $user;
                    break;
                }
            }

            if( !isset($_SESSION['logged_user']) ){
                throw new InvalidArgumentException("User Not Found!");
            }
        }else{
            throw new RuntimeException("No Registered Users!");
        }

    }

    /**
        * Name: logoutUser
        * Parameters: None
        * Exceptions: None

        * Description: Logs out currently logged in user.
    */ 
    function logoutUser(){
        if( isset($_SESSION['logged_user']) ){
            unset($_SESSION['logged_user']);
        }
    }

?>