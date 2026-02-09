<?php

    session_start();

    require_once __DIR__ . '/model/data.php';

    createSession();

    if( isset($_POST['action'])){
        switch($_POST['action']):
            case 'login':
                require_once __DIR__ . '/controller/login.php';
                break;
            case 'register':
                require_once __DIR__ . '/controller/register.php';
                break;
            default:
                require_once __DIR__ . '/view/login_view.php';
        endswitch;
    }else{
        require_once __DIR__ . '/view/login_view.php';
    }


?>