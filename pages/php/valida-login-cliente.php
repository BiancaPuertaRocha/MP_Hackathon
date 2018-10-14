<?php
    @session_start();

    if(!isset($_SESSION['logado'])){
        @header("Location: http://localhost/MP_Hackathon/inicio/login-user.php");
    }

?>