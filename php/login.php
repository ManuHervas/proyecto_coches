<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    if ($usuario == "manu") {
        session_start();
        $_SESSION['user']= 'manu';
        
        header("Location: ../html/index.html");
    }else{
        echo 'invalid user';
    }


}

?>