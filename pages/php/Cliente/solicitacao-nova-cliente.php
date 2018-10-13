<?php
    @session_start();
    include_once("../connectDB.php");
    $codigoCliente = $_SESSION['codigo']; // ID Auto Increment
    date_default_timezone_set('America/Sao_Paulo');
    $hour = date('H:i:n.999999');
    $tipo = $_POST['tipo'];
    $localidade = $_POST['localidade'];
    $descricao = $_POST['descricao'];

        $sql = "insert into solicitacao (hospede, horariosol, tipo, localidade, descricao, situacao) VALUES 
        ($codigoCliente, '$hour', $tipo, '$localidade', '$descricao', 0);
        ";
        $conn->query($sql);
        @header("location: http://localhost/MP_Hackathon/solicitacoes-cliente.php");
?>