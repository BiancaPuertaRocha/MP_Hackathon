<?php
session_start();
session_destroy();
@header("Location: http://localhost/MP_Hackathon/pages/login-user.php");
?>