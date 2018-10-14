<?php
    @session_start();
    include_once("../connectDB.php");
    $codigoFunc = $_SESSION['codigo']; // ID Auto Increment
    date_default_timezone_set('America/Sao_Paulo');
    $hour = date('H:i:n.999999');
    $tipo = $_POST['tipo'];
    $localidade = $_POST['localidade'];
    $descricao = $_POST['descricao'];
    $acaminho = isset($_POST['aCaminho']);
    if(!empty($acaminho)){
        $aCaminhoC = 1;
    } else {
        $aCaminhoC = 0;
    }
    
    if($tipo == $aCaminhoC){
        $sql = "insert into solicitacao (funcionario, horariosol, horarioresp, tipo, localidade, descricao, situacao) VALUES 
        ($codigoFunc, '$hour', $hour', $tipo, '$localidade', '$descricao', $aCaminhoC);
        ";

        echo $sql;
        $conn->query($sql);
    }
    @header("location: http://localhost/MP_Hackathon/solicitacoes/solicitacaoFuncionario.php");
?>