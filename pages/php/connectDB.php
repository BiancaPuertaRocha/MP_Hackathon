<?php
$host   = "localhost:3306";
$user   = "root";
$pass   = "ifsp";
$db     = "bancoU";

$conn = mysqli_connect($host, $user, $pass, $db);
 
if (!$conn) {
    echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>