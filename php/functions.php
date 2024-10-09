<?php
    //funcion iniciar session
    //funcion cerrar session
    //funcion login
    //funcion logout
    //funcion está logueado que devuelve true o false si existe $_session['user']

    function start_session(){
        session_start();                
    }

    function destroy_session(){
        session_destroy();
    }
    
    function login($user){
        session_start();
        $_SESSION['user']=$user;

    }

    function logout(){
        session_destroy();
        unset($_SESSION['user']);
        echo "The sesision is OVER";
    }

    function user_exist(){
        if (isset($_SESSION['user'])) {
            echo '<h2>El usuario '.$_SESSION['user'].' existe</h2>';
            return true;
        }else{
            echo 'No existe ningún usuario';
            return false;
        }

    }

    function user(){
        return $_SESSION['user'];
    }

    


?>