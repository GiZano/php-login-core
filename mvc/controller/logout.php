<?php

    require_once __DIR__ . '/../model/data.php';

    logoutUser();

    header('Location: index.php');

    exit();

?>