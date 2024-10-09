<?php 

    include_once 'functions.php';
    start_session();

    unset($_SESSION['user']);
    unset($_SESSION['models']);
    unset($_POST['model']);

    destroy_session();
    header("Location: ../html/login.html");

?>