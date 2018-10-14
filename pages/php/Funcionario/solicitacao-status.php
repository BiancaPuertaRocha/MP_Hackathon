<?php
    @session_start();
    include_once("../connectDB.php");
    
    date_default_timezone_set('America/Sao_Paulo');
    $hour = date('H:i:n.999999');
    
    $soli = $_POST['solicitacao'];
    $opcao = $_POST['opcao'];

    if($opcao < 2)
        $opcao++;

    echo $opcao;
    $busca = "select * from solicitacao where codigo= $soli;";
    $resultado = mysqli_query($conn, $busca);
    $produto = mysqli_fetch_assoc($resultado);
    
    if($opcao == 2)
        $inclusao = "update solicitacao set situacao=$opcao, horarioresp='$hour' where codigo= $soli;";
    else
        $inclusao = "update solicitacao set situacao=$opcao where codigo= $soli;";
    
    mysqli_query($conn, $inclusao);
    @header("location: http://localhost/MP_Hackathon/solicitacoes/pendentesFuncionario.php");
?>